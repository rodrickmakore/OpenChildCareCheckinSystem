<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 7/12/14
 * Time: 11:46 PM
 */

class User
{
    public function __construct($userName, $pw)
    {
        $this->userName = $userName;
        $this->pw = $pw;
    }

    public $userName = "";
    public function UserName()
    {
        return $this->userName;
    }

    public $pw = "";
    function Password()
    {
        return $this->pw;
    }

    static function AuthenticateUser($userName, $pw)
    {
        return true;
    }
} 