<?php
session_start();

if (!$_SESSION["user"] === 0) {
    redirectPHP("page=connection_form");
} else {
    include "Controller/profile.php";
}
?>
