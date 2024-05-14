<?php
require("../Connessione/connessione.php");
require_once("../Connessione/funzioni.php");

// Avvia la sessione
session_start();

if (isset($_POST['ID_Prodotto'])) {
    $ID_Prodotto = $_POST['ID_Prodotto'];
    
    // Controlla se il prodotto è nel carrello e rimuovilo
    if (($key = array_search($ID_Prodotto, $_SESSION['carrello'])) !== false) {
        unset($_SESSION['carrello'][$key]);
    }
}

// Reindirizza nuovamente alla pagina del carrello
header("Location: carrello.php");
exit();
?>
