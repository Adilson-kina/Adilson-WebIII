<?php

if(!isset($_COOKIE["canChangePwd"])) {
  header("Location: reset_pwd.html");
  exit();

}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="css/reset.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body>
    <div class="center-container">
      <div class="main-container">
        <form method="POST" action="newpwd.php">
          <label for="pwd">Type a password:</label>
          <input type="password" id="pwd" name="pwd" class="user-input" placeholder="Type your new password">
          <label for="pwd2">Retype the password:</label>
          <input type="password" id="pwd2" name="pwd2" class="user-input" placeholder="Type your new password again">
          <input type="submit" name="sub" id="sub">
        </form>
      </div>
    </div>
  </body>
</html>


<?php 
$db = "login";
$host = "localhost";
$dbUser = "root";
$dbPwd = "";

$email = $_COOKIE["whereChange"];

try {
  $conn = new PDO("mysql:host=$host;dbname=$db", $dbUser, $dbPwd);
  // error mode to exception to be catchabe
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if (isset($_POST["sub"])) {
    $pwd = trim($_POST["pwd"]);
    $pwd2 = trim($_POST["pwd2"]);
    if($pwd == $pwd2){
      $query = $conn->prepare("UPDATE usuarios SET password = :pwd WHERE email = :email");
      $query->bindParam(':email', $email);
      $query->bindParam(':pwd', $pwd);
      $query->execute();
      header("Location:login.html");
    }
    else{
      echo "<script>alert('the first password doesnt match the second')</script>";
    }
  }


} catch (PDOException $e) {
  echo "ERROR: ${e}";
}

?>
