<?php

class Session
{
    public $username;
    public $first_name;
    public $last_name;
    public $location;
    public $time;

    public function __construct($username, $first_name, $last_name, $location)
    {
        $this->username = $username;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->location = $location;
        $this->time = time();
    }

    public static function GetUser()
    {
        if (!$_SESSION['loggedin']) {
            return -1;
        }

        return unserialize($_SESSION['user']);
    }

    public function GetFullName()
    {
        if (!$_SESSION['loggedin']) {
            return -1;
        }

        return "" . $this->first_name . " " . $this->last_name . "";
    }

    public function UpdateTime($time)
    {
        $this->time = $time;
    }
}