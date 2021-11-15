
<!DOCTYPE html>

<html lang="en">

<?php
require 'db.php';
require 'std_head.php';
?>

    <body>

    <?php
    // Add logoutpage variable so that the navbar shows the log out button
    $logoutpage = true;
    require 'std_navbar.php';

    // Log the user out by destroying the session
    session_destroy();
    ?>

        <main>
            <h3>You have been logged out.</h3>
        </main>
    </body>
</html>