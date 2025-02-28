<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Admin Login</title>
</head>
<body>
    <div class="form-container">
        <div class="header">
            <h1>Admin Login</h1>
        </div>
        <form action="admin_auth.php" method="POST">
            <div class="input">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required><br><br>
            </div>

            <div class="input">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required><br><br>
            </div>
            <div class="btn">
                <button type="submit">Login</button>
            </div>
        </form>
        <br>
        <br>
        <p>Submit user form <a href='index.php'>Here</p></a>
    </div>
</body>
</html>