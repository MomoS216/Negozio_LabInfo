<?php
require("../Connessione/connessione.php");
require_once("../Connessione/funzioni.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['azione']) && isset($_POST['id_utente'])) {
        $azione = $_POST['azione'];
        $idUtente = $_POST['id_utente'];

        if ($azione === 'evadi') {
            CambiaStatoOrdine($idUtente);
        } elseif ($azione === 'non_evadi') {
            TogliStatoOrdine($idUtente);
        }
    }
    // Reindirizza alla pagina di visualizzazione
    header("Location: admin.php");
    exit();
}
?>
