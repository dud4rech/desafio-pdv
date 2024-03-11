<?php
header(header:'Access-Control-Allow-Origin: *');
header(header:'Access-Control-Allow-Headers: content-type, *');
header(header:'Access-Control-Allow-Methods: *');

function getMethod() {
    $method = $_SERVER['REQUEST_METHOD'];

    if($method == 'GET') {
        echo selectData();
    } else 
        if($method == 'POST') {
            insertData();
    } else
        if($method == 'DELETE') {
            deleteData();
    } 
}

getMethod();

?>