<!DOCTYPE html>

<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Fredi</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <link href="../bootstrap-4.3.1-dist/css/bootstrap-grid.css" rel="stylesheet" type="text/css" media="all" />
        <link href="../bootstrap-4.3.1-dist/css/bootstrap-grid.css.map" rel="stylesheet" type="text/css" media="all" />
        <link href="../bootstrap-4.3.1-dist/css/bootstrap-reboot.css" rel="stylesheet" type="text/css" media="all" />
        <link href="../bootstrap-4.3.1-dist/css/bootstrap-reboot.css.map" rel="stylesheet" type="text/css" media="all" />
        <link href="../bootstrap-4.3.1-dist/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="../bootstrap-4.3.1-dist/css/bootstrap.css.map" rel="stylesheet" type="text/css" media="all" />	
        <link href="../bootstrap-4.3.1-dist/css/index.css" rel="stylesheet" type="text/css" media="all" />
    </head>
    
    <body>
        <div class="card">
            <div class="card-header">
                <div id="header">
                    <?php
                        require "header.php";
                    ?>
                </div>
            </div>
            <div class="card-body">
                <div>
                    <?php
                    if (empty($_GET)) {
                        include "connection_form.php";
                    } else {
                        $page = $_GET["page"];
                        include "$page.php";
                    }
                    ?>
                </div>
            </div>
            
            <div id="footer">
                <?php
                    require "footer.php";
                ?>
            </div>
        </div>
    </body>
</html>
