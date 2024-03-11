<?php
include_once '../connection.php';
include_once '../getmethod.php';

/* Delete */
function deleteData() {
    $sql = "DELETE FROM products WHERE code = :code";
    $result = Connection::connect()->prepare($sql);
    $result->bindParam(':code', $code);
    $code = $_GET['code'];
    $result->execute();

    echo json_encode($result);
}

?>