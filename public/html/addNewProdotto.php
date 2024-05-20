<?php
require("../Connessione/connessione.php"); // Assicurati che questo file stabilisca la connessione al database e definisca $conn
require_once("../Connessione/funzioni.php");

// Verifica se il modulo è stato inviato
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prendi i dati dal form e salva nelle variabili
    $nomeArticolo = $_POST['nomeArticolo'];
    $descrizioneArticolo = $_POST['descrizioneArticolo'];
    $prezzoArticolo = $_POST['prezzoArticolo'];
    $stockArticolo = $_POST['stockArticolo'];
    $nomeImmagine = $_POST['nomeImmagine'];

    // Stampa i dati (opzionale, solo per debugging)
    echo "Nome Articolo: " . $nomeArticolo . "<br>";
    echo "Descrizione Articolo: " . $descrizioneArticolo . "<br>";
    echo "Prezzo Articolo: " . $prezzoArticolo . "<br>";
    echo "Stock Articolo: " . $stockArticolo . "<br>";
    echo "Nome Immagine: " . $nomeImmagine . "<br>";

    $percorsoImmagine = "/public/images/" . $nomeImmagine;
    $result = inserisciProdotto($percorsoImmagine, $nomeArticolo, $descrizioneArticolo, $stockArticolo, $prezzoArticolo);

    if ($result) {
        echo "Prodotto inserito con successo!";
        header("Location: admin.php");
        exit(); 
    } else {
        echo "Errore durante l'inserimento del prodotto.";
    }
}
?>
