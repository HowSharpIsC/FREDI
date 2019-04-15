<?php

/**
 * Redirecting user with header()
 */
function redirectPhp($page)
{
    header('Location: index.php?page=' . $page);
    exit;
}

/**
 * Redirecting user with window.location.href
 */
function redirectScript($page)
{
    echo '<script language="javascript">window.location.href = index.php?page="' . 
        $page . '"</script>';
    echo '<META HTTP-EQUIV="refresh" content="0;URL=index.php?page=' . $page . '">';
}

?>
