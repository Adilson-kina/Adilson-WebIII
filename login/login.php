<?php 

$db = "login";
$host = "localhost";
$dbUser = "root";
$dbPwd = "";

$user = $_POST["login"];
$userPwd = $_POST["pwd"];
$verify = false;

try {
  $conn = new PDO("mysql:host=$host;dbname=$db", $dbUser, $dbPwd);
  // error mode to exception to be catchabe
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $query = $conn->prepare("SELECT * FROM usuarios WHERE email = :email AND password = :passwd ");
  if(!$query){
    echo "error selecting, no user with this password";
  }
  $query->bindParam(':email', $user);
  $query->bindParam(':passwd', $userPwd);
  if(isset($_POST["sub"])){
    $query->execute();
    $result = $query->setFetchMode(PDO::FETCH_ASSOC);
    foreach(new RecursiveArrayIterator($query->fetchAll()) as $row){
    $verify = true;
    }
    if ($verify == false) {
      echo "<script> window.alert('no user with this password') ;window.location.href='index.html'</script>";
    }
  }
} catch (PDOException $e) {
  echo "ERROR: ${e}";
}
?>
