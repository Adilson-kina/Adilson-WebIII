<?php 

function Connect(){
  $host = 'localhost';
  $dbName = 'automoveis';
  $user = 'root';
  $pwd = '';

  return new PDO("mysql:host=$host;dbname=$dbName", "$user", "$pwd");
}

?>
