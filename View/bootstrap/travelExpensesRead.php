<!-- Page Heading -->
<div class="d-flex">
  <div class="mr-auto p-2"><h1 class="h3 mb-2 text-gray-800">Frais déclarés</h1></div>
  <div class="p-2">
    <a class="btn btn-primary text-light" 
      href='<?php echo "View/Ressources/ExpensesBills/" . $_SESSION["LastName"] . $_SESSION["FirstName"] . Date("Y") . ".xls" ?>'
      download><i class="fas fa-download fa-sm text-white"></i> Note de frais</a>
  </div>
</div>
<br>
<div id="travelExpensesTable">
  <?php
  require "Controller/travelExpensesRead.php"; 
  ?>
</div>
