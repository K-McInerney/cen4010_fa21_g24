<?php
if (isset($_POST['trylogin']))
{
    $salting_config = parse_ini_file("../salts.ini");
    $salt = $salting_config['sha512_salt'];

    $password_raw = $_POST['password'];
    $password_salted = "" . $salt . "" . $password_raw . "";
    $password_hash = hash("sha512", $password_salted);

    $username = $_POST['username'];

    $results = Database::Query("SELECT `first_name`, `last_name`, `location` FROM `users` WHERE `username` = ? AND `password_hash` = ?", $username, $password_hash);

    foreach ($results as $row)
    {
        $_SESSION['username'] = $username;
        $_SESSION['first_name'] = $row['first_name'];
        $_SESSION['last_name'] = $row['last_name'];
        $_SESSION['location'] = $row['location'];
    }
}