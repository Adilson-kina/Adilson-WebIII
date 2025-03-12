<html>
  <head>
    <link rel="icon" type="image/x-icon" href="./images/logo.png">
    <link rel="stylesheet" href="./style/style.css">
    <title>Exercicio 2</title>
  </head>
  <body>
    <div class="align-center">
      <form action="./2.php" method="POST" class="standard-style">
        <h1>Descruba um desconto de 27% em um </h1>
        <input type="number" name="valor" placeholder="Digite um valor"> <br>
        <input type="submit" name="submit" value="Descubra">
      <?php
          

          if(isset($_POST['submit'])){
            $valor = $_POST["valor"];
            $valor_descontro_27 = $valor - ($valor * 0.27);
            echo "<div class='result'> O desconto de R$${valor} com 27% de desconto é ${valor_descontro_27} </div>";
          }
        ?>
      </form>
    </div>
  </body>
</html>
