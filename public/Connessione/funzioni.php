<?php

require_once('connessione.php');


//UTENTI
function registerUtente($username, $password, $ruolo, $stato,$nome,$cognome)
{
    global $conn;

    try {

//Se la password è minore di 8 ritorna false
   if (strlen($password) <= 8) {
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

//lOGIN
function checkAdmin()
{
    global $conn;
    try {
        $sql = "SELECT Username FROM Utente WHERE Ruolo = 1";
        $stmt = $conn->prepare($sql);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

    return true;
    } catch (PDOException $e) {
      
        echo "Login failed: " . $e->getMessage();
    }
}

//SelectByID
function SelectByID($username)
{
    global $conn;

    try {
        $sql = "SELECT ID_Utente FROM Utente WHERE Username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
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

//Select Utente
function RichiediUtente($username, $password){
    global $conn;

    try {
        $sql = "SELECT * FROM Utente WHERE username = ? AND password = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username, $password]);
        $utenti = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $utenti;
    } catch (PDOException $e) {
        echo "Errore nella selezione degli utenti: " . $e->getMessage();
        return array();
    }
}

//Cambia Username
function CambioUsername($SessioneID, $UsernameNuovo){
    global $conn;

    try {
        $sql = "UPDATE Utente SET username = ? WHERE ID_Utente = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$UsernameNuovo, $SessioneID]);
        return true;
    } catch (PDOException $e) {
        return false;
    }
}


//Cambia pass
function CambioPass($SessioneID, $PasswordNuovo){
    global $conn;

    try {
        $sql = "UPDATE Utente SET Password = ? WHERE ID_Utente = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$PasswordNuovo, $SessioneID]);
        return true;
    } catch (PDOException $e) {
        return false;
    }
}

//Cambia Stato (Cambia)
function CambiaStato($SessioneID){
    global $conn;

    try {
        $sql = "UPDATE Utente SET Stato = 1 WHERE ID_Utente = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$SessioneID]);
        return true;
    } catch (PDOException $e) {
        return false;
    }
}




//---------------------------------------------------------------------------------
//PRODOTTI
// Seleziona Prodotti
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

// Delete Prodotto
function deleteProduct($Nome) {
    global $conn;

    try {
        $sql = "DELETE FROM Prodotto WHERE Nome = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$Nome]);
        return true;
    } catch (PDOException $e) {
        return false;
    }
}

// Inserisci Prodotto
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

// Aggiorna Prodotto
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

// Seleziona Prodotto per ID
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

// Reset Stock
function resetStock($Nome)
{
    global $conn;

    try {
        $sql = "UPDATE Prodotto SET Stock = 15 WHERE Nome = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$Nome]);
        return true;
    } catch (PDOException $e) {
        return false;
    }
}


//---------------------------------------------------------------------------------
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
//Inserisci PRODOTTI_ORDINATI
function inserisciDettaglioOrdine($ID_Ordine, $id_prodotto, $quantita) {
    
    global $conn;
    try {
        $sql = "INSERT INTO Prodotti_Ordinati (ID_Ordine, ID_Prodotto, Quantità) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$ID_Ordine, $id_prodotto, $quantita]);
        return true;
    } catch (PDOException $e) {
        echo "Error insert order details: " . $e->getMessage();
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

function selectByIDOrdine($id_utente)
{
    global $conn;

    try {
        $sql = "SELECT ID_Ordine 
                FROM Ordine 
                WHERE ID_Utente = ? 
                AND Data_Ordine = (
                    SELECT MAX(Data_Ordine) 
                    FROM Ordine 
                    WHERE ID_Utente = ?
                )";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id_utente, $id_utente]);
        $latestOrder = $stmt->fetch(PDO::FETCH_ASSOC);
        return $latestOrder;
    } catch (PDOException $e) {
        echo "Error selectLatestOrderByUserID: " . $e->getMessage();
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
