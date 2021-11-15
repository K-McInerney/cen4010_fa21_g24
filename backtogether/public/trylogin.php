<?php
// If a username was sent to the server, continue
if (isset($_POST['username']))
{
    // Load a salt from the salts.ini file
    $salting_config = parse_ini_file("../salts.ini");
    $salt = $salting_config['sha512_salt'];

    // Concatenate the password onto the salt and hash it with SHA-512
    $password_raw = $_POST['password'];
    $password_salted = "" . $salt . "" . $password_raw . "";
    $password_hash = hash("sha512", $password_salted);

    $username = $_POST['username'];

    // Query the database for an account
    $results = Database::Query("SELECT `first_name`, `last_name`, `location` FROM `users` WHERE `username` = ? AND `password_hash` = ?", $username, $password_hash);

    // No account found
    if (empty($results))
    {
        ?>
        <h3> Login  Failed!</h3>
        <?php
    }

    // Set our session variables
    foreach ($results as $row)
    {
        $_SESSION['loggedin'] = true;
        $_SESSION['time'] = time();
        $_SESSION['username'] = $username; echo $_SESSION['username']; echo "\n";
        $_SESSION['first_name'] = $row['first_name'];
        $_SESSION['last_name'] = $row['last_name'];
        $_SESSION['location'] = $row['location'];

        // Redirect back to main page
        header("Location: index.php#loginsuccess");
    }
}