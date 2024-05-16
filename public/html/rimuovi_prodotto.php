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
        
        // Ottieni l'ID del prodotto rimosso
        $removedProductId = $ID_Prodotto;
        
        // Genera il codice JavaScript per aggiornare sessionStorage
        echo "<script>";
        echo "if (typeof(Storage) !== 'undefined') {";
        echo "  var cart = sessionStorage.getItem('carrello');";
        echo "  if (cart) {";
        echo "    cart = JSON.parse(cart);";
        echo "    var index = cart.indexOf('{$removedProductId}');"; // Utilizzo l'interpolazione delle stringhe di PHP
        echo "    if (index !== -1) {";
        echo "      cart.splice(index, 1);";
        echo "      sessionStorage.setItem('carrello', JSON.stringify(cart));";
        echo "    }";
        echo "  }";
        echo "}";
        echo "</script>";
    }
}

// Reindirizza alla pagina del carrello
header("Location: carrello.php");
exit();
?>
