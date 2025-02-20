<html>
  <head>
    <link rel="stylesheet" href="./style.css"> 
  </head>
  <body>
    <div class="align-center">
      <form action="./5.php" method="POST">
        <label for="name">Valor:</label>
        <input type="number" name="altura" placeholder="Digite sua altura(cm)"> <br>
        <input type="number" name="peso" placeholder="Digite seu peso(kg)"> <br>
        <input type="submit" name="submit">
        <?php
          $peso_kg = $_POST["peso"];
          $altura_m = $_POST["altura"]/100;
          $imc = $peso_kg/($altura_m * $altura_m);
          if(isset($_POST['submit'])){
            if($imc < 18.5){
              echo "<div class='test'>Baixo peso</div>";
            }
            else if($imc > 18.5 && $imc < 25){
              echo "<div class='test'>Normal</div>";
            }
            else if($imc > 24.99 && $imc <30){
              echo "<div class='test'>Sobrepreso</div>";
            }
            else{
              echo "<div class='test'> Obesidade </div>";
            }
            echo "<div class='test'> IMC:${imc} </div>";
          }
        ?>
      </form>
    </div>
  </body>
</html>
