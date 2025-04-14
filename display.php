<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Records</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0fff0;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            font-size: 28px;
            color: #555;
        }
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
        }
        .grid-table {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 10px;
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fff;
        }
        .grid-header {
            font-weight: bold;
            background-color: #f2f2f2;
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        .grid-item {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        .grid-item:last-child {
            border-bottom: none;
        }
        .button-container {
            text-align: center;
            margin-top: 20px;
        }
        .button-container input {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .button-container input:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Doctor Records</h1>
    <div class="container">
        <div class="grid-table">
            <!-- Headers -->
            <div class="grid-header">ID</div>
            <div class="grid-header">Name</div>
            <div class="grid-header">Phone Number</div>
            <div class="grid-header">Speciality</div>
            <div class="grid-header">Availability</div>

            <?php
            // Database connection
            $host = "localhost";
            $username = "root";
            $password = "";
            $dbname = "management";

            $conn = mysqli_connect($host, $username, $password, $dbname);

            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Retrieve doctor records
            $sql = "SELECT * FROM doctor"; // Replace 'doctors' with your actual table name
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                // Output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='grid-item'>" . htmlspecialchars($row['D_id']) . "</div>";
                    echo "<div class='grid-item'>" . htmlspecialchars($row['D_name']) . "</div>";
                    echo "<div class='grid-item'>" . htmlspecialchars($row['Phone_no']) . "</div>";
                    echo "<div class='grid-item'>" . htmlspecialchars($row['Speciality']) . "</div>";
                    echo "<div class='grid-item'>" . htmlspecialchars($row['Availability1']) . "</div>";
                }
            } else {
                echo "<div class='grid-item' colspan='5'>No records found</div>";
            }

            // Close the connection
            mysqli_close($conn);
            ?>
        </div>
    </div>
    <div class="button-container">
        <form action="d_signup.php">
            <input type="submit" value="Back to Signup">
        </form>
    </div>
</body>
</html>