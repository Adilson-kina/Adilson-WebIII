<?php 

$db = "login";
$host = "localhost";
$dbUser = "root";
$dbPwd = "";

$user = trim($_POST["email"]);
$userPwd = trim($_POST["pwd"]);
$verify = false;

try {
  $conn = new PDO("mysql:host=$host;dbname=$db", $dbUser, $dbPwd);
  // error mode to exception to be catchabe
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $query = $conn->prepare("SELECT password, name, email FROM usuarios WHERE email = :email");
  $query->bindParam(':email', $user);
  $query->execute();
  $query->setFetchMode(PDO::FETCH_ASSOC);
  $res = $query->fetch();
  $verify = (isset($res['password'])) ? ($res['password'] == $userPwd) : false;
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
