<?php
session_start();

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
    $admin_username = $_POST['username'];
    $admin_password = $_POST['password'];
    
    // echo "<script type='text/javascript'>alert('$admin_username' + '$admin_password');</script>";

    // Fetch admin from the database
    $stmt = $conn->prepare("SELECT * FROM admins WHERE username = :username");
    $stmt->bindParam(':username', $admin_username);
    $stmt->execute();
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    // if($admin){
    //     echo "<script type='text/javascript'>alert('admin is there');</script>";
    // }

    // if(!password_verify($admin_password, $admin['password'])){
    //     echo "<script type='text/javascript'>alert('password verification failed');</script>";
    // }
    // $pass=$admin['password'];

    // echo "<script type='text/javascript'>alert('$admin_password');</script>";


    // check if admin exists and password is matching
    if ($admin && $admin_password === $admin['password']) {
        $_SESSION['admin_logged_in'] = true;
        // Redirect to admin dashboard
        header('Location: admin_dashboard.php'); 
    } else {
        echo "Invalid username or password.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>