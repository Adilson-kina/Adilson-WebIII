<?php 

require "config/config.php";

$active = 1;
$level = 1;
$signDate = date("Y-m-d");
$isUserTaken = false;
$login = "placeholder";


try {
  $query = $conn->prepare("SELECT email FROM usuarios WHERE email = :email");
  $query->bindParam(":email", $email);
  $query->execute();
  $query->setFetchMode(PDO::FETCH_ASSOC);
  $isUserTaken = (bool) $query->fetch();

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
