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
    $results = Database::Query("SELECT `first_name`, `last_name` FROM `users` WHERE `username` = ? AND `password_hash` = ?", $username, $password_hash);

    // No account found
    if (empty($results))
    {
        ?>
        <h3> Login  Failed!</h3>
        <?php
    }
    else
    {
        // Geocoding
        $apikey_config = parse_ini_file("../api_keys.ini");
        $geocode = file_get_contents('https://api.geoapify.com/v1/geocode/reverse?lat=' . $_POST['latitude'] . '&lon=' . $_POST['longitude'] . '&apiKey=' . $apikey_config['geocoding_key'] . "");
        $output = json_decode($geocode);
        $zipcode = $geocode['features']['properties']['postcode'];

        Database::QueryNoReturn("UPDATE `users` SET `location` = ? WHERE username = ?", $zipcode, $username);

        // Set our session variables
        foreach ($results as $row) {
            $_SESSION['loggedin'] = true;
            $_SESSION['time'] = time();
            $_SESSION['username'] = $username;
            echo $_SESSION['username'];
            echo "\n";
            $_SESSION['first_name'] = $row['first_name'];
            $_SESSION['last_name'] = $row['last_name'];
            $_SESSION['location'] = $row['location'];

            // Redirect back to main page
            header("Location: index.php#loginsuccess");
        }
    }
}