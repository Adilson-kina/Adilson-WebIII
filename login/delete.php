<?php 
session_start();
if (!isset($_SESSION["name"])) {
  header("Location: login.html");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Delete Account</title>
    <link href="css/style.css" rel="stylesheet">
    <link href="css/reset.css" rel="stylesheet">
</head>
<body>
    <div class="center-container">
        <div class="main-container">
          <form method="POST" action="">
              <label for="id">ID:</label>
              <input type="text" name="id" id="id" class="user-input" placeholder="Enter the ID to be deleted" required>
              <input type="submit" name="sub" id="sub" value="Delete Account">
          </form>
        </div>
    </div>
</body>
</html>

<?php
if (isset($_POST['sub'])) {
    require "include/config.php";

    $id = $_POST['id'];

    try {
        $query = $conn->prepare("DELETE FROM cliente WHERE id_cliente = :id");
        $query->bindParam(":id", $id);
        $query->execute();
        header("Location: delete.php");
        exit();
    } catch (PDOException $e) {
        error_log("Database Error: " . $e->getMessage());
        $_SESSION['error_message'] = "Ocorreu um erro ao deletar o cliente. Por favor, tente novamente.";
        header("Location: delete.php"); 
        exit();
    }
}
?>
