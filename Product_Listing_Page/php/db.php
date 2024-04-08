<?php

class DatabaseHandler
{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbName = "products_db";

    protected function connect()
    {
        $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbName;
        $pdo = new PDO($dsn, $this->username, $this->password);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }
}
