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
    <title>Create Account</title>
    <link href="css/style.css" rel="stylesheet">
    <link href="css/reset.css" rel="stylesheet">
</head>
<body>
    <div class="center-container">
        <div class="main-container">
          <form method="POST" action="./read.php">
              <label for="id">ID:</label>
              <input type="text" name="id" id="id" class="user-input" placeholder="Enter the user ID to see" required>
              <input type="submit" name="sub" id="sub" value="Show" onClick="isSubmitable()">
          </form>
          The data is at the end of the page, scroll down
        </div>
    </div>
</body>
</html>

<?php
if (isset($_POST['sub'])) {
    require "include/config.php";
    $id = $_POST['id'];

    try {
        $stmt = $conn->prepare("SELECT * FROM cliente WHERE id_cliente = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $cliente = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($cliente) {
            print_r($cliente);
        } else {
            echo "<p>Nenhum cliente encontrado com o ID " . htmlspecialchars($id) . ".</p>";
        }
    } catch (PDOException $e) {
        error_log($e->getMessage());
        $_SESSION['error_message'] = "Ocorreu um erro ao buscar o cliente.";
        header("Location: read.php");
        exit();
    }
}
?>
