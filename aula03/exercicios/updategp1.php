<html>
  <head>
    <link rel="icon" type="image/x-icon" href="./images/logo.png">
    <link rel="stylesheet" href="./style/style.css">
    <title>Exercicio 1</title>
  </head>
  <body>
    <div class="align-center">
      <form method="POST" action="./updategp1.php" class="standard-style">
          RA: <input type="text" name="ra" required><br>
          Nome: <input type="text" name="nome" required><br>
          Endereço: <input type="text" name="endereco" required><br>
          Curso: <input type="text" name="curso" required><br>
          <button type="submit" name="submit" value="adicionar">Alterar</button>
          <select name="choose">
            <option value="ra">RA</option>
            <option value="endereco">Endereco</option>
          </select>
      </form>
      <a href="./group1.php"><button>Adicionar dados</button></a>
    </div>
  </body>
</html>

<?php 
  // Conections
  $host = 'localhost';
  $dbname = 'escola';
  $user = 'root';
  $pass = '';



  try {
      $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $query = "update alunos set nome=?, endereco=?, curso=? where ra=?";

      if(isset($_POST["submit"])){
        $choose = $_POST["choose"];
        $ra = $_POST["ra"];
        $nome = $_POST["nome"];
        $endereco = $_POST["endereco"];
        $curso = $_POST["curso"];
        $stmt =  $conn->prepare($query);
        $stmt->execute([$nome, $endereco, $curso, $ra]);
      }

  } catch(PDOException $e) {
      echo"Erro:" . $e->getMessage();
  }
      $conn = null;
?>

