<?php

namespace Vendor\KarcewiczBingo;

use Vendor\KarcewiczBingo\Connection;

class newEnter extends Connection {
    public function __construct() {
        parent::__construct(); // Wywołaj konstruktor klasy Connection
        try {
            $stmt = $this->pdo->prepare("INSERT INTO odwiedziny (data) VALUES (CURRENT_TIMESTAMP())");
            $stmt->execute();
        } catch (\PDOException $e) {
            die("Błąd podczas dodawania rekordu: " . $e->getMessage());
        }
    }

}
