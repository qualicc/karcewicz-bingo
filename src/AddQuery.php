<?php

namespace Vendor\KarcewiczBingo;

use Vendor\KarcewiczBingo\Connection;

class AddQuery extends Connection {
    public function __construct($tresc, $email = null) {
        parent::__construct(); // Wywołaj konstruktor klasy Connection
        try {
            $emailValue = $email !== null ? "'" . $email . "'" : "NULL";
            $sqlQuery = "INSERT INTO queryqueue (ID, tresc, email, data, zatwierdzono, dodano) VALUES (NULL, '" . $tresc . "', " . $emailValue . ", CURRENT_TIMESTAMP(), 0, 0)";
            $stmt = $this->pdo->prepare($sqlQuery);
            $stmt->execute();
        } catch (\PDOException $e) {
            die("Błąd podczas dodawania rekordu: " . $e->getMessage());
        }
    }

}
