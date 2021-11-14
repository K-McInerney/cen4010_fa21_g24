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

            <div class="wrapper fadeIn">
                <div id="formContent">

                    <div>
                        <img src="img/bt.svg" id="icon" alt="User Icon" />
                    </div>

                    <form action="login.php#trylogin" method="post">
                        <input type="text" id="username" name="username" placeholder="username">
                        <input type="password" id="password" name="password" placeholder="password">
                        <input type="submit" name="submit" value="Log In">
                    </form>

                    <?php
                    require 'trylogin.php';
                    ?>

                    <form action="login.php#tryregister" method="post">
                        <input type="text" id="register_username" name="register" placeholder="username">
                        <input type="text" id="register_firstname" name="register" placeholder="first name">
                        <input type="text" id="register_lastname" name="register" placeholder="last name">

                        <input type="password" id="register_password" name="register" placeholder="password">
                        <input type="password" id="register_confirmpassword" name="register" placeholder="confirm password">

                        <input type="submit" value="Register">
                    </form>
                </div>
            </div>
        </main>
    </body>
</html>