<html>
  <head>
    <link rel="icon" type="image/x-icon" href="./images/logo.png">
    <link rel="stylesheet" href="./style/style.css">
    <title>Exercicio 2</title>
  </head>
  <body>
    <div class="align-center">
      <form action="./3.php" method="POST" class="standard-style">
        <h1>Descruba o valor da parcela de 10x com 16% de juros </h1>
        <input type="number" name="valor" placeholder="Digite um valor"> <br>
        <input type="submit" name="submit" value="Descubra">
      <?php
          

          if(isset($_POST['submit'])){
            $valor = $_POST["valor"];
            $valor_acrescimo_16 = $valor + ($valor * 0.16);
            $valor_parcela = $valor_acrescimo_16 / 10;
            echo "<div class='result'> O valor da parcela de 10x com juros é R$${valor_parcela} </div>";
          }
        ?>
      </form>
    </div>
  </body>
</html>
