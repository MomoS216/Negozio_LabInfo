<?php

session_start();
require_once('../Connessione/funzioni.php');
$date = date('Y-m-d H:i:s', time());//Prende il tempo reale in cuo va a fare ordine

//Carrello session
$carrello = json_decode($_POST['carrello']) ?? [];
$_SESSION['carrello'] = $carrello;

//C'è esiste la sessione username
if (isset($_SESSION['username'])) {
    $saveUsername =  $_SESSION['username'];
    $getIDUSER = SelectByID($saveUsername);
    $insert2 = inserisciOrdine($getIDUSER['ID_Utente'], $date, 0);

    //Inserimento Ordine
    $selectByIDOrdine = selectByIDOrdine($getIDUSER['ID_Utente']);
    //Controllo se esiste
    if (isset($_SESSION['carrello']) && is_array($_SESSION['carrello'])) {
        //Foreach
        foreach ($_SESSION['carrello'] as $ID_Prodotto) {
            $insert = inserisciDettaglioOrdine($selectByIDOrdine['ID_Ordine'], $ID_Prodotto, 1);//Insert
            header("Location: carrello.php"); //Link
        }
    }
}

?>
