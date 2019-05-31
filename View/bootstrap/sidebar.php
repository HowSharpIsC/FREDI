<?php

if ($_SESSION["user"] === 1) {
    include "sidebarTreasurer.html";
} else if ($_SESSION["user"] === 2) {
    include "sidebarAdherent.html";
}

?>
