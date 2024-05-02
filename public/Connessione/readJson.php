
<?php

require_once('connessione2.php'); 
require_once('funzioni2.php'); 

$filename = "contenuti.json"; 
$data = file_get_contents($filename);  
$array = json_decode($data, true);  

if (is_array($array)) {
    foreach ($array as $category => $products) {
        foreach ($products as $product) {
            $nome = $product['nome'];
            $descrizione = $product['descizione'];
            $prezzo = $product['prezzo'];
            $stock = $product['stock'];
            $percorso = $product['percorso'];
            echo "Nome: $nome, Descrizione: $descrizione, Prezzo: $prezzo, Stock: $stock, Percorso: $percorso <br>";
            inserisciProdotto($percorso, $nome, $descrizione, $stock, $prezzo);
        }
    }
    echo 'Data inserted successfully';
} else {
    echo 'Error: JSON data is not in the correct format';
}



?>