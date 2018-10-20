<?php
class DB {

    private static $host = "localhost";
    private static $database = "n00153357";
    private static $username = "root";
    private static $password = "";
    
    public static function getInstance() {
        $dsn = 'mysql:host=' . DB::$host . ';dbname=' . DB::$database;

        $connection = new PDO($dsn, DB::$username, DB::$password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $connection;
    }

}