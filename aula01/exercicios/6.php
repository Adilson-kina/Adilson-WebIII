<html>
  <head>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="icon" type="image/x-icon" href="./images/logo.png">
    <title>Exercicio 6</title>
  </head>
  <body>
    <div class="align-center">
      <form action="./6.php" method="POST" class="standard-style">
        <h1>Desconto de um produto</h1>
        <input type="number" name="produto" placeholder="Digite o valor de um produto"> <br>
        <input type="submit" name="submit" value="Ver desconto">
        <?php
          $produto = $_POST["produto"];
          $price_7_percent = $produto*0.07;
          $discount = $produto - $price_7_percent;
          if(isset($_POST['submit'])){
            echo "<div class='result'> O produto custa R$${produto} </div>";
            echo "<div class='result'> O desconto é de R$${price_7_percent} </div>";
            echo "<div class='result'> E o produto com desconto passa a custar R$${discount} </div>";
          }
        ?>
      </form>
    </div>
  </body>
</html>
