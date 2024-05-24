<?php

namespace Vendor\KarcewiczBingo\Models;

use Vendor\KarcewiczBingo\Frame\Model;

class NewModel extends Model
{
    // Complete data
    protected $table = "table_name";

    public $id,$name,$email;

    public function __construct($name,$email) {
        parent::__construct();
        $this -> id = $this -> freeID();
        $this -> name = $name;
        $this -> email = $email;
    }
}