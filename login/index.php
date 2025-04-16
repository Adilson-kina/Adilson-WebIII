<?php 
session_start();
if (!isset($_SESSION["name"])) {
  header("Location: login.html");
  exit();
}
?>


<?php include "./include/header.php"; ?>
<div class="center-container">
  <div class="main-container">
    <h1>nice, logged in successfully!</h1>
    <form method="POST" action="./index.php">
      <input type="submit" name="logout" value="logout">
    </form>
  </div>
</div>
<?php include "./include/footer.php";?>

<?php 
if(isset($_POST["logout"])) {
  setcookie("login", "", time() - 3600);
  header("Location: login.html");
  exit();
}
?>
