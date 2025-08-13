<?php 

$modelo = $_POST['modelo'];
$ano = $_POST['ano'];
$placa = $_POST['placa'];
$data_cadastro = date('Y-m-d');

include 'connection.php';

$stmt = $conn->prepare("SELECT placa from ");

$stmt = $conn->prepare("INSERT INTO automovel(modelo, ano, placa, data_cadastro) VALUES (?, ?, ?, ?)");
$stmt->bindParam(1, $modelo);
$stmt->bindParam(2, $ano);
$stmt->bindParam(3, $placa);
$stmt->bindParam(4, $data_cadastro);
$stmt->execute();

?>