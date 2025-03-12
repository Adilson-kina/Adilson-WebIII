<html>
  <head>
    <link rel="icon" type="image/x-icon" href="./images/logo.png">
    <link rel="stylesheet" href="./style/style.css">
    <title>Exercicio 2</title>
  </head>
  <body>
    <div class="align-center">
      <form action="./1.php" method="POST" class="standard-style">
        <h1>Descubra o volume de uma caixa retangular</h1>
        <input type="number" name="comprimento" placeholder="Digite o comprimento"> <br>
        <input type="number" name="altura" placeholder="Digite a altura"> <br>
        <input type="number" name="largura" placeholder="Digite a largura"> <br>
        <input type="submit" name="submit" value="Descubra">
      <?php
          

          if(isset($_POST['submit'])){
            $comprimento = $_POST["comprimento"];
            $largura = $_POST["largura"];
            $altura = $_POST["altura"];
            $volume = $comprimento * $largura * $altura;

            echo "<div class='result'> O volume da caixa retângular é ${volume} </div>";
          }
        ?>
      </form>
    </div>
  </body>
</html>
