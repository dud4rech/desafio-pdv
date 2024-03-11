<?php
header(header:'Access-Control-Allow-Origin: *');
header(header:'Access-Control-Allow-Headers: content-type, *');
header(header:'Access-Control-Allow-Methods: *');

/* Update */
function updateValues() {
    $host = "pgsql_desafio";
    $db = "applicationphp";
    $user = "root";
    $pw = "root";
    $connection = new PDO("pgsql:host=$host;dbname=$db", $user, $pw);
    
    $action=$_GET["action"];
    $newvalue=$_GET["newvalue"];
    $column=$_GET["column"];
    $value=$_GET["value"];

    $sql = "UPDATE products SET {$action}={$newvalue} WHERE {$column}='{$value}'";
    $result = $connection->query($sql);

    $data = [];
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row;
    }

    echo json_encode($data);
};
updateValues();

?>