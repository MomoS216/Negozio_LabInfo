<?php

  $host = "mysql-2a82da0d-itis-a3fa.a.aivencloud.com";
  $username = "avnadmin";
  $database = "NegozioDB";

  $connessione = new mysqli($host, $username, $password, $database);
if ($connessione->connect_error) {
    die("Connessione fallita: " . $connessione->connect_error);
}
?>