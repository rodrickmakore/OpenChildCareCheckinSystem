<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 7/17/14
 * Time: 6:06 PM
 */
class MySQLDataSource implements IDataSource
{

    private $host;
    private $dbName;
    private $userName;
    private $pw;
    private $connection;

    function __construct($host, $dbName, $userName, $pw)
    {
        $this->host = $host;
        $this->dbName = $dbName;
        $this->userName = $userName;
        $this->pw = $pw;
    }

    public function connect()
    {
       $this->connection = new mysqli($this->host, $this->userName, $this->pw, $this->dbName);
       return $this->connection;
    }

    public function execute($query)
    {
        $stmt = $this->connection->prepare($query);
        $result = $this->connection->execute($stmt);
    }
}