<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor's Patient Records</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #333;
        }
        .container {
            max-width: 900px;
            margin: 50px auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #007bff;
            font-size: 28px;
            margin-bottom: 20px;
        }
        form {
            margin-bottom: 30px;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        input[type="number"], button {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 15px;
            text-align: center;
            font-size: 14px;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #eaf4ff;
        }
        .error {
            color: red;
            font-weight: bold;
            margin-top: 20px;
        }
        .success {
            color: green;
            font-weight: bold;
            margin-top: 20px;
            text-align: center;
        }
        @media (max-width: 768px) {
            table, th, td {
                font-size: 12px;
            }
            th, td {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Doctor's Intern Records</h1>
        <?php
        if (!isset($_POST['submit'])) {
            echo '<form method="POST">
                    <label for="D_id">Enter you password:</label>
                    <input type="number" id="D_id" name="D_id" required>
                    <button type="submit" name="submit">View Interns</button>
                  </form>';
        }

        if (isset($_POST['submit'])) {
            // Database connection
            $host = "localhost";
            $username = "root";
            $password = "";
            $dbname = "management";

            $conn = new mysqli($host, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                echo "<div class='error'>Database connection failed. Please try again later.</div>";
                exit;
            }

            $D_id = (int) $_POST['D_id'];

            // SQL query to fetch doctor and patient details
            $sql = "
                SELECT 
                    i.id AS InternID, 
                    i.username AS Username, 
                    i.password1 AS Password, 
                    i.email AS Email
                FROM 
                    doctor d
                JOIN 
                    intern i ON d.D_id = i.D_id
                WHERE 
                    d.D_id = ?";

            $stmt = $conn->prepare($sql);

            if (!$stmt) {
                echo "<div class='error'>Failed to prepare the query. Please try again later.</div>";
                $conn->close();
                exit;
            }

            // Bind the parameter and execute
            $stmt->bind_param("i", $D_id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo "<div class='success'>Showing records for Doctor ID: $D_id</div>";
                echo "<table>
                        <tr>
                            <th>Intern ID</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Email</th>
                        </tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . htmlspecialchars($row['InternID']) . "</td>
                            <td>" . htmlspecialchars($row['Username']) . "</td>
                            <td>" . htmlspecialchars($row['Password']) . "</td>
                            <td>" . htmlspecialchars($row['Email']) . "</td>
                          </tr>";
                }
                echo "</table>";
            } else {
                echo "<div class='error'>No interns found for the given Doctor ID.</div>";
            }

            // Close the statement and connection
            $stmt->close();
            $conn->close();
        }
        ?>
    </div>
</body>
</html>
