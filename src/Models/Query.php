<?php

namespace Vendor\KarcewiczBingo\Models;

use Vendor\KarcewiczBingo\Frame\Model;
use Vendor\KarcewiczBingo\Frame\Validators;
use Vendor\KarcewiczBingo\Models\Error;

class Query extends Model
{
    // Complete data
    protected $table = "queryqueue";

    public $ID, $tresc, $email, $date, $accepted, $rejected;

    public function __construct($id,$tresc,$email) 
    {
        parent::__construct();
        $this -> id = $this -> freeID();
        $this -> email = "CURRENT_TIMESTAMP()";
        $this -> accepted = 0;
        $this -> rejected = 0;

    }

    public function accept() : void
    {
        $this -> accepted = 1;
    }

    public function cancel() : void
    {
        $this -> cancel = 1;
    }

    public function setEmail($email) : string|bool
    {
        if (!Validators::email($email)) {
            return "Its not an email";
        }
        $this -> email = $email;
        return true;
    }
    public function setTresc($tresc) : void
    {
        $this -> tresc = $tresc;
    }
}