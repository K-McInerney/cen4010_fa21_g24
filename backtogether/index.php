<!DOCTYPE html>

<?php
require 'db.php';
?>

<html>
    <head>
        <title>BackTogether</title>
        <link rel="stylesheet" href="css/btcss.css">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <header class="header">
        <nav class="navbar navbar-style test">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myicon">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <h2 class="backtogether"><img src="img/bt.png" width="40"> Back Together</h2>
                </div>
                <div class="collapse navbar-collapse" id="myicon">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="">Notifations</a></li>
                    <li><a href="">Messages</a></li>
                    <li><a href="">Profile</a></li>
                    <li><a href="../index.html">About Us</a></li>
                </ul>
            </div>
            </div>
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-s-6">
                    <form action="index.php#search" method="post">
                        <input type="text" name="search" id="search">
                        <input type="submit" name="submit" value="Search">
                    </form>
                </div>
                <div class="col-s-6">
                <?php 
                if (isset($_POST['search']))
                {
                    $search = "%" . $_POST['search'] . "%";
                    $results = Database::Query("SELECT `type`,`first_name`,`last_name`,`location`,`profile_desc` FROM `users` WHERE `first_name` LIKE ? OR `last_name` LIKE ?;", $search, $search);
                    
                    if (!empty($results))
                    {
                        echo "<table class=\"table table-striped table-hover\">";
                        echo "<thead><th scope=\"col\"> Name </th><th scope=\"col\"> Description </th></tr></thead><tbody>";
                        
                        foreach ($results as $row)
                        {
                            echo "<tr><td><div class=\"profile_name\">" . $row['first_name'] . " " . $row['last_name'] . "</div></td><td><div class=\"profile_desc\">" . $row['profile_desc'] . "</div></td></tr>";
                        }
                    }
                    else
                    {
                        echo "<div class=\"alert alert-primary\" role=\"alert\">
                        No results found!
                        </div>";
                    }

                    echo "</tbody>";
                }
                ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>  
        <script type="text/javascript" src="p3javascript.js"></script>
        </header>
    </body>
</html>