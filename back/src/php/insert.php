<?php
header(header:'Access-Control-Allow-Origin: *');
header(header:'Access-Control-Allow-Headers: content-type, *');
header(header:'Access-Control-Allow-Methods: *');
include_once "connection.php";

/* Insert */
    $page=$_GET["page"];

    $data = file_get_contents("php://input");
    $decode = json_decode($data, true);

    $code=$decode["code"];

    if($page == 'categories') {
        $name=$decode["name"];
        $tax=$decode["tax"];

        $sql = "INSERT INTO {$page} (code, name, tax) VALUES ('{$code}', '{$name}', '{$tax}')";
        $result = $connection->prepare($sql);
        $result->execute();
        echo json_encode($result);
    } else {
        if($page == 'products') {
            $name=$decode["name"];
            $categoryCode=$decode["category_code"];
            $amount=$decode["amount"];
            $price=$decode["price"];

            $sql = "INSERT INTO {$page} (code, name, amount, price, category_code) VALUES ('{$code}', '{$name}', '{$amount}', '{$price}', '{$categoryCode}')";
            $result = $connection->prepare($sql);
            $result->execute();
            echo json_encode($result);
        } else {
            if($page == 'order_item') {
                $name=$decode["name"];
                $orderCode=$decode["order_code"];
                $productCode=$decode["product_code"];
                $amount=$decode["amount"];
                $price=$decode["price"];
                $tax=$decode["tax"];

                $sql = "INSERT INTO {$page} (code, order_code, name, product_code, amount, price, tax) VALUES ('{$code}', '{$orderCode}', '{$name}', '{$productCode}', '{$amount}', '{$price}', '{$tax}')";
                $result = $connection->prepare($sql);
                $result->execute();
                echo json_encode($result);
            } else {
                if($page == 'orders') {
                    $date=$decode["date"];
                    $total=$decode["total"];
                    $tax=$decode["tax"];

                    $sql = "INSERT INTO {$page} (code, date, total, tax) VALUES ('{$code}','{$date}','{$total}', '{$tax}')";
                    $result = $connection->prepare($sql);
                    $result->execute();
                    echo json_encode($result);
                }   
            }
        }
    }
          
?>