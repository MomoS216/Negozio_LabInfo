<?php
require("../Connessione/connessione.php");
require_once("../Connessione/funzioni.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $azione = $_POST['azione'];
    $idUtente = $_POST['id_utente'];

    switch ($azione) {
        case 'abilita_admin':
            $success = CambiaRuoloUtente($idUtente);
            break;
        case 'togli_admin':
            $success = TogliRuoloUtente($idUtente);
            break;
        case 'abilita_utente':
            $success = CambiaStatoUtente($idUtente);
            break;
        case 'togli_utente':
            $success = TogliStatoUtente($idUtente);
            break;
        default:
            $success = false;
            break;
    }

    if ($success) {
        header("Location: admin.php");
    } else {
        header("Location: admin.php");
        
    }
    exit();
}
?>
