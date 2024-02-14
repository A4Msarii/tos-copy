<?php
// Include PhpSpreadsheet
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
include('../../includes/config.php');
include(ROOT_PATH . 'includes/connect.php');
echo $id=$_REQUEST['us_id'];

// Fetch data from the database
$sql = "SELECT * FROM gradesheet where user_id='$id'";
$result = $connect->query($sql);

// Create a new Spreadsheet
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Add headers to the Excel sheet
$sheet->setCellValue('A1', 'Student Name');
$sheet->setCellValue('B1', 'Subject');
$sheet->setCellValue('C1', 'Marks');

// Add data to the Excel sheet
$row = 2;
while ($row_data = $result->fetch_assoc()) {
    $sheet->setCellValue('A' . $row, $row_data['user_id']);
    $sheet->setCellValue('B' . $row, $row_data['class_id']);
    $sheet->setCellValue('C' . $row, $row_data['over_all_grade_per']);
    $row++;
}

// Create a chart
$chart = new \PhpOffice\PhpSpreadsheet\Chart\Chart(
    'Chart',
    new \PhpOffice\PhpSpreadsheet\Chart\DataSeries(
        \PhpOffice\PhpSpreadsheet\Chart\DataSeries::TYPE_BARCHART,
        null,
        range('B2', 'C' . ($row - 1)),
        range('A2', 'A' . ($row - 1))
    )
);

// Set the chart title
$chart->getTitle()->setText('Student Marks');

// Set the X-axis label
$chart->setXAxisLabel('Marks');

// Set the Y-axis label
$chart->setYAxisLabel('Student Name');

// Add the chart to the spreadsheet
$sheet->addChart($chart);

// Save the Excel file
$writer = new Xlsx($spreadsheet);
$writer->save('students_data.xlsx');

// Close the database connection
$connect->close();
?>