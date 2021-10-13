<?php

class DatabasePDOConfiguration
{
    public $db;

    private $host = "localhost";
    private $username = "root";
    private $dbName = "ubt";
    private $password = "";

    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $this->db = new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->username, $this->password);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}


class DatabaseMySQLiConfiguration
{
    public $db;

    private $host = "localhost";
    private $username = "root";
    private $dbName = "ubt";
    private $password = "";

    public function __construct()
    {
        $this->db = new mysqli($this->host, $this->username, $this->password, $this->dbName);
    }

    protected function getConnection()
    {
        return $this->connection;
    }
}
