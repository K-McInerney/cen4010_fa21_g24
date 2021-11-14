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

            <form action="register.php#tryregister" method="post">
                <input type="text" id="register_username" name="register_username" placeholder="username">
                <input type="text" id="register_firstname" name="register_firstname" placeholder="first name">
                <input type="text" id="register_lastname" name="register_lastname" placeholder="last name">

                <!-- TODO: Add JavaScript to tell if the passwords are identical before submitting -->
                <input type="password" id="register_password" name="register_password" placeholder="password">
                <input type="password" id="register_confirm_password" name="register_confirm_password" placeholder="confirm password">

                <input type="submit" name="submit" value="Register">
            </form>

            <?php
            require 'tryregister.php';
            ?>
        </div>
    </div>
</main>
</body>
</html>