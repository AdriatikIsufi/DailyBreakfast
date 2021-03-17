<?php

class dbconnect {
    public $pdo;
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbname = 'db-web';

    public function __construct(){
        try{
            $link = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->username, $this->password);
            $this->pdo = $link;
        }catch(PDOException $e){
            echo "Connection failed: ".$e->getMessage();
        }
    }
}

?>
