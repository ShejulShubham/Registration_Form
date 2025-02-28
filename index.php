<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" class="stylesheet">
    <title>User Form</title>
</head>
<body>
    
    <div class="form-container">
        <div class="header">
            <h1>User Form</h1>
        </div>
        <form action="submit.php" method="POST">
        <div class="input">
            <label for="firstname">First Name:</label>
            <input type="text" id="firstname" name="firstname" required><br><br>
        </div>

        <div class="input">
            <label for="lastname">Last Name:</label>
            <input type="text" id="lastname" name="lastname" required><br><br>
        </div>

        <div class="input">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>
        </div>

        <div class="input">
            <label for="phone">Phone:</label>
            <input type="phone" id="phone" name="phone" required><br><br>
        </div>
        
        <div class="btn">
            <button type="submit">Submit</button>
        </div>
    </form>
        <p>Access admin page <a href="admin_login.php">Here</a></p>
    </div>
</body>
</html>