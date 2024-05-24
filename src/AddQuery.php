<?php

namespace Vendor\KarcewiczBingo;

use Vendor\KarcewiczBingo\Connection;
use Vendor\KarcewiczBingo\Mailer;
use PDO;

class AddQuery extends Connection {
    public function __construct() {

        parent::__construct();
     
    }
    public function addProposition($tresc, $email = null) 
    {
        try {
            $emailValue = $email !== null ? "'" . $email . "'" : "NULL";
            $sqlQuery = "INSERT INTO queryqueue (ID, tresc, email, data, zatwierdzono, odrzucono) VALUES (NULL, '" . $tresc . "', " . $emailValue . ", CURRENT_TIMESTAMP(), 0, 0)";
            $stmt = $this -> pdo -> prepare($sqlQuery);
            $stmt -> execute();
        } catch (\PDOException $e) {
            die("Błąd podczas dodawania rekordu: " . $e -> getMessage());
        }
    }
    // wprowadź dane i save
    public function accept($id)
    {
        try {
            $sqlQuery = "UPDATE queryqueue SET zatwierdzono = 1 WHERE ID = :id;";
            $stmt = $this -> pdo -> prepare($sqlQuery);
            $stmt -> bindValue('id', $id);
            $stmt -> execute();
            //$this -> sendEmail($id, "Twoja propozycja została zaakceptopwana", "Gratulacje twoja propozycja została zaakceptopwana");
            $this -> addToJson($this -> getTresc($id));
        } catch (\PDOException $e) {
            die("Błąd podczas dodawania rekordu: " . $e -> getMessage());
        }
    }
    // 1:1
    public function cancel($id)
    {
        try {
            $sqlQuery = "UPDATE queryqueue SET odrzucono = 1 WHERE ID = :id;";
            $stmt = $this -> pdo -> prepare($sqlQuery);
            $stmt -> bindValue('id', $id);
            $stmt -> execute();
            $this -> sendEmail($id, "Twoja propozycja została odrzucona", "Niestety twoja propozycja została odrzucona");
        } catch (\PDOException $e) {
            die("Błąd podczas dodawania rekordu: " . $e -> getMessage());
        }
    }
    // 1:1

    private function sendEmail($id,$tytuł,$tresc)
    {
        $email = $this -> getEmail($id);
        if (!empty($email)) {
            $mail = New Mailer($email, $tytuł, $tresc);
        }
    }
    //daj do kontrolera
    private function getEmail($id)
    {
        try {
            $sqlQuery = "SELECT email FROM queryqueue WHERE id = :id;";
            $stmt = $this -> pdo -> prepare($sqlQuery);
            $stmt -> bindValue('id', $id);
            $stmt -> execute();
            $dane = $stmt->fetchAll(PDO::FETCH_ASSOC);
            print_r($dane[0]['email']);
            return $dane[0]['email'];
        } catch (\PDOException $e) {
            die("Błąd podczas dodawania rekordu: " . $e -> getMessage());
        }
    }
    // pobierz z modelu
    private function getTresc($id)
    {
        try {
            $sqlQuery = "SELECT tresc FROM queryqueue WHERE id = :id;";
            $stmt = $this -> pdo -> prepare($sqlQuery);
            $stmt -> bindValue('id', $id);
            $stmt -> execute();
            $dane = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $dane[0]['tresc'];
        } catch (\PDOException $e) {
            die("Błąd podczas dodawania rekordu: " . $e -> getMessage());
        }
    }
      // pobierz z modelu
    private function addToJson($tresc)
    {
        $jsonFile = file_get_contents('query.json');

        $data = json_decode($jsonFile, true);

        $newRecord = array(
            'id' => count($data) + 1,
            'query' => $tresc
        );

        $data[] = $newRecord;

        $jsonUpdated = json_encode($data, JSON_PRETTY_PRINT);


        file_put_contents('query.json', $jsonUpdated);
    }
    //daj do kontrolera
}
