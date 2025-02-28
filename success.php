<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission Success</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }

        .success-message {
            text-align: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .success-message h2 {
            color: #4CAF50;
            margin-bottom: 20px;
        }

        .success-message img {
            width: 200px;
            margin-bottom: 10px;
        }

        .success-message a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }

        .success-message a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="success-message">
        <img src="https://media.giphy.com/media/QJ4Hm8oJgMJIqFAuVc/giphy.gif?cid=790b7611j2mrqofw71kj2md7od6jfauxnv80610ivxzaknf5&ep=v1_stickers_search&rid=giphy.gif&ct=s" alt="Success GIF">
        <h2>Form Submitted Successfully!</h2>
        <p>Thank you for submitting the form. We will get back to you soon.</p>
        <a href="index.php">Return to Home</a>
    </div>
</body>
</html>