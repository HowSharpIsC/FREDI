<?php

checkAdherent();

try {
    include "Model/EXCEL/phpoffice/phpspreadsheet/samples/index.php";
    generateExcel();
} catch (\Throwable $th) {
  //throw $th;
}

?>

<html>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary float-left">Vos frais</h6>
            <span class="float-right">Frais validé</span><div class="square-v float-right mr-2"></div>
            <span class="float-right mr-5">Frais refusé</span><div class="square-r float-right mr-2"></div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Date</th>
                    <th>Trajet</th>
                    <th>Distance</th>
                    <th>Hébergement</th>
                    <th>Repas</th>
                    <th>Peage</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Date</th>
                    <th>Trajet</th>
                    <th>Distance</th>
                    <th>Hébergement</th>
                    <th>Repas</th>
                    <th>Peage</th>
                  </tr>
                </tfoot>
                <tbody>
                    <?php
                        require "Model/functions/PHP/expenses.php";
                        getAdherentExpenses($_SESSION["id"]);
                    ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <!-- Scroll to Top Button-->
      <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
      </a>
</html>

<?php

if (isset($_POST["ExepnsesBillUpload"]) && !empty($_POST["ExepnsesBillUpload"])) {

    $tmpName = $_FILES["uploadExpensesBill"]["tmp_name"];
    $path = "View/Ressources/ExpensesBills/" . $_SESSION["LastName"] . $_SESSION["FirstName"] . Date("Y") . ".pdf";
    move_uploaded_file($tmpName, $path);
}

?>
