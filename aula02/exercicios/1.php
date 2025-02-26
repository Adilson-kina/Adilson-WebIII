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
        <input type="number" name="comprimento" placeholder="Digite o comprimenot"> <br>
        <input type="number" name="altura" placeholder="Digite a altura"> <br>
        <input type="number" name="largura" placeholder="Digite a largura"> <br>
        <input type="submit" name="submit" value="Descubra">
      <?php
          

          if(isset($_POST['submit'])){
            $value = $_POST["largura"];
            $value_15_percent = $alue*0.15;
            echo "<div class='result'> 15% de ${value} é: ${value_15_percent} </div>";
          }
        ?>
      </form>
    </div>
  </body>
</html>
