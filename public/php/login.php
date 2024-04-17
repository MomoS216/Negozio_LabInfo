<?php
// Verifica se il metodo di richiesta è POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Controlla se i campi usernameAccedi e passwordAccedi sono stati inviati
    if (isset($_POST["usernameAccedi"]) && isset($_POST["passwordAccedi"])) {
        // Recupera i valori dei campi
        $username = $_POST["usernameAccedi"];
        $password = $_POST["passwordAccedi"];

        // Ora puoi fare ciò che vuoi con i valori dei campi
        // Ad esempio, stampali a schermo
        echo "Username: " . $username . "<br>";
        echo "Password: " . $password . "<br>";
    } else {
        // Se uno dei campi non è stato inviato, gestisci l'errore di conseguenza
        echo "Errore: Uno o più campi mancanti.";
    }
} else {
    // Se la richiesta non è di tipo POST, gestisci l'errore di conseguenza
    echo "Errore: La richiesta non è di tipo POST.";
}
?>
