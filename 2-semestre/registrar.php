<?php 

include 'connection.php';
$conn = Connect();

$email = $_POST['email'];
$pwd = $_POST['pwd'];
$confirm = $_POST['repwd'];

if ($pwd != $confirm) {
  echo "<script>alert('As senhas nao batem'); window.location.href='registrar.html'</script>";
}

else if ($pwd == $confirm) {
  $query = $conn->prepare('SELECT email FROM usuarios WHERE email = ?');
  $query->bindParam(1, $email);
  $query->execute();
  if (!$query->fetch()) {
    $query = $conn->prepare('INSERT INTO usuarios (email, password) VALUES (?, ?) ');
    $query->bindParam(1, $email);
    $query->bindParam(2, $pwd);
    $query->execute();
    header("Location: links.html");
  }
  else{
    echo "<script>alert('Usuario ja existente'); window.location.href='registrar.html'</script>";
  }
}
?>
