<?php
session_start();

if (empty($_SESSION)) {
    header("Location: index.php?page=connection_form");
} else {
    include "Controller/profile.php";
}
?>
