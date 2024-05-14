<?php
 $date = date('m/d/Y h:i:s a', time());
 //$saveUsername =  $_SESSION['username'];
 //$getIDUSER = SelectByID($saveUsername);
 $getIDUSER = 2;
 
 $selectByIDOrdine = selectByIDOrdine($getIDUSER);
 $_SESSION['carrello'] = $carrello;
 foreach ($_SESSION['carrello'] as $ID_Prodotto) {
    inserisciOrdine($getIDUSER,$date,1);
    $insert = inserisciDettaglioOrdine($selectByIDOrdine,$ID_Prodotto, 1);
    }


?>