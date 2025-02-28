<?php
// Database connection
$host = 'localhost';
$dbname = 'registration';
$username = 'root';
$password = '';

try {
    // $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    // specifying custom port number for MySQL
    $conn = new PDO("mysql:host=$host;port=3307;dbname=$dbname", $username, $password);
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

    echo "Data saved successfully!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>