<?php

/**
 * Redirecting user with header()
 */
function redirectPhp($page)
{
    header('Location: ' . $page . '.php');
    //exit;
}

/**
 * Redirecting user with window.location.href
 */
function redirectScript($page)
{
    echo '<script language="javascript">window.location.href = "' . 
        $page . '"</script>';
    echo '<META HTTP-EQUIV="refresh" content="0";URL=' . $page . '>';
}

?>
