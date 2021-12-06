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
        $last_name = $_POST['register_lastname'];

        Database::QueryNoReturn("INSERT INTO users (`username`, `first_name` , `last_name`, `password_hash`) VALUES (?, ?, ?, ?)", $username, $first_name, $last_name, $password_hash);

        // TODO: Add something on the login page at #registered that acknowledges successful account creation.
        header("Location: login.php#registered");
    }
    else
    {
        ?>
        <!-- TODO: Make this look better. -->
        <h3 class="text-danger">Passwords don't match.</h3>
        <?php
    }
}