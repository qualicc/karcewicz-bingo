<?php

namespace Vendor\KarcewiczBingo\Frame;

abstract class Validators
{
    public static function email($email) : bool 
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {
            return true;
        } else {
            return false;
        }
    }
}