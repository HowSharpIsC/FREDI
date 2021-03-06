<!-- Page Heading -->
<div class="d-flex">
  <div class="mr-auto p-2"><h1 class="h3 mb-2 text-gray-800">Frais déclarés</h1></div>
  <div class="p-2">
    <a class="btn btn-primary mr-3" 
      href='<?php echo "View/Ressources/ExpensesBills/" . $_SESSION["LastName"] . $_SESSION["FirstName"] . Date("Y") . ".xls" ?>'
      download><i class="fas fa-download fa-sm text-white"></i> Note de frais</a>
  </div>
  <form enctype="multipart/form-data" class="p-2" action="" method="POST">
    <input type="hidden" name="MAX_FILE_SIZE" value="1000000">
    <input type="file" name="uploadExpensesBill" accept=".pdf">
    <input type="submit" name="ExepnsesBillUpload" class="btn btn-primary float-right" value="Envoyer">
  </form>
</div>
<small class="float-right mr-5">Envoyez votre note de frais signée</small>
<br>
<div id="travelExpensesTable">
    <?php
    require "Controller/travelExpensesRead.php"; 
    ?>
</div>
