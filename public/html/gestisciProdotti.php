<?php
require("../Connessione/connessione.php");
require_once("../Connessione/funzioni.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $azione = $_POST['azione'];

    switch ($azione) {
        case 'cancella':
            $nome_prodotto = $_POST['nome_prodotto'];
            if (deleteProduct($nome_prodotto)) {
                echo "Prodotto cancellato con successo.";
                //header("Location: admin.php");
            } else {
                echo "Errore durante la cancellazione.";
            }
            break;
        case 'modifica':
            $id_prodotto = $_POST['id_prodotto'];
            //prendere valori dal modale
            exit();
            break;
        case 'restock':
            $nome_prodotto = $_POST['nome_prodotto'];
            if (resetStock($nome_prodotto)) {
                echo "Restock effettuato con successo.";
                //header("Location: admin.php");
            } else {
                echo "Errore durante il restock.";
            }
            break;
    }

    header("Location: admin.php");
    exit();
}
?>
