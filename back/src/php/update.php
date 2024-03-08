<?php
header(header:'Access-Control-Allow-Origin: *');
header(header:'Access-Control-Allow-Headers: content-type, *');
header(header:'Access-Control-Allow-Methods: *');
include_once "connection.php";

/* Update */
    $page=$_GET["page"];
    $action=$_GET["action"];
    $newvalue=$_GET["newvalue"];
    $column=$_GET["column"];
    $value=$_GET["value"];

    $sql = "UPDATE ${page} SET {$action}={$newvalue} WHERE {$column}='{$value}'";
    $result = $connection->query($sql);

    $data = [];
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row;
    }

    echo json_encode($data);

?>