<?php
session_start();
require "vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

error_reporting(E_ALL);

require "include/config.php";

$email = isset($_POST["email"]) ? $_POST["email"] : "none";
$inputCode = isset($_POST["inputCode"]) ? $_POST["inputCode"] : "none";

try {
  $query = $conn->prepare("SELECT recEmail, name FROM usuarios WHERE email = :email");
  $query->bindParam(':email', $email);
  $query->execute();
  // Makes the query return an array without an index for every column
  $query->setFetchMode(PDO::FETCH_ASSOC);
  $res = $query->fetch();
  // fetch returns either false or object
  $verify = $res != false;

  if($verify && $inputCode == "none"){
    echo json_encode(["status" => "ok"]);
    $code = rand(100000, 999999);
    $_SESSION["code"] = $code;
    $_SESSION["isEmailValid"] = true;
    /* sendEmail($res["recEmail"], $code); */
  }
  else if($inputCode == $_SESSION["code"] && $_SESSION["isEmailValid"]){
    $_SESSION["name"] = $res["name"];
    echo json_encode(["status" => "verified"]);
  }
  else if($verify == false && !$_SESSION["isEmailValid"]){
    echo json_encode(["status" => "email_not_found"]);
  }
  else{
    echo json_encode(["status" => $inputCode]);
  }
}
catch (PDOException $e) {
  echo "ERROR: ${e}";
}

##########################
### sendEmail FUNCTION ###
##########################

function sendEmail($email, $code){
  $mail = new PHPMailer(true);
  $mail->isSMTP();
  $mail->SMTPAuth = true;
  $mail->Host = "smtp.gmail.com";
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
  $mail->Port = 587;

  $mail->Username = "put your email here";
  $mail->Password = "put your password here";

  $mail->setFrom("noreply.projectlogin@gmail.com", "NoReply");
  $mail->addAddress($email);

  $mail->Subject = "Verification Code";
  $mail->Body = "Verification Code:${code} it lasts 5 min BEWARE DO NOT SHARE WITH ANYONE";

  try{
    $mail->send();
  } catch (Exception $e){
    error_log("Mailer error:" . ${$mail->ErrorInfo});
  }
}

?>
