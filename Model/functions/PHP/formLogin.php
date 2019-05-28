<?php
/**
 * Test if connection button has been activated
 */
require "validation.php";

if (validateSignIn()) {
    $email = $_POST["email_address"];
    $password = $_POST["password"];
    $_POST = null;
    
    try {
        include "../../Model/dal/dbInit.php";
        include "pages.php";

        signIn($email, $password);

        if ($_SESSION["user"] === 1) {

        } else {
            redirectScript("index");
        }

    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
?>
