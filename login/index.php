<?php 
if (!isset($_COOKIE["login"])) {
  header("Location: login.html");
  exit();
}
?>


<?php include "./include/header.php"; ?>
<p>nice, logged in successfully!</p>
<form method="POST" action="./index.php">
  <input type="submit" name="logout" value="logout">
</form>
<?php include "./include/footer.php";?>

<?php 
if(isset($_POST["logout"])) {
  setcookie("login", "", time() - 3600);
  header("Location: login.html");
  exit();
}
?>
