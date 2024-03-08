<?php
header(header:'Access-Control-Allow-Origin: *');
header(header:'Access-Control-Allow-Headers: content-type, *');
header(header:'Access-Control-Allow-Methods: *');
include_once "connection.php";

/* Read */
    $page=$_GET["page"];
    $action=$_GET["action"];
    $column=$_GET["column"];
    $value=$_GET["value"];

    $sql = "SELECT {$action} FROM {$page} WHERE {$column}='{$value}'";
    $result = $connection->query($sql);

    $data = [];
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row;
    }

    echo json_encode($data);

?>