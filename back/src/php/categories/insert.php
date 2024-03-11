<?php
include_once '../connection.php';
include_once '../getmethod.php';

/* Insert */
function insertData() {
    $data = file_get_contents("php://input");
    $decode = json_decode($data, true);

    $code=$decode["code"];
    $name=$decode["name"];
    $tax=$decode["tax"];

    $sql = "INSERT INTO categories (code, name, tax) VALUES (:code, :name, :tax)";

    $result = Connection::connect()->prepare($sql);
    $result->bindParam(':code', $code, PDO::PARAM_INT);
    $result->bindParam(':name', $name, PDO::PARAM_STR);
    $result->bindParam(':tax', $tax, PDO::PARAM_INT);
    $result->execute();

    echo json_encode($result);
}
    
    