<?php

require('../Connessione/connessione.php');
require('../Connessione/funzioni.php');
// Verifica se il metodo di richiesta è POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Controlla se i campi usernameAccedi e passwordAccedi sono stati inviati
    if (isset($_POST["usernameRegistrati"]) && isset($_POST["passwordRegistrati"])) {
        // Recupera i valori dei campi
        $username = $_POST["usernameRegistrati"];
        $password = $_POST["passwordRegistrati"];
        $nome = $_POST["nomeRegistrati"];
        $cognome = $_POST["cognomeRegistrati"];

    if(registerUtente($username,$password,0,0,$nome,$cognome)){
        header('Location: public/html/admin.php');
    }else{
        echo"registrazione fallita";
    }

    } else {
        // Se uno dei campi non è stato inviato, gestisci l'errore di conseguenza
        echo "Errore: Uno o più campi mancanti.";
    }
} else {
    // Se la richiesta non è di tipo POST, gestisci l'errore di conseguenza
    echo "Errore: La richiesta non è di tipo POST.";
}
?>