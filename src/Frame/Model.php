<?php

namespace Vendor\KarcewiczBingo\Frame;

use Vendor\KarcewiczBingo\Frame\Connection;
use Vendor\KarcewiczBingo\Models\Error;
abstract class Model extends Connection
{
    private $tableName, $attributes = [];


    // Publics

    public function __construct(String $tableName) 
    {
        $this->initializeAttributes();

        $this -> tableName = $tableName;
        $this -> structure = $structure;

    }

    public function getId() {
        if (property_exists($this, 'id')) {
            return $this->id;
        } else {
            $err = new Error('Property id does not exist in class ' . get_class($this));
        }
    }

    public function save() : void 
    {

        $fields = implode(', ', array_keys($this->attributes));
        $placeholders = implode(', ', array_fill(0, count($this->attributes), '?'));
        $values = array_values($this->attributes);

        $sql = "INSERT INTO " . static::TABLE_NAME . " {$fields} VALUES {$placeholders}";
        
        $stmt = $this -> pdo -> prepare($sqlQuery);
        $stmt -> execute();
    }

    public function freeID() : int
    {
        $count = $this -> pdo -> prepare("SELECT count(*) as count FROM {$this -> tableName};");
        $count -> execute();
        $fetchedData = $count -> fetchAll(PDO::FETCH_ASSOC);
        $lenght = $fetchedData[0]['count'];
        return $lenght++;
    }
    
    public static function getUsingID($id) 
    {
        $calledClass = get_called_class();
        $tableName = $calledClass::TABLE_NAME;

        $sql = "SELECT * FROM {$tableName} WHERE id = {$id}";
        $data = $this -> pdo -> prepare($sql);
        $data -> execute();
        $result = $data -> fetchAll(PDO::FETCH_ASSOC);
       
        if ($result) {
            $instance = new $calledClass();
            foreach ($result as $field => $value) {
                $property = array_search($field, $calledClass::$fieldMap) ?: $field;
                if (property_exists($instance, $property)) {
                    $instance->{$property} = $value;
                }
            }
            return $instance;
        } else {
            return null;
        }
    }

    public static function where($field, $operator, $value) {
        $calledClass = get_called_class();
        $tableName = $calledClass::TABLE_NAME;

        $field = static::$fieldMap[$field] ?? $field;
        $sql = "SELECT * FROM $tableName WHERE $field $operator ?";
        $data = $this -> pdo -> prepare($sql);
        $data -> execute();
        $results = $data -> fetchAll(PDO::FETCH_ASSOC);
       

        $instances = [];
        foreach ($results as $row) {
            $instance = new $calledClass();
            foreach ($row as $field => $value) {
                $property = array_search($field, $calledClass::$fieldMap) ?: $field;
                if (property_exists($instance, $property)) {
                    $instance->{$property} = $value;
                }
            }
            $instances[] = $instance;
        }
        return $instances;
    }

    // Privates
    
    private function initializeAttributes() {
        $reflect = new ReflectionClass($this);
        $properties = $reflect -> getProperties(ReflectionProperty::IS_PUBLIC);

        foreach ($properties as $property) {
            $name = $property -> getName();
            $this -> attributes[$name] = $this->{$name};
        }
    }
    
}
