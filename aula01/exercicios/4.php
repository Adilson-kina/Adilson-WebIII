<html>
  <head>
    <link rel="stylesheet" href="./style.css"> 
  </head>
  <body>
    <div class="align-center">
      <form action="./4.php" method="POST">
        <label for="name">Valor:</label>
        <input type="number" name="num1" placeholder="Digite um numero"> <br>
        <input type="number" name="num2" placeholder="Digite outro numero"> <br>
        <input type="submit" name="submit">
        <?php
          $num1 = $_POST["num1"];
          $num2 = $_POST["num2"];
          $sqrtNum1 = $num1*$num1;
          $sqrtNum2 = $num2*$num2;
          $sqrtSum = $sqrtNum1 + $sqrtNum2;
          if(isset($_POST['submit'])){
            echo "<div class='test'> O quadrado de ${num1} é: ${sqrtNum1}</div>";
            echo "<div class='test'> O quadrado de ${num2} é: ${sqrtNum2}</div>";
            echo "<div class='test'> A soma dos quadrados é: ${sqrtSum}</div>";
          }
        ?>
      </form>
    </div>
  </body>
</html>
