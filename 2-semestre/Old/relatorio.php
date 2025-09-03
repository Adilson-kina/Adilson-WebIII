<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./styles/style.css">
  <link rel="stylesheet" href="./styles/reset.css">
  <title>Cadastro de veículos</title>
</head>
<body>
  <div class="main-container">
    <?php

    include 'connection.php';
    $stmt = $conn->prepare("SELECT id, modelo, ano, placa, cor FROM automovel");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $res = $stmt->fetchAll();

    var_dump($res);

    ?>
  </div>
</body>
</html>
