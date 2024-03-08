<?php
/* DB connection */
$host = "pgsql_desafio";
$db = "applicationphp";
$user = "root";
$pw = "root";

try {
    $connection = new PDO("pgsql:host=$host;dbname=$db", $user, $pw);
} catch (Exception $error) {
    echo "Error: {$error->getMessage()}";
};

?>