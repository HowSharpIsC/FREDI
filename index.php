<?php

require "Model/functions/PHP/validation.php";

checkSession();

if (empty($_SESSION)) {
    header("Location: login.php");    
}

require "View\bootstrap\homePage.php";

?>
