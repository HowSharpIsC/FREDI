<html>
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Profil</h1>
  </div>
  <br>
  
  <div class="row">
    <?php

    // Check if the user is a treasurer or an adherent then load their profile page
    if ($_SESSION["user"] === 1) {
        include "Controller/treasurer.php";
    } else if ($_SESSION["user"] === 2) {
        include "Controller/profile.php";
    }
    
    ?>
  </div>
</html>
