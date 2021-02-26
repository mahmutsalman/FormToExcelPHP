<?php
session_start();
require_once('config.php');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


$styleArray = [
    'font' => [
        'bold' => true,
    ],
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
    ],
    'borders' => [
        'top' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
    ],
    'fill' => [
        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
        'rotation' => 90,
        'startColor' => [
            'argb' => 'FFA0A0A0',
        ],
        'endColor' => [
            'argb' => 'FFFFFFFF',
        ],
    ],
];




$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
// $spreadsheet->getActiveSheet()->mergeCells('100:$200');
$sheet->setCellValue('A3', 'FİYAT TEKLİFİ');
$sheet->getStyle('A3')->getFont()->setBold(true);

//TODO Merging cells    
$sheet->mergeCells('A3:H3');
$sheet->getRowDimension('3')->setRowHeight(35);

$sheet->getStyle('B11')->applyFromArray($styleArray);




// $spreadsheet->getActiveSheet()->getRowDimension('10')->setRowHeight(100);
// $sheet->getRowDimension('4')->setRowHeight(150);
// $sheet->getColumnDimension('A')->setWidth(150);
$sheet->setCellValue('A4', 'FİRMA ADI');
$sheet->getStyle('A4')->getFont()->setBold(true);
$sheet->setCellValue('A5', 'YETKİLİ ADI');
$sheet->getStyle('A5')->getFont()->setBold(true);
$sheet->setCellValue('A6', 'TELEFON');
$sheet->getStyle('A6')->getFont()->setBold(true);
$sheet->setCellValue('A7', 'E-POSTA');
$sheet->getStyle('A7')->getFont()->setBold(true);
$sheet->setCellValue('A8', 'FATURA ADRESİ');
$sheet->getStyle('A8')->getFont()->setBold(true);
$sheet->setCellValue('A9', 'VERGİ DAİRESİ/NO');
$sheet->getStyle('A9')->getFont()->setBold(true);
$sheet->setCellValue('A10', 'S.NO');
$sheet->getStyle('A10')->getFont()->setBold(true);


$rowA = 11;
//TODO Adding image



// $drawing->setWidthAndHeight(160,120);//Edit picture width & height

$rowToHoldExcelCellLocation = 11;
$lastColumn = $sheet->getHighestColumn();

$column = 2;


//TODO Make every cell starting from 'B' to 'I' autosize
foreach (range('A', 'I') as $columnID) {
    $spreadsheet->getActiveSheet()->getColumnDimension($columnID)
        ->setAutoSize(true);
    }




//TODO Add values from database to excel cells
$sql  = "SELECT firmaAdi,urunAdi,model,olcu,renk,miktar,birimFiyati,tutar FROM form2";
$result  = $db->query($sql);
if (!$result) {
    trigger_error('Invalid query: ' . $conn->error);
}
if ($result->num_rows > 0) {


    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["firmaAdi"] . "</td><td>" . "  " . $row["urunAdi"] . "</td></tr>";

        if (true) {
            // $sheet->setCellValue('B'.$rowToHoldExcelCellLocation,$row["urunAdi"]);




            $sheet->setCellValueByColumnAndRow($column, $rowToHoldExcelCellLocation, $row["urunAdi"]);
            
            
            $column++;
            $sheet->setCellValueByColumnAndRow($column, $rowToHoldExcelCellLocation, $row["model"]);
            $column++;

            $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
            $drawing->setName('Paid');
            $drawing->setDescription('Paid');
            //TODO find a variable names for images
            $drawing->setPath('images/paid.jpg'); // put your path and image here,changing


            $columnImageLetter = "H";



            $drawing->setWidthAndHeight(50, 50);
            $drawing->setCoordinates($columnImageLetter . $rowA);
            $rowA++;
            $drawing->setOffsetX(110);
            $drawing->setRotation(0);
            $drawing->getShadow()->setVisible(true);
            $drawing->getShadow()->setDirection(0);
            $drawing->setWorksheet($spreadsheet->getActiveSheet());
        }
        $rowToHoldExcelCellLocation++;
        $column = 2;
    }
}

$sheet->setCellValue('B10', 'ÜRÜN ADI ');



$sheet->setCellValue('C10', 'MODEL ');

$sheet->setCellValue('D10', 'ÖLÇÜ ');

$sheet->setCellValue('E10', 'RENK');

$sheet->setCellValue('F10', 'MİKTAR');

$sheet->setCellValue('G10', 'BİRİM FİYATI ');

$sheet->setCellValue('H10', 'TUTAR');

$sheet->setCellValue('I10', 'GÖRSEL ');



$writer = new Xlsx($spreadsheet);
$writer->save('hello world.xlsx');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Action Page</title>
    <a href="urunDetay.php" class="mt-5 mb-3 text-muted">Back</a>
</head>

<body>

</body>

</html>