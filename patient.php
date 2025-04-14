<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Details</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
      background-image: url('h10.jpg'); /* Replace this with your image file */
    background-size: 100% 100% ;
    background-position: center;
    background-repeat: no-repeat;
      margin: 0;
      padding: 0;
            background-color: #f4f4f9;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input[type="text"], input[type="number"], button {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #007BFF;
            color: white;
        }
        .success {
            color: green;
            margin-bottom: 20px;
            font-weight: bold;
        }
        .error {
            color: red;
            margin-bottom: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Patient Details</h1>
        <form method="POST">
            <label for="P_id">Patient ID:</label>
            <input type="number" id="P_id" name="P_id" required>

            <label for="P_name">Patient Name:</label>
            <input type="text" id="P_name" name="P_name" required>

            <button type="submit" name="submit">Get Details</button>
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
            $input_P_id = $_POST['P_id'];
            $input_P_name = $_POST['P_name'];

            // Query to check and fetch patient details
            $sql = "SELECT * FROM patient WHERE P_id = ? AND P_name = ?";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "is", $input_P_id, $input_P_name);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) > 0) {
                // Fetch the patient's details
                $row = mysqli_fetch_assoc($result);
                echo "<div class='success'>Patient found! Here are the details:</div>";
                echo "<table>";
                echo "<tr><th>Patient ID</th><td>" . htmlspecialchars($row['P_id']) . "</td></tr>";
                echo "<tr><th>Patient Name</th><td>" . htmlspecialchars($row['P_name']) . "</td></tr>";
                echo "<tr><th>Phone Number</th><td>" . htmlspecialchars($row['Phone_no']) . "</td></tr>";
                echo "<tr><th>Attending Doctor</th><td>" . htmlspecialchars($row['D_name']) . "</td></tr>";
                echo "<tr><th>Gender</th><td>" . htmlspecialchars($row['Gender']) . "</td></tr>";
                echo "<tr><th>Age</th><td>" . htmlspecialchars($row['Age']) . "</td></tr>";
                echo "<tr><th>Disease</th><td>" . htmlspecialchars($row['Disease']) . "</td></tr>";
                echo "<tr><th>Medication</th><td>" . htmlspecialchars($row['Medication']) . "</td></tr>";
                echo "<tr><th>Admission date</th><td>" . htmlspecialchars($row['Admission_date']) . "</td></tr>";
               
                echo "<tr><th>Discharge Date</th><td>" . htmlspecialchars($row['Discharge_date']) . "</td></tr>";
                echo "<tr><th>Visit type</th><td>" . htmlspecialchars($row['Visit_type']) . "</td></tr>";
                echo "<tr><th>Billing</th><td>" . htmlspecialchars($row['Billing']) . "</td></tr>";
                echo "</table>";
            } else {
                echo "<div class='error'>No patient found with the provided details.</div>";
            }

            // Close connection
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
        }
        ?>
    </div>
    <form action="index.php" style="display: flex; justify-content: center; align-items: center; height: 100vh;">
    <input type="submit" value="Go back to main menu" style="background-color: blue; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
</form>
<button class="logout-btn" onclick="window.location.href = 'index.php';">Logout</button>
</body>
</html>