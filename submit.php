<?php

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
    // $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    // specifying custom port number for MySQL
    $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get form data
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Insert data into the database
    $stmt = $conn->prepare("INSERT INTO users (firstname, lastname, email, phone) 
    VALUES (:firstname, :lastname, :email, :phone)");
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->execute();

    header('Location: success.php'); 
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>