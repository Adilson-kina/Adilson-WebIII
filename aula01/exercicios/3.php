<html>
  <head>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="icon" type="image/x-icon" href="./images/logo.png">
    <title>Exercicio 3</title>
  </head>
  <body>
    <div class="align-center">
      <form action="./3.php" method="POST" class="standard-style">
        <h1>Descubra 5% e 50% de um número </h1>
        <input type="number" name="valor" placeholder="Digite um numero"> <br>
        <input type="submit" name="submit" value="Descubra">
        <?php
          $value = $_POST["valor"];
          $value_5_percent = $value*0.05;
          $value_50_percent = $value*0.5;
          if(isset($_POST['submit'])){
            echo "<div class='result'> 5% de ${value} é: ${value_5_percent} </div>";
            echo "<div class='result'> 50% de ${value} é: ${value_50_percent} </div>";
          }
        ?>
      </form>
    </div>
  </body>
</html>
