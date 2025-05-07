<?php
$host = '0.0.0.0';
$port = 8080;
$clients = [];

$server = stream_socket_server("tcp://$host:$port", $errno, $errstr);
if (!$server) {
    die("Error: $errstr ($errno)");
}

while (true) {
    $read = $clients;
    $read[] = $server;

    stream_select($read, $write, $except, null);

    if (in_array($server, $read)) {
        $newClient = stream_socket_accept($server);
        $clients[] = $newClient;
        $header = fread($newClient, 1024);
        preg_match("/Sec-WebSocket-Key: (.*)\r\n/", $header, $matches);
        $key = base64_encode(pack('H*', sha1($matches[1] . '258EAFA5-E914-47DA-95CA-C5AB0DC85B11')));
        $upgrade = "HTTP/1.1 101 Switching Protocols\r\n"
                 . "Upgrade: websocket\r\n"
                 . "Connection: Upgrade\r\n"
                 . "Sec-WebSocket-Accept: $key\r\n\r\n";
        fwrite($newClient, $upgrade);
        unset($read[array_search($server, $read)]);
    }

    foreach ($read as $client) {
        $data = fread($client, 1024);
        if (!$data) {
            unset($clients[array_search($client, $clients)]);
            continue;
        }

        $decoded = decode($data);
        foreach ($clients as $sendTo) {
            fwrite($sendTo, encode($decoded));
        }
    }
}

function encode($text) {
    $b1 = 0x81; // FIN + text frame
    $length = strlen($text);
    if ($length <= 125) {
        return chr($b1) . chr($length) . $text;
    } elseif ($length < 65536) {
        return chr($b1) . chr(126) . pack("n", $length) . $text;
    } else {
        return chr($b1) . chr(127) . pack("J", $length) . $text;
    }
}

function decode($data) {
    $length = ord($data[1]) & 127;
    if ($length === 126) {
        $masks = substr($data, 4, 4);
        $payload = substr($data, 8);
    } elseif ($length === 127) {
        $masks = substr($data, 10, 4);
        $payload = substr($data, 14);
    } else {
        $masks = substr($data, 2, 4);
        $payload = substr($data, 6);
    }
    $text = '';
    for ($i = 0; $i < strlen($payload); ++$i) {
        $text .= $payload[$i] ^ $masks[$i % 4];
    }
    return $text;
}
