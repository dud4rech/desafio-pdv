<?php
header(header:'Access-Control-Allow-Origin: *');
header(header:'Access-Control-Allow-Headers: content-type, *');
header(header:'Access-Control-Allow-Methods: *');

class Connection {

    protected static $connection;

    public function __construct() {
        echo 'new';
    }

    public static function connect() { 
        $host = "pgsql_desafio";
        $db = "applicationphp";
        $user = "root";
        $pw = "root";
        
    
        $conn = new PDO("pgsql:host=$host;dbname=$db", $user, $pw);
        self::$connection = $conn;
        return self::$connection;
    }
}