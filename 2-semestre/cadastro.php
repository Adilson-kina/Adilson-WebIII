<?php 

$modelo = $_POST['modelo'];
$ano = $_POST['ano'];
$placa = $_POST['placa'];
$valor = $_POST['valor'];
$cor = $_POST['cor'];
$documento = $_POST['doc'];
$ocorrencia = $_POST['ocorrencia'];
/* $bloqueio = isset($_POST['bloqueio']) ? 1 : 0; */
/* $seguro = isset($_POST['seguro']) ? 1 : 0; */
$bloqueio = 1; // Hardcode for test
$seguro = 0; // Hardcode for test
$data_cadastro = date('Y-m-d');

include 'connection.php';

$stmt = $conn->prepare("SELECT placa FROM automovel WHERE  placa = ?");
$stmt->bindParam(1, $placa);
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);
if (!$stmt->fetch()) {
  $stmt = $conn->prepare("INSERT INTO automovel(modelo, ano, placa, data_cadastro, cor, valor, seguro, documento, ocorrencia, bloqueio) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
  $stmt->bindParam(1,  $modelo);
  $stmt->bindParam(2,  $ano);
  $stmt->bindParam(3,  $placa);
  $stmt->bindParam(4,  $data_cadastro);
  $stmt->bindParam(5,  $cor);
  $stmt->bindParam(6,  $valor);
  $stmt->bindParam(7,  $seguro);
  $stmt->bindParam(8,  $documento);
  $stmt->bindParam(9,  $ocorrencia);
  $stmt->bindParam(10, $bloqueio);
  $stmt->execute();
}
else{
  echo "<script>window.alert('Opa, placa já cadastrada')</script>";
}

?>
