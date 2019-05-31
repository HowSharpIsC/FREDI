<?php

function updateAdherent()
{
    $_SESSION["LastName"] = $_POST["lastName"];
    $_SESSION["FirstName"] = $_POST["firstName"];
    $_SESSION["Address"] = $_POST["address"];
    $_SESSION["City"] = $_POST["city"];
    $_SESSION["ZipCode"] = $_POST["zipCode"];
    $_SESSION["Tel"] = $_POST["telephone"];
    $_SESSION["Email"] = $_POST["email"];
}

?>
