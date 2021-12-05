<?php

class Session
{
    public $username;
    public $first_name;
    public $last_name;
    public $type;
    public $location;
    public $time;

    public function __construct($username, $first_name, $last_name, $type, $location)
    {
        $this->username = $username;
        $this->first_name = $first_name;
        $this->type = $type;
        $this->location = $location;
        $this->time = time();

        if ($type == 2)
            $this->last_name = $last_name;
    }

    public static function LoggedIn()
    {
        return ($_SESSION['loggedin']) == true;
    }

    public static function GetUser()
    {
        if (!Session::LoggedIn()) {
            return -1;
        }

        return unserialize($_SESSION['user']);
    }


    public function GetFullName()
    {
        if (!Session::LoggedIn()) {
            return -1;
        }

        return ($this->type == 2) ? "" . $this->first_name . " " . $this->last_name . "" : $this->first_name;
    }

    public function UpdateTime($time)
    {
        if (!Session::LoggedIn()) {
            return -1;
        }

        $this->time = $time;
        return $time;
    }
}