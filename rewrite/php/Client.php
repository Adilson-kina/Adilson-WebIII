<?php

require_once 'DBConnection.php';

class Client {
    // Cliente properties
    private $id;
    private $endereco;
    private $bairro;
    private $cidade;
    private $uf;
    private $cep;
    private $celular;
    private $datcad;
    private $datalt;

    /** @var \PDO */
    private $conn;

    public function __construct() {
        $db = new DBConnection();
        $this->conn = $db->connect();
        $this->datcad = date('Y-m-d');
    }

    public function createClient(array $data): void {
        $this->endereco = $data['endereco'];
        $this->bairro   = $data['bairro'];
        $this->cidade   = $data['cidade'];
        $this->uf       = $data['uf'];
        $this->cep      = $data['cep'];
        $this->celular  = $data['celular'];
        // datcad is already set to today
        $this->datalt   = $data['datalt'] ?? null;

        $sql = "INSERT INTO cliente 
                  (endereco, bairro, cidade, uf, cep, celular, datcad, datalt)
                VALUES
                  (:endereco, :bairro, :cidade, :uf, :cep, :celular, :datcad, :datalt)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':endereco', $this->endereco);
        $stmt->bindParam(':bairro',   $this->bairro);
        $stmt->bindParam(':cidade',   $this->cidade);
        $stmt->bindParam(':uf',       $this->uf);
        $stmt->bindParam(':cep',      $this->cep);
        $stmt->bindParam(':celular',  $this->celular);
        $stmt->bindParam(':datcad',   $this->datcad);
        $stmt->bindParam(':datalt',   $this->datalt);
        $stmt->execute();

        // store the inserted ID
        $this->id = (int) $this->conn->lastInsertId();
    }

    public function readCliente(int $id) {
        $sql = "SELECT * FROM cliente WHERE id_cliente = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateCliente(int $id, array $data): void {
        $this->id        = $id;
        $this->endereco  = $data['endereco'];
        $this->bairro    = $data['bairro'];
        $this->cidade    = $data['cidade'];
        $this->uf        = $data['uf'];
        $this->cep       = $data['cep'];
        $this->celular   = $data['celular'];
        $this->datcad    = $data['datcad'] ?? $this->datcad;
        // update timestamp
        $this->datalt    = date('Y-m-d');

        $sql = "UPDATE cliente SET
                  endereco = :endereco,
                  bairro   = :bairro,
                  cidade   = :cidade,
                  uf       = :uf,
                  cep      = :cep,
                  celular  = :celular,
                  datcad   = :datcad,
                  datalt   = :datalt
                WHERE id_cliente = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':endereco', $this->endereco);
        $stmt->bindParam(':bairro',   $this->bairro);
        $stmt->bindParam(':cidade',   $this->cidade);
        $stmt->bindParam(':uf',       $this->uf);
        $stmt->bindParam(':cep',      $this->cep);
        $stmt->bindParam(':celular',  $this->celular);
        $stmt->bindParam(':datcad',   $this->datcad);
        $stmt->bindParam(':datalt',   $this->datalt);
        $stmt->bindParam(':id',       $this->id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function deleteCliente(int $id): void {
        $sql = "DELETE FROM cliente WHERE id_cliente = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}
