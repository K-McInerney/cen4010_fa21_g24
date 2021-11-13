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
    <div class="container">
        <div class="row">
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
                        echo "<div class=\"alert alert-primary\" role=\"alert\"> No results found! </div>";
                    }

                    echo "</tbody>";
                    echo "</table>";
                }
                ?>
            </div>
        </div>
    </div>
</main>
</body>
</html>