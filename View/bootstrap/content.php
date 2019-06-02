<div class="container-fluid">
    <?php

    require "Model/functions/PHP/pages.php";

    if (empty($_GET)) {
        include "profile.php";
    } else {
        $page = $_GET["page"];
        include "$page.php";
    }

    ?>
</div>
