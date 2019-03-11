<?php

    session_start();

    if (empty($_SESSION)) {
        header("Location: index.php?page=connection_form.php");
    }
    else {
        // TODO display profile data
        
    }

?>