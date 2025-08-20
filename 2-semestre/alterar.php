<?php 

$placa = $_POST['placa'];
$valor = $_POST['valor'];

include 'connection.php';

$stmt = $conn->prepare("SELECT placa FROM automovel WHERE  placa = ?");
$stmt->bindParam(1, $placa);
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$placa_antiga = $stmt->fetch();
if (!$placa_antiga) {
  $stmt = $conn->prepare("UPDATE placa SET placa = ? WHERE placa = ?");
  $stmt->bindParam(1, $placa);
  $stmt->execute(2, $placa_antiga[0]);
}
else{
  echo "<script>window.alert('Opa, carro não encontrado')</script>";
}

?>
