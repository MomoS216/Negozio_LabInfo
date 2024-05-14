<?php

require_once('connessione.php');

//UTENTI
function registerUtente($username, $password, $ruolo, $stato,$nome,$cognome)
{
    global $conn;

    try {
      //Primo Controllo
        $sql_check = "SELECT COUNT(*) AS count FROM Utente WHERE Username = ? OR Nome = ? OR Cognome = ?";
        $stmt_check = $conn->prepare($sql_check);
        $stmt_check->execute([$username, $nome, $cognome]);
        $row = $stmt_check->fetch(PDO::FETCH_ASSOC);

        if ($row['count'] > 0) {
            return false;
        }
   //Secondo Controllo
        if (strlen($password) > 8) {
            return false;
        }

        //Inserimento
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql_register = "INSERT INTO Utente (Username, Password, Ruolo, Stato,Nome,Cognome) VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql_register);
        $stmt->execute([$username, $hashed_password, $ruolo, $stato, $nome, $cognome]);

        return true;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

//lOGIN
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

//Seleziona utenti
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

function RichiediUtente($username, $password){
    global $conn;

    try {
        $sql = "SELECT * FROM Utente
         WHERE username = $username, 
         password= $password";
        $stmt = $conn->query($sql);
        $utenti = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $utenti;
    } catch (PDOException $e) {
        
        echo "Errore nella selezione degli utenti: " . $e->getMessage();
        return array();
    }
}
//Cambia nome
function CambioUsername($SessioneID, $UsernameNuovo){
    global $conn;

    try {
        $sql = "UPDATE Username FROM Utente
        SET username = $UsernameNuovo,
        WHERE ID_Utente = $SessioneID";
        $stmt = $conn->query($sql);
        $stmt->execute([$UsernameNuovo]);
        return true;
    } catch (PDOException $e) {
        return false;
    }
}


//Cambia pass
function CambioPass($SessioneID, $PasswordNuovo){
    global $conn;

    try {
        $sql = "UPDATE Username FROM Utente
        SET Password = $PasswordNuovo,
        WHERE ID_Utente = $SessioneID";
        $stmt = $conn->query($sql);
        $stmt->execute([$PasswordNuovo]);
        return true;
    } catch (PDOException $e) {
        return false;
    }
}



//---------------------------------------------------------------------------------
//PRODOTTI


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
//Delete
function deleteProduct($Nome) {
{
    global $conn;

    try {
        $sql = "DELETE FROM Prodotto * WHERE Nome = $Nome";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$Nome]);
        return true;
    } catch (PDOException $e) {
        return false;
    }
}
}

//Aggiungi 
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



//Update prodotto
function updateProdotto($id, $nome, $descrizione , $prezzo)
{
    global $conn;

    try {
        $sql_update = "UPDATE Prodotto SET Nome = ?, Descrizione = ?, Prezzo = ? WHERE ID_Prodotto = ?";
        
        $stmt = $conn->prepare($sql_update);
        $stmt->execute([$nome, $descrizione, $prezzo, $id]);
        
        return true;
    } catch (PDOException $e) {
        return false;
    }
}

//X update prodotto 
function selezionaProdottoPerID($ID_Prodotto) {
    global $conn;

    try {
        $sql = "SELECT Nome, Descrizione, Prezzo FROM Prodotto WHERE ID_Prodotto = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$ID_Prodotto]);
        $prodotto = $stmt->fetch(PDO::FETCH_ASSOC);
        return $prodotto;
    } catch (PDOException $e) {
        echo "Errore nella selezione del prodotto: " . $e->getMessage();
        return array();
    }
}

//Reset Stock
function resetStock($Nome)
{
    global $conn;

    try {
        $sql = "UPDATE Prodotto
        SET Stock = 15
        WHERE Nome = $Nome";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$Nome]);
        return true;
    } catch (PDOException $e) {
        return false;
    }
}

//PRODOTTI_ORDINATI

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
