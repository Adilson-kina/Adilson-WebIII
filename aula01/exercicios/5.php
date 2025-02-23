<html>
  <head>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="icon" type="image/x-icon" href="./images/logo.png">
    <title>Exercicio 5</title>
  </head>
  <body>
    <div class="align-center">
      <form action="./5.php" method="POST" class="standard-style">
        <h1>Calcule seu IMC</h1>
        <input type="number" name="altura" placeholder="Digite sua altura(cm)"> <br>
        <input type="number" name="peso" placeholder="Digite seu peso(kg)"> <br>
        <input type="submit" name="submit" value="Calcular">
        <?php
          $peso_kg = $_POST["peso"];
          $altura_m = $_POST["altura"]/100;
          $imc = $peso_kg/($altura_m * $altura_m);
          $rounded_imc = round($imc, 2);
          if(isset($_POST['submit'])){
            if($imc < 18.5){
              echo "<div class='result'>Baixo peso</div>";
            }
            else if($imc > 18.5 && $imc < 25){
              echo "<div class='result'>Normal</div>";
            }
            else if($imc > 24.99 && $imc <30){
              echo "<div class='result'>Sobrepreso</div>";
            }
            else{
              echo "<div class='result'> Obesidade </div>";
            }
            echo "<div class='result'> IMC:${rounded_imc} </div>";
          }
        ?>
      </form>
    <?php
      echo "<img src='./images/tabela-IMC.png' class='imc-table'></img>";
    ?>
    </div>
  </body>
</html>
