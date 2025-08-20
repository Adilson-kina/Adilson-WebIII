<?php 

$placa = $_POST['placa'];
$valor = $_POST['valor'];

include 'connection.php';

$stmt = $conn->prepare("SELECT placa FROM automovel WHERE  placa = ?");
$stmt->bindParam(1, $placa);
$stmt->execute();
if ($stmt->fetch()) {
  $stmt = $conn->prepare("UPDATE automovel SET valor = ? WHERE placa = ?");
  $stmt->bindParam(1, $valor);
  $stmt->bindParam(2, $placa);
  $stmt->execute();
}
else{
  echo "<script>window.alert('Opa, carro não encontrado')</script>";
}

?>
