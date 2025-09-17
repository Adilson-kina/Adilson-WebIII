<?php 

include 'connection.php';
$conn = Connect();

$plate = $_POST['plate'];
$price = $_POST['price'];

$query = $conn->prepare('SELECT bloqueio from veiculos WHERE placa = ?');
$query->bindParam(1, $plate);
$query->execute();
$blocked = $query->fetch(PDO::FETCH_ASSOC);
if ($blocked) {
  if ($blocked["bloqueio"]) {
    echo "<script>alert('Seu carro esta bloqueado e nao pode ter alteracoes'); window.location.href = 'alteracao.html'</script>";
  }
  else{
    $query = $conn->prepare('UPDATE veiculos SET valor = ? WHERE placa = ?');
    $query->bindParam(1, $price);
    $query->bindParam(2, $plate);
    $query->execute();
    header("Location: index.html");
  }

}
else{
  echo "<script>alert('Placa nao registrada no sistema'); window.location.href = 'alteracao.html'</script>";
}
?>
