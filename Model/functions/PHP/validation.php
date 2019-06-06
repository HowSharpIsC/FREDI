<?php

function validateSignIn()
{
    $valid = false;

    if (!(empty($_POST['email_address']) || empty($_POST['password']))) {
        $email = $_POST['email_address'];

        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $valid = true;
        }
    }

    return $valid;
}

function validateExpenses()
{
    $valid = false;

    if (!empty($_POST["journey"]) && $_POST["reason"] != 0) {
        if (empty($_POST["power"]) == empty($_POST["km"])) {
            $valid = true;
        }
    }

    return $valid;
}

function checkSession()
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
}

function checkAdherent()
{
    checkSession();
    
    if (empty($_SESSION) || !$_SESSION["user"] === 2) {
        include "../../Model/functions/PHP/pages.php";
        redirectScript("login.php");
    }
}

function checkTreasurer()
{
    checkSession();
    
    if (empty($_SESSION) || !$_SESSION["user"] === 1) {
        include "../../Model/functions/PHP/pages.php";
        redirectScript("login.php");
    }
}

?>
