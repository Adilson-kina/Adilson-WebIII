<html>
  <head>
    <link rel="stylesheet" href="./style.css">
  </head>
  <body>
    <div class="align-center">
      <form action="./2.php" method="POST">
        <label for="name">Valor:</label>
        <input type="number" name="valor" placeholder="Digite um numero"> <br>
        <input type="submit" name="submit">
        <?php
          $value = $_POST["valor"];
          $value_15_percent = $value*0.15;
          if(isset($_POST['submit'])){
            echo "<div class='test'> 15% de ${value} é: ${value_15_percent} </div>";
          }
        ?>
      </form>
    </div>
  </body>
</html>
