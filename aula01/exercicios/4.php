<html>
  <head>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="icon" type="image/x-icon" href="./images/logo.png">
    <title>Exercicio 4</title>
  </head>
  <body>
    <div class="align-center">
      <form action="./4.php" method="POST" class="standard-style">
        <label for="name">Descubra a soma de dois quadrados</label>
        <input type="number" name="num1" placeholder="Digite um numero"> <br>
        <input type="number" name="num2" placeholder="Digite outro numero"> <br>
        <input type="submit" name="submit" value="Some">
        <?php
          if(isset($_POST['submit'])){
            $num1 = $_POST["num1"];
            $num2 = $_POST["num2"];
            $sqrtNum1 = $num1*$num1;
            $sqrtNum2 = $num2*$num2;
            $sqrtSum = $sqrtNum1 + $sqrtNum2;
            echo "<div class='result'> O quadrado de ${num1} é: ${sqrtNum1}</div>";
            echo "<div class='result'> O quadrado de ${num2} é: ${sqrtNum2}</div>";
            echo "<div class='result'> A soma dos quadrados é: ${sqrtSum}</div>";
          }
        ?>
      </form>
    </div>
  </body>
</html>
