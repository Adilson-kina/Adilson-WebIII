<?php 
session_start();
if (!isset($_SESSION["name"])) {
  header("Location: login.html");
  exit();
}
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>My Website</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="center-container">
    <div class="main-container">
      <h1>nice, logged in successfully!</h1>
      <form method="POST" action="./index.php">
        <input type="submit" name="logout" value="logout">
      </form>
    </div>
  </div>
</body>
</html>

<?php 
if(isset($_POST["logout"])) {
  session_destroy();
  header("Location: login.html");
  exit();
}
?>
