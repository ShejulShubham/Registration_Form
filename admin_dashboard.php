<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in'])) {
    // if Not logged in then redirect to admin_login
    header('Location: admin_login.php'); 
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" class="css">
    <title>Admin Dashboard</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Admin Dashboard</h1>
        </div>
        <p>Welcome, Admin!</p>

        <div class="btn">
            <a href="export_csv.php">
                <button>Export All Data in CSV</button>
            </a>
            <a href="export_excel.php">
                <button>Export All Data in Excel</button>
            </a>
        </div>


        <br><br>
        <div class="btn1">
            <a href="admin_logout.php">
                <button>Logout</button>
            </a>
        </div>
    </div>
</body>
</html>