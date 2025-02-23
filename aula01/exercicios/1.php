<!DOCTYPE html>
<html>
  <head>
    <title>Exercicio 1</title>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="icon" type="image/x-icon" href="./images/logo.png">
  </head>
  <body>
    <?php
      $val1 = 5;
      $val2 = 7;
      $val3 = 9;
      $media = ($val1+$val2+$val3)/3;
      echo "<div class='align-center'><div class='standard-style'><b>Os numeros são:</b> <br> numero 1:${val1} <br> numero 2:${val2} <br> numero 3:${val3} <br> ";
      echo "E a media é:${media}</div></div>";
    ?>
  </body>
</html>
