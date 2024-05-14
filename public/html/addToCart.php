<?php
session_start();

// Ricevi l'array degli ID degli articoli inviato dalla forma
$carrello = json_decode($_POST['carrello']) ?? [];

// Aggiungi l'array degli ID alla sessione PHP
$_SESSION['carrello'] = $carrello;

// Reindirizza l'utente alla pagina del carrello
header("Location: carrello.php");
?>
