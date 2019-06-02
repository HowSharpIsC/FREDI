<?php

if ($_SESSION["user"] === 1) {
    include "View/bootstrap/sidebarTreasurer.html";
} else if ($_SESSION["user"] === 2) {
    include "View/bootstrap/sidebarAdherent.html";
}

?>
