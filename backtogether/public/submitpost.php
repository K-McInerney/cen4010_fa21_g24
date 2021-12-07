<?php
if (isset($_POST['post_contents']))
{
    if (!isset($_POST['event_location']) && !isset($_POST['event_link']))
        Database::QueryNoReturn("INSERT INTO `posts` (`user`, `type`, `post_title`, `post_content`) VALUES (?, 0, ?, ?)",
                                        $user->userid, $_POST['post_title'], $_POST['post_contents']);
    else
        Database::QueryNoReturn("INSERT INTO `posts` (`user`, `type`, `post_title`, `post_content`, `event_location`, `event_link`) 
                                        VALUES (?, 0, ?, ?)", $user->userid, $_POST['post_title'], $_POST['post_contents'], $_POST['event_location'], $_POST['event_link']);

    //header("Location: index.php#submitted");
}