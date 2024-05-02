<?php


$host = 'mysql-2a82da0d-itis-a3fa.a.aivencloud.com';
$user = 'avnadmin';
$password = 'AVNS_PnR6KUNHbwqpECrBaQR';
$database = 'NegozioDB';
$port = 15544;


$ssl_options = [
    PDO::MYSQL_ATTR_SSL_CA => 'ca.pem',
    PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => true
];

try {

    $connessione  = new PDO(
        "mysql:host=$host;port=$port;dbname=$database",
        $user,
        $password,
        [PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => true] + $ssl_options
    );
    

    $connessione ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    

    
    echo "Connected successfully!";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>