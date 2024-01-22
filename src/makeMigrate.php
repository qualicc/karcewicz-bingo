<?php

namespace Vendor\KarcewiczBingo;

use Vendor\KarcewiczBingo\Connection;


class makeMigrate extends Connection{
    protected $pdo;

    private $canMigrate = true;

    public function __construct() {
        parent::__construct();
    }
    public function migrateAll(){
        $this -> owiedziny();
        $this -> queue();
        $this -> modifyQueue();
    }
    public function owiedziny(){
        if ($this -> canMigrate) {
            try {
                $stmt = $this->pdo->prepare("CREATE TABLE IF NOT EXISTS `odwiedziny` (`data` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ) ENGINE = InnoDB;");
                $stmt->execute();
            } catch (\PDOException $e) {
                die("Błąd podczas migracji: " . $e->getMessage());
            }
        }
    }
    public function queue(){
        if ($this -> canMigrate) {
            try {
                $stmt = $this->pdo->prepare("CREATE TABLE IF NOT EXISTS `queryqueue` (`ID` BIGINT NOT NULL AUTO_INCREMENT , `tresc` TEXT NOT NULL , `email` TEXT NULL , `data` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `zatwierdzono` BOOLEAN NOT NULL , `dodano` BOOLEAN NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB;");
                $stmt->execute();
            } catch (\PDOException $e) {
                die("Błąd podczas migracji: " . $e->getMessage());
            }
        }
    }
    public function modifyQueue(){
        if ($this -> canMigrate) {
            try {
                $stmt = $this->pdo->prepare("ALTER TABLE `queryqueue` CHANGE `dodano` `odrzucono` TINYINT(1) NOT NULL;");
                $stmt->execute();
            } catch (\PDOException $e) {
                die("Błąd podczas migracji: " . $e->getMessage());
            }
        }
    }
}
