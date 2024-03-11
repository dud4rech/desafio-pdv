<?php
header(header:'Access-Control-Allow-Origin: *');
header(header:'Access-Control-Allow-Headers: content-type, *');
header(header:'Access-Control-Allow-Methods: *');
include_once "getmethod.php";
include_once "selector.php";

/* Read */
function selectData() {
    $host = "pgsql_desafio";
    $db = "applicationphp";
    $user = "root";
    $pw = "root";

    $connection = new PDO("pgsql:host=$host;dbname=$db", $user, $pw);
    $page=$_GET["page"];

    $sql = "SELECT * FROM {$page}";
    $result = $connection->query($sql);

    $data = [];
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row;
    }

    
    echo json_encode($data);
}
    
?>