<?php
/**
 *   User Disconnection
 */
function signOut()
{
    // Wiping $_SESSION variable data
    session_unset();

    // Ending actual session
    session_destroy();

    // Redirecting user to homepage
    redirectScript("connection_form");
}
?>
