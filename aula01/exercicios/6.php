<html>
  <head>
    <link rel="stylesheet" href="./style.css"> 
  </head>
  <body>
    <div class="align-center">
      <form action="./6.php" method="POST">
        <input type="number" name="produto" placeholder="Digite o valor de um produto"> <br>
        <input type="submit" name="submit">
        <?php
          $produto = $_POST["produto"];
          $price_7_percent = $produto*0.07;
          $discount = $produto - $price_7_percent;
          if(isset($_POST['submit'])){
            echo "<div class='test'> O produto custa R$${produto} </div>";
            echo "<div class='test'> O desconto é de R$${price_7_percent} </div>";
            echo "<div class='test'> E o produto com desconto passa a custar R$${discount} </div>";
          }
        ?>
      </form>
    </div>
  </body>
</html>
