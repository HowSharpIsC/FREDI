<!DOCTYPE html>

<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Fredi</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <link href="View/bootstrap-4.3.1-dist/css/bootstrap-grid.css" rel="stylesheet" type="text/css" media="all" />
        <link href="View/bootstrap-4.3.1-dist/css/bootstrap-grid.css.map" rel="stylesheet" type="text/css" media="all" />
        <link href="View/bootstrap-4.3.1-dist/css/bootstrap-reboot.css" rel="stylesheet" type="text/css" media="all" />
        <link href="View/bootstrap-4.3.1-dist/css/bootstrap-reboot.css.map" rel="stylesheet" type="text/css" media="all" />
        <link href="View/bootstrap-4.3.1-dist/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="View/bootstrap-4.3.1-dist/css/bootstrap.css.map" rel="stylesheet" type="text/css" media="all" />	
        <link href="View/bootstrap-4.3.1-dist/css/index.css" rel="stylesheet" type="text/css" media="all" />
        <script type="text/javascript" src="View/JS/jQuery3.3.1.js"></script>
    </head>
    
    <body>
        <div class="card">
            <div class="card-header">
                <div id="header">
                    <?php
                        require "View/PHP/header.php";
                    ?>
                </div>
            </div>
            <div class="card-body">
                <div>
                    <?php
                    if (empty($_GET)) {
                        include "View/PHP/connection_form.php";
                    } else {
                        $page = $_GET["page"];
                        include "View/PHP/$page.php";
                    }
                    ?>
                </div>
            </div>
            
            <div id="footer">
                <?php
                    require "View/PHP/footer.php";
                ?>
            </div>
        </div>
    </body>
</html>
