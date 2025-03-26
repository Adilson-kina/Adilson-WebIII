<html>
  <head>
    <link rel="icon" type="image/x-icon" href="./images/logo.png">
    <link rel="stylesheet" href="./style/style.css">
    <title>Exercicio 1</title>
  </head>
  <body>
    <div class="align-center">
      <form method="POST" action="./group1.php" class="standard-style">
          RA: <input type="text" name="ra" required><br>
          Nome: <input type="text" name="nome" required><br>
          Endereço: <input type="text" name="endereco" required><br>
          Curso: <input type="text" name="curso" required><br>
          <button type="submit" name="submit" value="adicionar">Incluir</button>
      </form>
      <a href="./updategp1.php"><button>Alterar dados</button></a>
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
    $stmt = $conn -> prepare("insert into alunos (ra, nome, endereco, curso) values (:ra, :nome, :endereco, :curso)");

    $stmt->bindParam(":ra", $ra);
    $stmt->bindParam(":nome", $nome);
    $stmt->bindParam(":endereco", $endereco);
    $stmt->bindParam(":curso", $curso);
    if(isset($_POST["submit"])){
      $ra = $_POST["ra"];
      $nome = $_POST["nome"];
      $endereco = $_POST["endereco"];
      $curso = $_POST["curso"];
      $stmt->execute();
    }

} catch(PDOException $e) {
    echo"Erro:" . $e->getMessage();
}
    $conn = null;
?>
