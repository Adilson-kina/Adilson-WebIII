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
      <select id="typeOfQuery" onChange="chooseRender()">
        <option>Create</option>
        <option>Read</option>
        <option>Update</option>
        <option>Delete</option>
      </select>

      <!-- CREATE -->
      <div id="create">
        <label for="nome">Name:</label>
        <input type="text" name="nome" id="nome" class="user-input" placeholder="Type name" required>
        <label for="login">Login:</label>
        <input type="text" name="login" id="login" class="user-input" placeholder="Type login" required>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" class="user-input" placeholder="Type email" required>
        <label for="recovery">Recovery email:</label>
        <input type="email" name="recovery" id="recovery" class="user-input" placeholder="Type a second recovery email" required>
        <label for="pwd">Password:</label>
        <input type="password" name="pwd" id="pwd" class="user-input" placeholder="Type password" required>
        <label for="level">Level:</label>
        <input type="text" name="level" id="level" class="user-input" placeholder="level" required>
      <div>
      

      <button name="query" onClick="doQuery()">Query</button>
      <form method="POST" action="./index.php">
        <input type="submit" name="logout" value="logout">
      </form>
    </div>
  </div>
  <script src="./script/index.js"></script>
</body>
</html>

<?php 
if(isset($_POST["logout"])) {
  session_destroy();
  header("Location: login.html");
  exit();
}
?>
