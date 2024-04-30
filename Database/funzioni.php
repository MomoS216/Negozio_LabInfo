<?php

require_once('connessione.php');

//UTENTI
function registerUtente($username, $password, $ruolo, $stato)
{
    global $connessione;

    try {

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql_register = "INSERT INTO Utente (Username, Password, Ruolo, Stato) VALUES ('$username', '$hashed_password', '$ruolo', '$stato')";

        $connessione->exec($sql_register);

        return true;
    } catch (PDOException $e) {
        return false;
    }
}

function loginUtente($username, $password)
{
    global $connessione;
    try {
        $username = $connessione->quote($username);
        $sql = "SELECT * FROM Utente WHERE Username = $username";
        $stmt = $connessione->query($sql);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['Password'])) {

          return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
      
        echo "Login failed: " . $e->getMessage();
    }
}

function selezionaUtenti() {
    global $connessione;

    try {
        $sql = "SELECT * FROM Utente";
        $stmt = $connessione->query($sql);
        $utenti = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $utenti;
    } catch (PDOException $e) {
        
        echo "Errore nella selezione degli utenti: " . $e->getMessage();
        return array();
    }
}




//---------------------------------------------------------------------------------
//PRODOTTI
function inserisciProdotto($immagine, $nome, $descrizione, $stock, $prezzo)
{
    global $connessione;

    try {
        $sql = "INSERT INTO Prodotto (Immagine, Nome, Descrizione, Stock, Prezzo) VALUES ('$immagine', '$nome', '$descrizione', '$stock', '$prezzo')";
        $connessione->exec($sql);
        return true;
    } catch (PDOException $e) {
        return false;
    }
}

function selezionaProdotti() {
    global $connessione;

    try {
        $sql = "SELECT * FROM Prodotto";
        $stmt = $connessione->query($sql);
        $prodotti = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $prodotti;
    } catch (PDOException $e) {
        
        echo "Errore nella selezione dei prodotti: " . $e->getMessage();
        return array();
    }
}




//PRODOTTI_ORDINATI
function selezionaProdottiOrdinati()
{
    global $connessione;

    try {
        $sql = "SELECT Utente.Username, Ordine.Data_Ordine, Prodotto.Nome, Prodotto.Descrizione, Prodotto.Prezzo
        FROM Utente
        JOIN Ordine ON Utente.ID_Utente = Ordine.ID_Utente
        JOIN Prodotti_Ordinati ON Ordine.ID_Ordine = Prodotti_Ordinati.ID_Ordine
        JOIN Prodotto ON Prodotti_Ordinati.ID_Articolo = Prodotto.ID_Prodotto;";

        $connessione->exec($sql);
        return true;
    } catch (PDOException $e) {
        return false;
    }
}

//---------------------------------------------------------------------------------
//ORDINI
function inserisciOrdine($id_utente, $data_ordine, $stato)
{
    global $connessione;

    try {
        $sql = "INSERT INTO Ordine (ID_Utente, Data_Ordine, Stato) VALUES ('$id_utente', '$data_ordine', '$stato')";
        $connessione->exec($sql);
        return true;
    } catch (PDOException $e) {
        return false;
    }
}


?>