<?php


require_once('funzioni1.php');


$name = isset($_POST["name"]) ? $_POST["name"] : '';
$descrizione = isset($_POST["Descrizione"]) ? $_POST["Descrizione"] : '';
$prezzo = isset($_POST['Prezzo']) ? $_POST['Prezzo'] : '';


echo "Name: $name<br>";
echo "Descrizione: $descrizione<br>";
echo "Prezzo: $prezzo<br>";

$selezionaProdotti = selezionaProdottoPerID(15);


if ($name === '' && $descrizione === '' && $prezzo === '') {
    echo "No update";
} else {
    //Usa i valori esistenti se gli input sono null
    // Se è null andra a selezionare prima i suoi dati altrimenti metto $name che proviene dal post
    $saveNome = ($name === '') ? $selezionaProdotti['Nome'] : $name; 
    $saveDescrizione = ($descrizione === '') ? $selezionaProdotti['Descrizione'] : $descrizione;
    $savePrezzo = ($prezzo === '') ? $selezionaProdotti['Prezzo'] : $prezzo;

    if (updateProdotto(15, $saveNome, $saveDescrizione, $savePrezzo)) {
        echo "Update successful!";
    } else {
        echo "Update failed!";
    }
}


?>