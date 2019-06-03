<?php

checkTreasurer();

?>

<html>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary float-left">Frais traités</h6>
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
                    <th>Trésorier</th>
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
                    <th>Trésorier</th>
                  </tr>
                </tfoot>
                <tbody>
                    <?php
                        require "Model/functions/PHP/expenses.php";
                        getAdherentExpensesDealtWith();
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
