<?php

session_destroy();

?>

<!DOCTYPE html>

<html lang="en">

<?php
require 'db.php';
require 'std_head.php';
?>

    <body>

    <?php
    require 'std_navbar.php';
    ?>

        <main>
            <h3>You have been logged out.</h3>
        </main>
    </body>
</html>