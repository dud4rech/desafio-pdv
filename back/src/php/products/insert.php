<?php
include_once '../connection.php';
include_once '../getmethod.php';

/* Insert */
function insertData() {
    $data = file_get_contents("php://input");
    $decode = json_decode($data, true);

    $code=$decode["code"];
    $name=$decode["name"];
    $amount=$decode["amount"];
    $price=$decode["price"];
    $categoryCode=$decode["category_code"];
   
    $sql = "INSERT INTO products (code, name, amount, price, category_code) VALUES (:code, :name, :amount, :price, :category_code)";
    $result = Connection::connect()->prepare($sql);
    
    $result->bindParam(':code', $code, PDO::PARAM_INT);
    $result->bindParam(':name', $name, PDO::PARAM_STR);
    $result->bindParam(':amount', $amount, PDO::PARAM_INT);
    $result->bindParam(':price', $price, PDO::PARAM_INT);
    $result->bindParam(':category_code', $categoryCode, PDO::PARAM_INT);
    $result->execute();

    return json_encode($result);
}
    
    