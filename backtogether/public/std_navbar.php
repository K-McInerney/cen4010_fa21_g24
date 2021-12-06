<?php

// Start the session, this allows any page using the navbar to know if a user is logged in or not
session_start();

// Check if user is logged in
if (isset($_SESSION['loggedin']))
{
    // If the time since you last loaded the navbar is over 10 minutes, log out by redirecting to logout page
    if ($_SESSION['time'] - time() > 600)
        header("Location: logout.php");
    else
        $_SESSION['time'] = time();
}

?>

<header>
  <nav class="navbar navbar-expand-lg navbar-light navbar-style">
      <a class="navbar-brand" href="#"><img src="img/bt.png" width="40"> BackTogether</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                  <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
              </li>
              <?php // Determine whether to show the log in or log out button on the navbar
              if (isset($_SESSION['loggedin']) && !isset($logoutpage)) { ?>
              <li class="nav-item">
                  <a class="nav-link" href="logout.php">Log Out</a>
              </li>
              <?php } else { ?>
              <li class="nav-item">
                  <a class="nav-link" href="login.php">Log In</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="register.php">Register</a>
              </li>
              <?php } ?>
          </ul>
          <form action="results.php#search" method="post" class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search" id="search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit">Search</button>
          </form>
          <?php
          // Show user's full name inside navbar
          // TODO (FRONTEND): Fix the bootstrap here to look better
          if (isset($_SESSION['loggedin']) && !isset($logoutpage)) {
              echo "<a class=\"my-2 my-lg-0 mx-2 text-light font-weight-bold\"> Logged in as " . $_SESSION['first_name'] . " " . $_SESSION['last_name'] . "</a>";
          } ?>
      </div>
  </nav>
</header>
