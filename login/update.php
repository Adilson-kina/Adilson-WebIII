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
          <form method="POST" action="./update.php">
              <label for="id">ID:</label>
              <input type="text" name="id" id="id" class="user-input" placeholder="Enter the id to be edited" required>
              <label for="nome">Name:</label>
              <input type="text" name="nome" id="nome" class="user-input" placeholder="Enter your full name" required>
              <label for="address">Address:</label>
              <input type="text" name="address" id="address" class="user-input" placeholder="Enter your street address" required>
              <label for="neighborhood">Neighborhood:</label>
              <input type="text" name="neighborhood" id="neighborhood" class="user-input" placeholder="Enter your neighborhood" required>
              <label for="city">City:</label>
              <input type="text" name="city" id="city" class="user-input" placeholder="Enter your city" required>
              <label for="state">State</label>
              <input type="text" name="state" id="state" class="user-input" placeholder="Enter your state (e.g. SP)" required>
              <label for="postal-code">Postal code:</label>
              <input type="text" name="postal-code" id="postal-code" class="user-input" placeholder="Enter your postal code" required>
              <label for="email">Email:</label>
              <input type="email" name="email" id="email" class="user-input" placeholder="Enter your email address" required>
              <label for="phone">Phone:</label>
              <input type="text" name="phone" id="phone" class="user-input" placeholder="Enter your phone number" required>
              <input type="submit" name="sub" id="sub" value="Create Account" onClick="isSubmitable()">
          </form>
        </div>
    </div>
</body>
</html>

<?php 
if (isset($_POST['sub'])) {
    require "include/config.php";

    $id = $_POST['id'];
    $name = $_POST['nome'];
    $address = $_POST['address'];
    $neighborhood = $_POST['neighborhood'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $postal_code = $_POST['postal-code']; 
    $email = $_POST['email'];
    $currentDate = date('Y-m-d');
    $phone = $_POST['phone'];

    try {
        $query = $conn->prepare("SELECT id_cliente FROM cliente WHERE id_cliente = :id");
        $query->bindParam(":id", $id);
        $query->execute();
        $exists = $query->fetchColumn(); 

        if (!$exists) {
            $_SESSION['error_message'] = 'Doesn\'t exist';
            header("Location: update.php");
            exit();
        } else {
            $query = $conn->prepare("UPDATE cliente SET 
                nome = :nome,
                endereco = :endereco,
                bairro = :bairro,
                cidade = :cidade,
                uf = :uf,
                cep = :cep,
                celular = :celular,
                email = :email,
                datcad = :datcad
                WHERE id_cliente = :id");

            $query->bindParam(":nome", $name);
            $query->bindParam(":endereco", $address);
            $query->bindParam(":bairro", $neighborhood);
            $query->bindParam(":cidade", $city);
            $query->bindParam(":uf", $state);
            $query->bindParam(":cep", $postal_code); 
            $query->bindParam(":celular", $phone); 
            $query->bindParam(":email", $email);
            $query->bindParam(":datcad", $currentDate);
            $query->bindParam(":id", $id); // Don't forget to bind :id again

            $query->execute(); 
            header("Location: create.php");
            exit();
        }
    } catch (PDOException $e) {
        error_log("Database Error: " . $e->getMessage());
        $_SESSION['error_message'] = "Ocorreu um erro ao atualizar o cliente. Por favor, tente novamente.";
        header("Location: create.php"); 
        exit();
    }
}
?>
