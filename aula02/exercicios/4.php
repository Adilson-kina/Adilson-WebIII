<html>
  <head>
    <link rel="icon" type="image/x-icon" href="./images/logo.png">
    <link rel="stylesheet" href="./style/style.css">
    <title>Exercicio 2</title>
  </head>
  <body>
    <div class="align-center">
      <form action="./4.php" method="POST" class="standard-style">
        <h1>Descruba o consumo medio do seu carro </h1>
        <input type="number" name="distancia_percorrida_km" placeholder="Digite a distancia percorrida(km)"> <br>
        <input type="number" name="combustivel_consumido_l" placeholder="Digite a quantidade de combustivel consumido(L)"> <br>
        <input type="submit" name="submit" value="Descubra">
      <?php
          

          if(isset($_POST['submit'])){
            $distancia_percorrida_km = $_POST["distancia_percorrida_km"];
            $combustivel_consumido_l = $_POST["combustivel_consumido_l"];
            $consumo_medio = $distancia_percorrida_km / $combustivel_consumido_l;
            echo "<div class='result'> O consumo medio do carro é ${consumo_medio}Km/L </div>";
          }
        ?>
      </form>
    </div>
  </body>
</html>
