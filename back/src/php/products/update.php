<?php
include_once '../connection.php';
include_once '../getmethod.php';

/* Update */
function updateValues() {
    $action=$_GET["action"];
    $newvalue=$_GET["newvalue"];
    $column=$_GET["column"];
    $value=$_GET["value"];

    $sql = "UPDATE products SET {$action}={$newvalue} WHERE {$column}='{$value}'";
    $result = Connection::connect()->prepare($sql);
    $result->execute();
    
    $data = [];
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row;
    }

    echo json_encode($data);
};

?>