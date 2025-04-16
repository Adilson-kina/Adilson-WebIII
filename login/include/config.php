<?php
$db = "login";
$host = "localhost";
$dbUser = "root";
$dbPwd = "";

try {
  $conn = new PDO("mysql:host=$host;dbname=$db", $dbUser, $dbPwd);
  //Set error mode to PDOException 
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "ERROR: ${e}";
}
?>

