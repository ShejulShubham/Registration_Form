<?php
require 'vendor/autoload.php';
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dotenv\Dotenv;



// Load the .env file
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Database connection
$host = $_ENV['DB_HOST'];
$dbname = $_ENV['DB_NAME'];
$username = $_ENV['DB_USER'];
$password = $_ENV['DB_PASSWORD'];
$port = $_ENV['PORT'];

$conn = new mysqli($host, $username, $password, $dbname, $port);

// check for error
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from database
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

// Create a new Spreadsheet
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Set column headings
$sheet->setCellValue('A1', 'ID');
$sheet->setCellValue('B1', 'First_Name');
$sheet->setCellValue('C1', 'Last_Name');
$sheet->setCellValue('D1', 'Email');
$sheet->setCellValue('E1', 'Phone');
$sheet->setCellValue('F1', 'Created At');

// Make headers bold
$sheet->getStyle('A1:F1')->getFont()->setBold(true);

$row = 2; // Start from second row

while ($data = $result->fetch_assoc()) {
    $sheet->setCellValue('A' . $row, $data['id']);
    $sheet->setCellValue('B' . $row, $data['firstname']);
    $sheet->setCellValue('C' . $row, $data['lastname']);
    $sheet->setCellValue('D' . $row, $data['email']);
    $sheet->setCellValue('E' . $row, $data['phone']);
    $sheet->setCellValue('F' . $row, $data['created_at']);
    $row++;
}

// Auto-size columns
foreach (range('A', 'F') as $column) {
    $sheet->getColumnDimension($column)->setAutoSize(true);
}

// Set headers to force download
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="users.xlsx"');

// Save Excel file to output
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');

$conn->close();
exit;
?>
