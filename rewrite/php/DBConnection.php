<?php

class DBConnection {
  // Connection dependencies
  private $dbName = "loja";
  private $dbUser = "root";
  private $dbPwd = "";
  private $host = "localhost";

  public function connect() {
    try {
      $conn = new PDO("mysql:host={$this->host};dbname={$this->dbName}", $this->dbUser, $this->dbPwd);
      // Set error mode to exception to catch errors properly
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $conn;
    } catch (PDOException $error) {
      echo "Error: " . $error->getMessage();
      return null;
    }
  }

}

?>
