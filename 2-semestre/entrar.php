<?php 

session_start();

include 'connection.php';
$conn = Connect();

$email = $_POST['email'];
$pwd = $_POST['pwd'];

$query = $conn->prepare('SELECT email FROM usuarios WHERE email = ?');
$query->bindParam(1, $email);
$query->execute();
if ($query->fetch()) {
  $query = $conn->prepare('SELECT password from usuarios where email = ?');
  $query->bindParam(1, $email);
  $query->execute();
  $res = $query->fetch(PDO::FETCH_ASSOC);
  if(password_verify($pwd, $res['password'])){
    $_SESSION["login"] = $email;
    header("Location: links.html");
  }
  else{
    echo "<script>alert('senha incorreta')</script>";
  }
}
?>
