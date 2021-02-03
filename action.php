<?php
session_start();
require_once('config.php');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A3', 'FİYAT TEKLİFİ');
$sheet->setCellValue('A4', 'FİRMA ADI');
$sheet->setCellValue('A5', 'YETKİLİ ADI');
$sheet->setCellValue('A6', 'TELEFON');
$sheet->setCellValue('A7', 'E-POSTA');
$sheet->setCellValue('A8', 'FATURA ADRESİ');
$sheet->setCellValue('A9', 'VERGİ DAİRESİ/NO');
$sheet->setCellValue('A10', 'S.NO');

$rowToHoldExcelCellLocation = 11;
$lastColumn = $sheet->getHighestColumn();
$lastColumn++;
$column = 'B';
// for($column  ='A';$column !=$lastColumn; $column++){
//     $cell = $sheet->getCell($column.$rowToHoldExcelCellLocation);
//     //Do what you want wtih the cell
// }

// $sql  ="SELECT .... FROM ` ... ` WHERE  ";
// $result = mysql_query($sql);
// $row = 11; // 1-based index
// $column = 1;


// while($data = mysql_fetch_assoc($result)) {
//     $sheet->setCellValueByColumnAndRow($column, $row, $data['ptlum']);
//     $column = $column + 1; //or $column++; if you prefer
// }


//TODO Add values from database to excel cells
$sql  = "SELECT firmaAdi,urunAdi,model,olcu,renk,miktar,birimFiyati,tutar,gorsel FROM form2";
$result  = $db->query($sql);

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["firmaAdi"] . "</td><td>" . $row["urunAdi"] . "</td></tr>";
        if (true) {
            // $sheet->setCellValue('B'.$rowToHoldExcelCellLocation,$row["urunAdi"]);

            $column  = 'B';

            //TODO find a way to write value in the cell-which type of parameter should I use?-
            $sheet->setCellValueByColumnAndRow('B', '11', $row["urunAdi"]);
            $sheet->setCellValueByColumnAndRow($column, $rowToHoldExcelCellLocation, $row["model"]);
            $column++;
        }
        $column++;
    }
}

$sheet->setCellValue('B10', 'ÜRÜN ADI ');
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