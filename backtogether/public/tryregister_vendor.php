<?php

// If a username was sent to the server, continue
if (isset($_POST['register_username'])) {
    if ($_POST['register_password'] === $_POST['register_confirm_password'])
    {
        // Load a salt from the salts.ini file
        $salting_config = parse_ini_file("../salts.ini");
        $salt = $salting_config['sha512_salt'];

        // Concatenate the password onto the salt and hash it with SHA-512
        $password_raw = $_POST['register_password'];
        $password_salted = "" . $salt . "" . $password_raw . "";
        $password_hash = hash("sha512", $password_salted);

        $username = $_POST['register_username'];
        $first_name = $_POST['register_firstname'];

        Database::QueryNoReturn("INSERT INTO users (`username`, `first_name` , `password_hash`, `type`) VALUES (?, ?, ?, 1)", $username, $first_name, $password_hash);

        // TODO (FRONTEND): Add something on the login page at #registeredvendor that acknowledges successful vendor account creation.
        header("Location: login.php#registeredvendor");
    }
    else
    {
        ?>
        <!-- TODO (FRONTEND): Make this look better. -->
        <h3>Passwords don't match.</h3>
        <?php
    }
}