<?php 

$user = trim($_POST["email"]);
$userPwd = trim($_POST["pwd"]);
$verify = false;

require "include/config.php";

try {
  $query = $conn->prepare("SELECT password, name FROM usuarios WHERE email = :email");
  $query->bindParam(':email', $user);
  $query->execute();
  $query->setFetchMode(PDO::FETCH_ASSOC);
  $res = $query->fetch();
  $verify = (isset($res['password'])) ? (password_verify($userPwd, $res['password'])) : false;
  if ($verify) {
      session_start();
      $_SESSION["name"] = $res['name'];
      header("Location: index.php");
      exit();
  }
} catch (PDOException $e) {
  echo "ERROR: ${e}";
}
?>
