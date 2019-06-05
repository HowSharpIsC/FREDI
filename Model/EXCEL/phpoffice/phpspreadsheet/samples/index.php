<?php
    
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

function generateExcel()
{

    include 'Model/EXCEL/autoload.php';
    include 'Model/dal/dbExpenses.php';
    include 'Model/dal/dbSelection.php';

    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
    $spreadsheet = $reader->load("Model/EXCEL/phpoffice/phpspreadsheet/samples/noteDeFrais.xls");

    $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xls($spreadsheet);

    $sheet = $spreadsheet->getActiveSheet();

    // Year of the declaration
    $sheet->setCellValue('G2', 'Année civile ' .  Date("Y"));

    // Last name + first name
    $sheet->setCellValue('A5', $_SESSION["LastName"] . " " . $_SESSION["FirstName"]);

    // Full address
    $sheet->setCellValue('A7', $_SESSION["Address"]);

    // Club informations
    $club = clubSelection($_SESSION["id"]);
    $cellClub = $club["club_nom"] . " ". $club["club_adresse"] . " " . 
                $club["club_codePostal"] . " " . $club["club_ville"];

    $sheet->setCellValue('A9', $cellClub);

    /**
     * Travel expenses
     * 
     * A Date
     * B Reason
     * C Journey
     * D Distance
     * E Rate in kilometres
     * F Travel cost
     * G Toll
     * H Meal
     * I Lodging
     * J Total
     */
    $expenses = getValidatedExpenses();
    $newRow = 14;
    $cells = array();

    // Adding and filling a row for each travel expense declared
    for ($i=0; $i < count($expenses); $i++) {
        $sheet->insertNewRowBefore($newRow, 1);
        foreach ($expenses[$i] as $key => $value) {
            switch ($key) {
            case "frs_date":
                $cells[0] = 'A' . $newRow;
                $spreadsheet->getActiveSheet()->getStyle($cells[0])->getNumberFormat()
                    ->setFormatCode(
                        \PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_YYYYMMDD2
                    ); 
                $sheet->setCellValueExplicit($cells[0], $value, 'str');
                break;
            case 1:
                $cells[1] = 'B' . $newRow;
                $sheet->setCellValueExplicit($cells[1], $value, 'str'); 
                break;
            case 2:
                $cells[2] = 'C' . $newRow;
                $sheet->setCellValue($cells[2], $value);            
                break;
            case 3:
                $cells[3] = 'D' . $newRow;
                $sheet->setCellValue($cells[3], $value);            
                break;
            case 4:
                $cells[4] = 'E' . $newRow;
                $sheet->setCellValue($cells[4], $value);            
                break;
            case 5:
                $cells[5] = 'F' . $newRow;
                $sheet->setCellValue($cells[5], $value);            
                break;
            case 6:
                $cells[6] = 'G' . $newRow;
                $sheet->setCellValue($cells[6], $value);            
                break;
            case 7:
                $cells[7] = 'H' . $newRow;
                $sheet->setCellValue($cells[7], $value);            
                break;
            case 8:
                $cells[8] = 'I' . $newRow;
                $sheet->setCellValue($cells[8], $value);            
                break;
            default:
                break;
            }
        }
        $cells[9] = 'J' . $newRow;
        $cellSum = "=SUM(" . $cells[5] . ":" . $cells[8] . ")";
        $sheet->setCellValue($cells[9], $cellSum);

        $newRow++;
    }

    $cellTotal = 'J' . $newRow;
    $cellTotalValue = "=SUM(J14:J". ($newRow-1) .")";
    $sheet->setCellValue($cellTotal, $cellTotalValue);

    $path = "View/Ressources/ExpensesBills/";
    $fileName = $_SESSION["LastName"] . $_SESSION["FirstName"] . Date("Y");

    $writer->save($path . $fileName . ".xls");

    return;
}

?>
