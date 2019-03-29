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
<<<<<<< HEAD
		<div id="header">
			<?php
				require("header.php");
			?>
		</div>

		<div>
		<?php
				if (empty($_GET) || empty($_SESSION))
				{
					require("connection_form.php");
				}
				else
				{
					$page = $_GET["page"];
					require("$page.php");
				}
			?>
		</div>
=======
		<div class="card">
			<div class="card-header">
				<div id="header">
					<?php
						require("header.php");
					?>
				</div>
			</div>
			<div class="card-body">
				<div>
					<?php
						if (empty($_GET))
						{
							require("connection_form.php");
						}
						else
						{
							$page = $_GET["page"];
							require("$page.php");
						}
					?>
				</div>
			</div>
>>>>>>> bd66eda649fe9d8fd4f9c66b5699f75420e47256

			<div id="footer">
				<?php
					require("footer.php")
				?>
			</div>
		</div>
	</body>
</html>