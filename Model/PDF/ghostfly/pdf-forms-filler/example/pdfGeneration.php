<?php

session_start();

require '../../../../PDF/autoload.php';
$string = file_get_contents("format.txt");

use FormFiller\PDF\Converter\Converter;
use FormFiller\PDF\Field;
use FormFiller\PDF\PDFGenerator;

$converter = new Converter($string);
$converter->loadPagesWithFieldsCount();
$coords = $converter->formatFieldsAsJSON();
$fields = json_decode($coords, true);
$fieldEntities = [];

foreach ($fields as $field) {
    try {
        $fieldEntities[] = Field::fieldFromArray($field);
    } catch (Exception $e) {
        echo "page undefined for field" . $field;
    }
}
$data = [
  'z1'    => [
      "size"  => 9,
      'family'  => 'Helvetica',
      "style" => 'B',
      'value' => 1
  ],
  'z2'    => [
      "size"  => 9,
      'family'  => 'Helvetica',
      "style" => 'B',
      'value' => 'Maison des ligues de Lorraine'
  ],
  'Z3'    => [
      "size"  => 9,
      'family'  => 'Helvetica',
      "style" => 'B',
      'value' => '19'
  ],
  'z4'    => [
      "size"  => 9,
      'family'  => 'Helvetica',
      "style" => 'B',
      'value' => 'Rue Fabert'
  ],
  'z5'    => [
      "size"  => 9,
      'family'  => 'Helvetica',
      "style" => 'B',
      'value' => 57000
  ],
  'z5b'    => [
      "size"  => 9,
      'family'  => 'Helvetica',
      "style" => 'B',
      'value' => 'Metz'
  ],
  'z9'    => [
      "size"  => 9,
      'family'  => 'Helvetica',
      "style" => 'B',
      'value' => 'X'
  ],
  'd1c'    => [
      "size"  => 9,
      'family'  => 'Helvetica',
      "style" => 'B',
      'value' => '01'
  ],
  'd2c'    => [
      "size"  => 9,
      'family'  => 'Helvetica',
      "style" => 'B',
      'value' => '01'
  ],
  'd3c'    => [
      "size"  => 9,
      'family'  => 'Helvetica',
      "style" => 'B',
      'value' => 2013
  ],
  'DGFIP'    => [
      "size"  => 9,
      'family'  => 'Helvetica',
      "style" => 'B',
      'value' => 'DGFIP'
  ],
  'z35'   => [
      "size"  => 9,
      'family'  => 'Helvetica',
      "style" => 'B',
      'value' => ''
  ],
  'z29'   => [
      "size"  => 9,
      'family'  => 'Helvetica',
      "style" => 'B',
      'value' => $_SESSION["LastName"]
  ],
  'z30'   => [
      "size"  => 9,
      'family'  => 'Helvetica',
      "style" => 'B',
      'value' => $_SESSION["FirstName"]
  ],
  'z31'   => [
      "size"  => 9,
      'family'  => 'Helvetica',
      "style" => 'B',
      'value' => $_SESSION["Address"]
  ],
  'z32'   => [
      "size"  => 9,
      'family'  => 'Helvetica',
      "style" => 'B',
      'value' => $_SESSION["ZipCode"]
  ],
  'z33'   => [
      "size"  => 9,
      'family'  => 'Helvetica',
      "style" => 'B',
      'value' => $_SESSION["City"]
  ],
  'z34'   => [
      "size"  => 9,
      'family'  => 'Helvetica',
      "style" => 'B',
      'value' => "***" . 100 . "***"
  ],
  'z36'   => [
      "size"  => 9,
      'family'  => 'Helvetica',
      "style" => 'B',
      'value' => 01
  ],
  'z37'   => [
      "size"  => 9,
      'family'  => 'Helvetica',
      "style" => 'B',
      'value' => 02
  ],
  'z38'   => [
      "size"  => 9,
      'family'  => 'Helvetica',
      "style" => 'B',
      'value' => 2019
  ],
  'z39'   => [
      "size"  => 9,
      'family'  => 'Helvetica',
      "style" => 'B',
      'value' => "X"
  ],
  'z45'   => [
      "size"  => 9,
      'family'  => 'Helvetica',
      "style" => 'B',
      'value' => "X"
  ],
  'z48'   => [
      "size"  => 9,
      'family'  => 'Helvetica',
      "style" => 'B',
      'value' => "X"
  ],
  'z52'   => [
      "size"  => 9,
      'family'  => 'Helvetica',
      "style" => 'B',
      'value' => date("d", time())
  ],
  'z53'   => [
      "size"  => 9,
      'family'  => 'Helvetica',
      "style" => 'B',
      'value' => date("m", time())
  ],
  'z54'   => [
      "size"  => 9,
      'family'  => 'Helvetica',
      "style" => 'B',
      'value' => date("Y", time())
  ],
];

$original = getcwd() . "/cerfa.pdf";
$dest = getcwd() . "/FormFilled.pdf";

$pdfGenerator = new PDFGenerator($fieldEntities, $data, 'P', 'pt', 'A4');

try {
    $pdfGenerator->start($original, $dest);
} catch (Exception $e) {
    echo "error" . $e;
    die();
}

echo "done";
