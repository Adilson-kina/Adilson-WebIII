<?php 

include 'connection.php';
$conn = Connect();

$model = $_POST['model'];
$year = $_POST['year'];
$plate = $_POST['plate'];
$price = $_POST['price'];
$color = $_POST['color'];
$document = $_POST['document'];
$ocurrency = $_POST['ocurrency'];
$blocked = isset($_POST['blocked']) ? 1 : 0;
$secured = isset($_POST['secured']) ? 1 : 0;
$register_date = date('Y-m-d');

$query = $conn->prepare('SELECT placa from veiculos WHERE placa = ?');
$query->bindParam(1, $plate);
$query->execute();
if (!$query->fetch()) {
  $query = $conn->prepare('INSERT INTO veiculos(modelo, ano, placa, data_cadastro, valor, cor, seguro, documento, ocorrencia, bloqueio) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
  $query->bindParam(1, $model);
  $query->bindParam(2, $year);
  $query->bindParam(3, $plate);
  $query->bindParam(4, $register_date);
  $query->bindParam(5, $price);
  $query->bindParam(6, $color);
  $query->bindParam(7, $secured);
  $query->bindParam(8, $document);
  $query->bindParam(9, $ocurrency);
  $query->bindParam(10, $blocked);
  $query->execute();
  header("Location: index.html");

}
else{
  echo "<script>alert('Placa ja registrada')</script>";
}
?>
