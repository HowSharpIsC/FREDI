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

    if (!(empty($_POST["date"]) || empty($_POST["journey"]) 
        || $_POST["reason"] == 0)
    ) {
        if (empty($_POST["power"]) == empty($_POST["km"])) {
                $valid = true;
        }
    }

    return $valid;
}

?>
