<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Records</title>
    <style>
    /* General Body Styling */
    body {
        font-family: Arial, sans-serif;
        background-color: #f0fff0; /* Light green background */
        color: #333; /* Neutral text color */
        margin: 0;
        padding: 20px;
    }

    /* Heading Styling */
    h1 {
        text-align: center;
        font-size: 28px;
        color: #555; /* Soft gray heading color */
        margin-bottom: 20px;
    }

    /* Container for Responsive Layout */
    .container {
        width: 90%;
        max-width: 1200px;
        margin: 0 auto;
    }

    /* Grid Table Styling */
    .grid-table {
        display: grid;
        grid-template-columns: repeat(4, 1fr); /* Adjust columns to fit content */
        gap: 10px;
        margin-top: 20px;
        padding: 10px;
        border: 1px solid #ddd; /* Light border for structure */
        border-radius: 8px;
        background-color: #fff; /* White background for contrast */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
    }

    /* Header Cells */
    .grid-header {
        font-weight: bold;
        background-color: #f2f2f2; /* Light gray header background */
        padding: 10px;
        text-align: center;
        border-bottom: 2px solid #ddd; /* Distinct separator for headers */
    }

    /* Grid Items */
    .grid-item {
        padding: 10px;
        text-align: center;
        border-bottom: 1px solid #ddd;
        font-size: 14px;
    }

    .grid-item:last-child {
        border-bottom: none; /* Remove border for last item */
    }

    /* Button Container Styling */
    .button-container {
        text-align: center;
        margin-top: 20px;
    }

    /* Button Styling */
    .button-container input {
        background-color: #007BFF; /* Blue button color */
        color: #fff; /* White text */
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease, transform 0.2s ease; /* Smooth interactions */
    }

    .button-container input:hover {
        background-color: #0056b3; /* Darker blue on hover */
        transform: scale(1.05); /* Slight zoom effect */
    }
</style>
</head>
<body>
    <h1>Employee Records</h1>
    <div class="container">
        <div class="grid-table">
            <!-- Headers -->
            <div class="grid-header">Name</div>
            <div class="grid-header">ID</div>
            <div class="grid-header">Phone Number</div>
            <div class="grid-header">Employee Type</div>

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
            $sql = "SELECT * FROM employee"; // Replace 'doctors' with your actual table name
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                // Output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='grid-item'>" . htmlspecialchars($row['E_name']) . "</div>";
                    echo "<div class='grid-item'>" . htmlspecialchars($row['E_id']) . "</div>";
                    echo "<div class='grid-item'>" . htmlspecialchars($row['Phone_no']) . "</div>";
                    echo "<div class='grid-item'>" . htmlspecialchars($row['E_type']) . "</div>";
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