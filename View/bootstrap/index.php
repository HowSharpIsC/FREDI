<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>FREDI - Profile</title>

  <!-- Custom fonts for this template-->
  <link href="View/bootstrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="View/bootstrap/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for tables -->
  <link href="View/bootstrap/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <!-- Field validation Javascript -->
  <script src="Model/functions/JS/validation.js"></script>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php
    
    require "View/bootstrap/sidebar.php";
    
    ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php

        require "View/bootstrap/topbar.php";

        ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <?php

        require "View/bootstrap/content.php";

        ?>
        <!-- End of Page Content -->
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-transparent">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; FREDI 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <?php
  
  require "View/bootstrap/logout.php";
  
  ?>

  <!-- Bootstrap core JavaScript-->
  <script src="View/bootstrap/vendor/jquery/jquery.min.js"></script>
  <script src="View/bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="View/bootstrap/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="View/bootstrap/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="View/bootstrap/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="View/bootstrap/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="View/bootstrap/js/demo/datatables-demo.js"></script>

</body>

</html>
