<?php

$posts = Database::Query("SELECT * FROM `posts` INNER JOIN `users` ON `posts`.`user` = `users`.`id` WHERE `location` = ? OR `event_location` = ?", $user->location, $user->location);

if (empty($posts))
{
    ?>
    No posts here! Be the first to make a post in your area.
    <?php
    goto end; // lol
}

foreach ($posts as $post)
{
    ?>
    <div class="card">
        <div class="card-header">
            <h1> <?php echo("" . $post['post_title'] . ""); ?> </h1>
        </div>
        <div class="card-body">
            <p> <?php echo("" . $post['post_content'] . ""); ?> </p>
            <span>Posted by: <?php echo("" . $post['first_name'] . " " . $post['last_name'] . ""); ?></span>
            <?php
            if (!($post['event_link'] == NULL))
            {?>
                <span>@ <a href="<?php echo("" . $post['event_link'] . ""); ?>"><?php echo("" . $post['event_link'] . ""); ?></a></span>
            <?php } ?>
        </div>
    </div>
    <?php
}

end: