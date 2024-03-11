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
    $orderCode=$decode["order_code"];
    $productCode=$decode["product_code"];
    $amount=$decode["amount"];
    $price=$decode["price"];

    $sql = "INSERT INTO order_item (code, order_code, name, product_code, amount, price, tax) VALUES (:code, :order_code, :name, :product_code, :amount, :price, :tax)";
    $result = Connection::connect()->prepare($sql);
    $result->bindParam(':code', $code, PDO::PARAM_INT);
    $result->bindParam(':order_code', $orderCode, PDO::PARAM_INT);
    $result->bindParam(':name', $name, PDO::PARAM_STR);
    $result->bindParam(':product_code', $productCode, PDO::PARAM_INT);
    $result->bindParam(':amount', $amount, PDO::PARAM_INT);
    $result->bindParam(':price', $price, PDO::PARAM_INT);
    $result->bindParam(':tax', $tax, PDO::PARAM_INT);
    $result->execute();

    echo json_encode($result);
}
    
    