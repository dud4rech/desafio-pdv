<?php
header(header:'Access-Control-Allow-Origin: *');
header(header:'Access-Control-Allow-Headers: content-type, *');
header(header:'Access-Control-Allow-Methods: *');
include_once "../getmethod.php";

/* Delete */
function deleteData() {
    $host = "pgsql_desafio";
    $db = "applicationphp";
    $user = "root";
    $pw = "root";
    $connection = new PDO("pgsql:host=$host;dbname=$db", $user, $pw);

    $sql = "DELETE FROM categories WHERE code = :code";
    $result = $connection->prepare($sql);
    $result->bindParam(':code', $code);
    $code = $_GET['code'];
    $result->execute();

    echo json_encode($result);
}

    
?>