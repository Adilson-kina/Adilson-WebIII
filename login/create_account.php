<?php 

$db = "login";
$host = "localhost";
$dbUser = "root";
$dbPwd = "";

$active = 1;
$level = 1;
$signDate = date("Y-m-d");
$isUserTaken = false;
$login = "hi";

$name = $_POST["nome"];
$email = $_POST["email"];
$recEmail = $_POST["recovery"];
$pwd = $_POST["pwd"];


try {
  $conn = new PDO("mysql:host=$host;dbname=$db", $dbUser, $dbPwd);
  // error mode to exception to be catchabe
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $query = $conn->prepare("SELECT * FROM usuarios WHERE email = :email");
  $query->bindParam(":email", $email);
  $query->execute();
  $res = $query->setFetchMode(PDO::FETCH_ASSOC);
  foreach(new RecursiveArrayIterator($query->fetchAll()) as $row){
    $isUserTaken = true;
  }

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
