<?php

require "session.php";

// Start the session, this allows any page using the navbar to know if a user is logged in or not
session_start();

// Check if user is logged in
if (isset($_SESSION['loggedin']) && Session::LoggedIn())
{
    $user = Session::GetUser();

    // If the time since you last loaded the navbar is over 10 minutes, log out by redirecting to logout page
    if ($user->time - time() > 600)
        header("Location: logout.php");
    else
        $user->UpdateTime(time());
}
else
    $_SESSION['loggedin'] = false;

?>

<head>
    <title>BackTogether</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Popper -->
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <!-- BackTogether CSS -->
    <link rel="stylesheet" href="css/btcss.css">

    <!-- Favicon.io -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
</head>