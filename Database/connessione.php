<?php



  $connessione = new mysqli($host, $username, $password, $database);
if ($connessione->connect_error) {
    die("Connessione fallita: " . $connessione->connect_error);
}
?>