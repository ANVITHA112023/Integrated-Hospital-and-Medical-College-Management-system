<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Login</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
      background-image: url('h10.jpg'); /* Replace this with your image file */
    background-size: 100% 100% ;
    background-position: center;
    background-repeat: no-repeat;
      margin: 0;
      padding: 0;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        h1 {
            text-align: center;
            font-size: 24px;
            color: #444;
            margin-bottom: 20px;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .error {
            color: red;
            text-align: center;
            margin-top: 10px;
        }
        .success {
            color: green;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Admin Login</h1>
        <form method="POST" action="">
            <input type="text" name="username" placeholder="Enter Username" required>
            <input type="password" name="password1" placeholder="Enter Password" required>
            <input type="submit" name="submit" value="Login">
        </form>
        <?php
        if (isset($_POST['submit'])) {
            // Database connection
            $host = "localhost";
            $username = "root";
            $password = "";
            $dbname = "management";

            $conn = mysqli_connect($host, $username, $password, $dbname);

            // Check connection
            if (!$conn) {
                die("<div class='error'>Connection failed: " . mysqli_connect_error() . "</div>");
            }

            // Retrieve user input
            $input_username = $_POST['username'];
            $input_password1 = $_POST['password1'];

            // Query to check credentials
            $sql = "SELECT * FROM manager WHERE username = ? AND password1 = ?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "ss", $input_username, $input_password1);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) > 0) {
                echo "<div class='success'>Login successful! Welcome, $input_username.</div>";
        echo "<div class='success'><a href='display.html' style='color: #007BFF; text-decoration: none; font-weight: bold;'>Enter to Manager Record</a></div>";
            } else {
                echo "<div class='error'>Invalid username or password.</div>";
            }

            // Close connection
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
        }
        ?>
    </div>
</body>
</html>