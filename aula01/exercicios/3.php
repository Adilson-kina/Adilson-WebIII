<html>
  <head>
    <link rel="stylesheet" href="./style.css"> 
  </head>
  <body>
    <div class="align-center">
      <form action="./3.php" method="POST">
        <label for="name">Valor:</label>
        <input type="number" name="valor" placeholder="Digite um numero"> <br>
        <input type="submit" name="submit">
        <?php
          $value = $_POST["valor"];
          $value_5_percent = $value*0.05;
          $value_50_percent = $value*0.5;
          if(isset($_POST['submit'])){
            echo "<div class='test'> 5% de ${value} é: ${value_5_percent} </div>";
            echo "<div class='test'> 50% de ${value} é: ${value_50_percent} </div>";
          }
        ?>
      </form>
    </div>
  </body>
</html>
