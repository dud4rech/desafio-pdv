<?php
include_once '../connection.php';
include_once '../getmethod.php';

/* Read */
function selectData() {
    $sql = "SELECT * FROM categories";
    $result = Connection::connect()->prepare($sql);
    $result->execute();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row;
    }

    echo json_encode($data);
}
    
?>