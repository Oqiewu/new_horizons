<?php

class Database {
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $name = "new_horizons";
    public $connection;

    public function getConnection() {
        $this->connection = mysqli_connect($this->host, $this->user, $this->pass, $this->name);
        
        if (!$this->connection) {
            die('<p>Ошибка подключения к базе данных</p>');
        } else {
            return $this->connection;
        }
    }
}


