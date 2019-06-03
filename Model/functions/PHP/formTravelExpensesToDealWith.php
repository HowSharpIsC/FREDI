<?php

if (isset($_POST)) {
    for ($i=0; $i < count($_POST); $i++) { 
        if (isset($_POST[$i])) {
            foreach ($_POST as $keyPost => $valuePost) {
                foreach ($expenses as $keyExp => $valueExp) {
                    if ($keyExp == $keyPost) {
        
                        include "Model/dal/dbExpenses.php";
        
                        $id = $valueExp[0];
                        $date = $valueExp[1];
                        $journey = $valueExp[2];
        
                        switch ($valuePost) {
                        case "Valider":
                            try {
                                acceptExpenses($id, $date, $journey);
                                redirectScript("index.php?page=travelExpensesToDealWith");
                            } catch (Exception $e) {
                                echo $e->getMessage();
                            }
                            break 2;

                        case "Refuser":
                            try {
                                refuseExpenses($id, $date, $journey);
                                redirectScript("index.php?page=travelExpensesToDealWith");
                            } catch (Exception $e) {
                                echo $e->getMessage();
                            }
                                                        
                            break 2;
        
                        default:
                            break;
                        }
                        
                    }
                }
                break 2;
            }
        }
    }
}

?>
