<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require "include/config.php";

$active = 1;
$level = 1;
$signDate = date("Y-m-d");
$isUserTaken = false;
$login = "placeholder";


$name = $_POST["nome"];
$email = $_POST["email"];
$recEmail = $_POST["recovery"];
$pwd = password_hash($_POST["pwd"], PASSWORD_DEFAULT);

try {
  $query = $conn->prepare("SELECT email FROM usuarios WHERE email = :email");
  $query->bindParam(":email", $email);
  $query->setFetchMode(PDO::FETCH_ASSOC);
  $res = $query->execute();
  $isUserTaken = (isset($res['email'])) ? true : false;

  if($isUserTaken) {
    echo "<script>window.alert('email ja cadastrado')</script>";
    header("Location:create_account.html");
    exit();
  }
  else{
    $query = $conn->prepare("INSERT INTO usuarios (name, email, recEmail, password, signDate, active, level, login) VALUES (:name, :email, :recEmail, :password, :signDate, :active, :level, :login)");
    $query->bindParam(":name", $name);
    $query->bindParam(":email", $email);
    $query->bindParam(":recEmail", $recEmail);
    $query->bindParam(":password", $pwd);
    $query->bindParam(":signDate", $signDate);
    $query->bindParam(":active", $active);
    $query->bindParam(":level", $level);
    $query->bindParam(":login", $login);
    $query->execute();
    header("Location:login.html");
    exit();
  }
} catch (PDOException $e) {
  echo "ERROR: ${e}";
}
?>
