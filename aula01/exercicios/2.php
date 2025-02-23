<html>
  <head>
    <link rel="icon" type="image/x-icon" href="./images/logo.png">
    <link rel="stylesheet" href="./style/style.css">
    <title>Exercicio 2</title>
  </head>
  <body>
    <div class="align-center">
      <form action="./2.php" method="POST" class="standard-style">
        <h1>Descubra 15% de um número</h1>
        <input type="number" name="valor" placeholder="Digite um numero"> <br>
        <input type="submit" name="submit" value="Descubra">
        <?php
          $value = $_POST["valor"];
          $value_15_percent = $value*0.15;
          if(isset($_POST['submit'])){
            echo "<div class='result'> 15% de ${value} é: ${value_15_percent} </div>";
          }
        ?>
      </form>
    </div>
  </body>
</html>
