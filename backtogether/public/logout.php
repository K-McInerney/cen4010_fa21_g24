
<!DOCTYPE html>

<html lang="en">

<?php
require 'db.php';
require 'std_head.php';
?>

    <body>

    <?php
    $logoutpage = true;
    require 'std_navbar.php';
    session_destroy();
    ?>

        <main>
            <h3>You have been logged out.</h3>
        </main>
    </body>
</html>