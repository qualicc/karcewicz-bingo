<?php

namespace Vendor\KarcewiczBingo\Models;

use Vendor\KarcewiczBingo\Frame\Model;

class Error extends Model
{
    // Complete data
    protected $table = "errors";

    public $id,$error;

    public function __construct($error) {
        parent::__construct();
        $this -> id = $this -> freeID();
        $this -> error = $error;
        $this -> save();
    }
}