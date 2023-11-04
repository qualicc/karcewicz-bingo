<?php

namespace Vendor\KarcewiczBingo;

require_once 'env.php';

class Connection {
    protected $pdo;

    public function __construct() {
        $host = getenv('DBHOST');
        $dbname = getenv('DBNAME');
        $username = getenv('DBLOGIN');
        $password = getenv('DBPASSWORD');

        $this->pdo = new \PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

}
