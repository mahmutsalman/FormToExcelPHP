<?php
session_start();

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A3','FİYAT TEKLİFİ');
$sheet->setCellValue('A4', 'FİRMA ADI');
$sheet->setCellValue('A5', 'YETKİLİ ADI');
$sheet->setCellValue('A6', 'TELEFON');
$sheet->setCellValue('A7','E-POSTA');
$sheet->setCellValue('A8','FATURA ADRESİ');
$sheet->setCellValue('A9','VERGİ DAİRESİ/NO');
$sheet->setCellValue('A10','S.NO');

$sheet->setCellValue('B10','ÜRÜN ADI ');
$urunAdi=$_SESSION['urunAdi'] ;
$index=$_SESSION['index'];
$sheet->setCellValue('B1'.$index,$urunAdi);


$sheet->setCellValue('C10','MODEL ');

$sheet->setCellValue('D10','ÖLÇÜ ');

$sheet->setCellValue('E10','RENK');

$sheet->setCellValue('F10','MİKTAR');

$sheet->setCellValue('G10','BİRİM FİYATI ');

$sheet->setCellValue('H10','TUTAR');

$sheet->setCellValue('I10','GÖRSEL ');



$writer = new Xlsx($spreadsheet);
$writer->save('hello world.xlsx');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Action Page</title>
    <a href="index.php" class="mt-5 mb-3 text-muted">Back</a>
</head>
<body>
    
</body>
</html>