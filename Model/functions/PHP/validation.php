<?php

function validateSignIn()
{
    $valid = false;

    if (empty($_POST['email_adress']) || empty($_POST['password'])) {
        $valid = false;
    } else {
        $email = $_POST['email_adress'];

        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $valid = true;
        }
    }

    return $valid;
}

?>
