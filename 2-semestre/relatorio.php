
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style/reset.css">
  <link rel="stylesheet" href="style/style.css">
  <title>Alteração</title>
</head>
<body>
  <div class="center">
    <div class="container">
      <div class="date-container">
        <span id="date"></span>
      </div>
      <?php
      include 'connection.php';
      $conn = Connect();

      $query = $conn->prepare('SELECT id, modelo, ano, placa, cor from veiculos');
      $query->execute();
      $res = $query->fetchall(PDO::FETCH_ASSOC);
      $id = $res["id"];
      $model = $res["modelo"];
      $year = $res["ano"];
      $plate = $res["placa"];
      $color = $res["cor"];
      /*echo "
      <table class='fetched'>
        <tr>
          <th>Id</th>
          <th>Modelo</th>
          <th>Ano</th>
          <th>Placa</th>
          <th>Cor</th>
        </tr>
        <tr>
          <td>${id}</td>
          <td>${model}</td>
          <td>${year}</td>
          <td>${plate}</td>
          <td>${color}</td>
        </tr>
        </table>"; */
      echo "
      <table class='fetched'>
        <tr>
          <th>Id</th>
          <th>Modelo</th>
          <th>Ano</th>
          <th>Placa</th>
          <th>Cor</th>
        </tr>";
      foreach ($res as $row) {
        echo "<tr>";
        foreach ($row as $columns) {
          echo "<td>${columns}</td>";
        }
        echo "</tr>";
      } 
      echo "</table>";
      ?>
    </div>
  </div>
</div>
  <script src="./script/script.js"></script>
</body>
</html>
