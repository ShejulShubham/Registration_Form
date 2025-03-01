<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in'])) {
    // if Not logged in then redirect to admin_login
    header('Location: admin_login.php');
    exit();
}

require 'vendor/autoload.php';

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

try {

    // Connect to database
    $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch data
    $stmt = $conn->query("SELECT id, firstname, lastname, email, phone, created_at FROM users");
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Set headers for CSV download
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="users.csv"');

    // Open output stream
    $output = fopen('php://output', 'w');

    fwrite($output, "ID | \"First Name\" | \"Last Name\" | Email | Phone |\"Created At\"\n");

    foreach ($data as $row) {
        $formattedRow = "{$row['id']} | {$row['firstname']} | {$row['lastname']} | {$row['email']} | {$row['phone']} | \"{$row['created_at']}\"\n";
        fwrite($output, $formattedRow);
    }

    fclose($output);
    exit();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>