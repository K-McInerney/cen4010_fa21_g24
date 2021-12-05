<!DOCTYPE html>

<html lang="en">

<?php

require 'db.php';
require 'std_head.php';

if (Session::LoggedIn())
    header("Location: index.php");

?>

    <body>

        <?php
        require 'std_navbar.php';
        ?>

        <main>

            <div class="wrapper fadeIn">
                <div id="formContent">

                    <div>
                        <img src="img/bt.svg" id="icon" alt="User Icon" />
                    </div>

                    <form action="login.php#trylogin" method="post">
                        <input type="text" id="username" name="username" placeholder="username">
                        <input type="password" id="password" name="password" placeholder="password">
                        <input type="hidden" id="latitude" name="latitude" hidden>
                        <input type="hidden" id="longitude" name="longitude" hidden>
                        <input type="submit" name="submit" value="Log In">
                    </form>

                    <?php
                    require 'trylogin.php';
                    ?>
                </div>
            </div>
        </main>
    </body>

    <script src="js/location.js"></script>

</html>