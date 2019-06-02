<?php

require "Model/functions/PHP/validation.php";

if (validateSignIn()) {
    $email = $_POST["email_address"];
    $password = $_POST["password"];
    $_POST = null;
    
    try {
        include "Model/dal/dbInit.php";
        include "pages.php";

        signIn($email, $password);

        if ($_SESSION["user"] === 1 || $_SESSION["user"] === 2) {
            redirectScript("index.php");
        } else {
            redirectScript("login.php");
        }

    } catch (Exception $e) {
        $error = $e->getMessage();
        echo "<div class='alert alert-danger' role='alert'>$error</div>";
    }
}
?>
