<?php

require_once('connessione.php');

//UTENTI
function registerUtente($username, $password, $ruolo, $stato,$nome,$cognome)
{
    global $conn;

    try {

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql_register = "INSERT INTO Utente (Username, Password, Ruolo, Stato,Nome,Cognome) VALUES (?, ?, ?, ?, ?,?)";

        $stmt = $conn->prepare($sql_register);
        $stmt->execute([$username, $hashed_password, $ruolo, $stato, $nome,$cognome]);

        return true;
    } catch (PDOException $e) {
        return false;
    }
}

function loginUtente($username, $password)
{
    global $conn;

    try {
        $sql = "SELECT Password FROM Utente WHERE Username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username]);
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
    global $conn;

    try {
        $sql = "SELECT * FROM Utente";
        $stmt = $conn->query($sql);
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
    global $conn;

    try {
        $sql = "INSERT INTO Prodotto (Immagine, Nome, Descrizione, Stock, Prezzo) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$immagine, $nome, $descrizione, $stock, $prezzo]);
        return true;
    } catch (PDOException $e) {
        return false;
    }
}

function selezionaProdotti() {
    global $conn;

    try {
        $sql = "SELECT * FROM Prodotto";
        $stmt = $conn->query($sql);
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
    global $conn;

    try {
        $sql = "SELECT Prodotto.Nome, Prodotto.Immagine, Prodotto.Descrizione, Prodotto.Prezzo
        FROM Prodotto
        JOIN Prodotti_Ordinati ON Prodotti_Ordinati.ID_Prodotto = Prodotto.ID_Prodotto
        JOIN Ordine ON Ordine.ID_Ordine = Prodotti_Ordinati.ID_Ordine
        JOIN Utente ON Utente.ID_Utente = Ordine.ID_Utente";

        $stmt = $conn->query($sql);
        return true;
    } catch (PDOException $e) {
        return false;
    }
}

function OrdinatiProdotti()
{
    global $conn;

    try {
        $sql = "SELECT Prodotto.Nome, Prodotto.Immagine, Prodotto.Descrizione, Prodotto.Prezzo
        FROM Prodotto
        JOIN Prodotti_Ordinati ON Prodotti_Ordinati.ID_Prodotto = Prodotto.ID_Prodotto
        JOIN Ordine ON Ordine.ID_Ordine = Prodotti_Ordinati.ID_Ordine
        JOIN Utente ON Utente.ID_Utente = Ordine.ID_Utente";
        $stmt = $conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error fetching product details: " . $e->getMessage();
        return false;
    }
}

//---------------------------------------------------------------------------------
//ORDINI
function inserisciOrdine($id_utente, $data_ordine, $stato)
{
    global $conn;

    try {
        $sql = "INSERT INTO Ordine (ID_Utente, Data_Ordine, Stato) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id_utente, $data_ordine, $stato]);
        return true;
    } catch (PDOException $e) {
        return false;
    }
}

function fetchAllProductDetails()
{
    global $conn;

    try {
        $sql = "SELECT Immagine, Nome, Descrizione, Stock, Prezzo FROM Prodotto";
        $stmt = $conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error fetching product details: " . $e->getMessage();
        return false;
    }
}

?>
