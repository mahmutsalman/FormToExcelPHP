<?php
session_start();
require_once('config.php');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
// $spreadsheet->getActiveSheet()->mergeCells('100:$200');
$sheet->setCellValue('A3', 'FİYAT TEKLİFİ');
$sheet->setCellValue('A4', 'FİRMA ADI');
$sheet->setCellValue('A5', 'YETKİLİ ADI');
$sheet->setCellValue('A6', 'TELEFON');
$sheet->setCellValue('A7', 'E-POSTA');
$sheet->setCellValue('A8', 'FATURA ADRESİ');
$sheet->setCellValue('A9', 'VERGİ DAİRESİ/NO');
$sheet->setCellValue('A10', 'S.NO');


$rowA = 10;
//TODO Adding image



// $drawing->setWidthAndHeight(160,120);//Edit picture width & height

$rowToHoldExcelCellLocation = 11;
$lastColumn = $sheet->getHighestColumn();

$column = 2;
//Create style, I guess it's not working
// $styleArray = [
//     `font` => [
//         `bold`=>true,
//     ]
// ];





//TODO Add values from database to excel cells
$sql  = "SELECT firmaAdi,urunAdi,model,olcu,renk,miktar,birimFiyati,tutar,gorsel FROM form2";
$result  = $db->query($sql);

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
            $drawing->setPath('images/paid.jpg'); // put your path and image here
            $columnA = 'L';
            
            $drawing->setWidthAndHeight(100, 100);
            $drawing->setCoordinates($columnA . $rowA);
            $rowA++;
            $drawing->setOffsetX(110);
            $drawing->setRotation(25);
            $drawing->getShadow()->setVisible(true);
            $drawing->getShadow()->setDirection(45);
            $drawing->setWorksheet($spreadsheet->getActiveSheet());


            // $drawing->setWorksheet($spreadsheet->getActiveSheet());

            // $column++;
        }
        $rowToHoldExcelCellLocation++;
        $column = 2;
    }
}

$sheet->setCellValue('B10', 'ÜRÜN ADI ');
// $sheet->getStyle('B10:'. $lastColumn . `1`)->applyFromArray($styleArray);
// $urunAdi=$_SESSION['urunAdi'] ;
// $index=$_SESSION['index']; static olmayacak o yüzden kaldırıyorum
// $sheet->setCellValue('B1'.$index,$urunAdi);


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