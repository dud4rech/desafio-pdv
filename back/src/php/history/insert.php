<?php
header(header:'Access-Control-Allow-Origin: *');
header(header:'Access-Control-Allow-Headers: content-type, *');
header(header:'Access-Control-Allow-Methods: *');
include_once "../getmethod.php";

/* Insert */
function insertData() {
    $host = "pgsql_desafio";
    $db = "applicationphp";
    $user = "root";
    $pw = "root";
    $connection = new PDO("pgsql:host=$host;dbname=$db", $user, $pw);

    $data = file_get_contents("php://input");
    $decode = json_decode($data, true);

    $code=$decode["code"];
    $date=$decode["date"];
    $total=$decode["total"];
    $tax=$decode["tax"];

    $sql = "INSERT INTO orders (code, date, total, tax) VALUES (:code, :date, :total, :tax)";
    $result = $connection->prepare($sql);
    $result->bindParam(':code', $code, PDO::PARAM_INT);
    $result->bindParam(':date', $date, PDO::PARAM_STR);
    $result->bindParam(':total', $total, PDO::PARAM_STR);
    $result->bindParam(':tax', $tax, PDO::PARAM_INT);
    $result->execute();

    echo json_encode($result);
}
    
    