<?php
header(header:'Access-Control-Allow-Origin: *');
header(header:'Access-Control-Allow-Headers: content-type, *');
header(header:'Access-Control-Allow-Methods: *');
include_once "connection.php";

/* Delete */
    $page=$_GET["page"];
    $code=$_GET["code"];
    
    $sql = "DELETE FROM {$page} WHERE code={$code}";
    $result = $connection->prepare($sql);
    $result->execute();

    echo json_encode($result);
    
?>