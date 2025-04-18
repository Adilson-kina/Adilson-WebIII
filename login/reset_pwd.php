<?php
require "vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

error_reporting(E_ALL);

$db = "login";
$host = "localhost";
$dbUser = "root";
$dbPwd = "";

$email = $_POST["email"];
$inputCode = isset($_POST["inputCode"]) ? $_POST["inputCode"] : "none";

try {
  $conn = new PDO("mysql:host=$host;dbname=$db", $dbUser, $dbPwd);
  // error mode to exception to be catchabe
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $query = $conn->prepare("SELECT recEmail FROM usuarios WHERE email = :email");
  $query->bindParam(':email', $email);
  $query->execute();
  // Makes the query return an array without an index for every column
  $query->setFetchMode(PDO::FETCH_ASSOC);
  $query->fetchAll();
  $verify = (bool) $result;

  if($verify && $inputCode == "none"){
    $code = rand(100000, 999999);
    setcookie("recoveryCode", $code, time() + 300);
    sendEmail($email, $code);
    setcookie("isSuccess", true, time() + 60);
  }
  else if($verify == false){
    setcookie("isSuccess", false, time() + 60);
  }
  else if($inputCode == $_COOKIE["recoveryCode"]){
    setcookie("isSuccess", true, time() + 60);
    setcookie("canChangePwd", true, time() + 600 * 2);
    setcookie("whereChange", $email, time() + 600 * 2);
  }
}
catch (PDOException $e) {
  echo "ERROR: ${e}";
}

function sendEmail($email, $code){
  $mail = new PHPMailer(true);
  $mail->isSMTP();
  $mail->SMTPAuth = true;
  $mail->Host = "smtp.gmail.com";
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
  $mail->Port = 587;

  $mail->Username = "noreply.projectlogin@gmail.com";
  $mail->Password = "putthepwdhere";

  $mail->setFrom("noreply.projectlogin@gmail.com", "NoReply");
  $mail->addAddress($email);

  $mail->Subject = "Verification Code";
  $mail->Body = "Verification Code:${code} it lasts 5 min BEWARE DO NOT SHARE WITH ANYONE";

  $mail->send();
}

?>
