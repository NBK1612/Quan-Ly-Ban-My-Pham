<?php
class DB {
    protected  $con;

    public function __construct(){
        $host = "localhost";
        $dbname = "website";
        $username = "root";
        $password = "";
        
        try {
            $this->con = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}