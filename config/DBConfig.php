<?php

class DBConfig
{
    // database params
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $db_name = 'smart_farm';

    private $connection;

    // open connection
    public function open_connection()
    {
        $this->connection = null;

        try {

            $this->connection = new PDO(
                'mysql:host=' . $this->host .
                    ';dbname=' . $this->db_name,
                $this->username,
                $this->password
            );
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo ('Connection error' . $exception->getMessage());
        }

        return $this->connection;
    }

    // close connection
    public function close_connection()
    {
        $this->connection = null;
    }
}
