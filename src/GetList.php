<?php

namespace Vendor\KarcewiczBingo;

use Vendor\KarcewiczBingo\Connection;

use PDO;

class GetList extends Connection {
    public function __construct() {
        parent::__construct(); // Wywołaj konstruktor klasy Connection
    }

    public function getList(){
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM `queryqueue` WHERE zatwierdzono = 0;");
            $stmt->execute();
            $dane = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $dane;
        } catch (\PDOException $e) {
            die("Błąd podczas dodawania rekordu: " . $e->getMessage());
        }
    }
    

}
