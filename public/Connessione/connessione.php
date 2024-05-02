<?php

$uri = "mysql://avnadmin:AVNS_PnR6KUNHbwqpECrBaQR@mysql-2a82da0d-itis-a3fa.a.aivencloud.com:15544/defaultdb?ssl-mode=REQUIRED";

$fields = parse_url($uri);

// build the DSN including SSL settings
$dsn = "mysql:";
$dsn .= "host=" . $fields["host"];
$dsn .= ";port=" . $fields["port"];
$dsn .= ";dbname=NegozioDB";
$dsn .= ";sslmode=verify-ca;sslrootcert=ca.pem";

try {
  $conn = new PDO($dsn, $fields["user"], $fields["pass"]);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
  echo "Connection failed: " . $e->getMessage();
  die(); // Terminate script execution on connection failure
}

?>