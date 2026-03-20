<?php

include_once(__DIR__ . '/DaoFactory.php');
include_once(__DIR__ . '/PostgresVeiculoDao.php');

class PostgresDaoFactory extends DaoFactory{

    private $host = "localhost";
    private $port = "5432";
    private $dbname = "postgres";  
    private $username = "postgres";
    private $password = "ucs";  

    public $conn;

    public function getConnection(){

        $this->conn = null;

        try{
            $this->conn = new PDO("pgsql:host=$this->host;port=$this->port;dbname=$this->dbname", $this->username, $this->password);
            
        }catch(PDOException $e){
            echo "Connection error: " . $e->getMessage();


        }

        return $this->conn;

    }

    public function getVeiculoDao(){
        return new PostgresVeiculoDao($this->getConnection());
    }


}




?>