<?php 

$modelo = $_POST['modelo'];
$ano = $_POST['ano'];
$placa = $_POST['placa'];
$valor = $_POST['valor'];
$valor_float = (float) $valor;
$cor = $_POST['cor'];
$data_cadastro = date('Y-m-d');

include 'connection.php';

$stmt = $conn->prepare("SELECT placa FROM automovel WHERE  placa = ?");
$stmt->bindParam(1, $placa);
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);
if (!$stmt->fetch()) {
  $stmt = $conn->prepare("INSERT INTO automovel(modelo, ano, placa, data_cadastro, cor, valor) VALUES (?, ?, ?, ?, ?)");
  $stmt->bindParam(1, $modelo);
  $stmt->bindParam(2, $ano);
  $stmt->bindParam(3, $placa);
  $stmt->bindParam(4, $data_cadastro);
  $stmt->bindParam(5, $cor);
  $stmt->bindParam(6, $valor);
  $stmt->execute();
}
else{
  echo "<script>window.alert('Opa, placa já cadastrada')</script>";
}

?>
