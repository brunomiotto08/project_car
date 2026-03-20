<?php
abstract class PostgresDao{

    protected $conn;

    public function __construct($conn){
        $this->conn = $conn;
    }
}





?>