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

                <form action="login.php#trylogin">
                    <input type="text" id="login" name="login" placeholder="username">
                    <input type="text" id="password" name="login" placeholder="password">
                    <input type="submit" value="Log In">
                </form>

                <form action="login.php#tryregister">
                    <input type="text" id="register_username" name="register" placeholder="username">
                    <input type="text" id="register_firstname" name="register" placeholder="first name">
                    <input type="text" id="register_lastname" name="register" placeholder="last name">

                    <input type="text" id="register_password" name="register" placeholder="password">
                    <input type="text" id="register_confirmpassword" name="register" placeholder="confirm password">

                    <input type="submit" value="Register">
                </form>

            </div>
        </div>