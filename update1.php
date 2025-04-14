<?php
// Start session
session_start();

// Database connection details
$host = "localhost";
$username = "root";
$password = "";
$dbname = "management";

// Create a connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize a flag to track whether to show the form
$showForm = true;

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect form data
    $P_name = trim($_POST['P_name']);
    $P_id = trim($_POST['P_id']);
    $Phone_no = trim($_POST['Phone_no']);
    $D_name = trim($_POST['D_name']);
    $Gender = $_POST['Gender'];
    $Age = intval($_POST['Age']);
    $Disease = trim($_POST['Disease']);
    $Medication = trim($_POST['Medication']);
    $Admission_date = $_POST['Admission_date'];
    $Discharge_date = !empty($_POST['Discharge_date']) ? $_POST['Discharge_date'] : NULL; // Handle NULL if empty
    $Visit_type = $_POST['Visit_type'];
    $Billing = intval($_POST['Billing']);
    $D_id = intval($_POST['D_id']);

    // Check if patient exists with the given P_id
    $check_query = "SELECT * FROM patient WHERE P_id = ?";
    $check_stmt = $conn->prepare($check_query);
    $check_stmt->bind_param("s", $P_id);
    $check_stmt->execute();
    $result = $check_stmt->get_result();

    if ($result->num_rows > 0) {
        // Update query using prepared statements
        $query = "UPDATE patient 
                  SET P_name = ?, Phone_no = ?, D_name = ?, Gender = ?, Age = ?, Disease = ?, Medication = ?, 
                      Admission_date = ?, Discharge_date = ?, Visit_type = ?, Billing = ?, D_id = ?
                  WHERE P_id = ?";
        $stmt = $conn->prepare($query);

        if ($stmt) {
            $stmt->bind_param(
                "ssssisisssiii",
                $P_name,
                $Phone_no,
                $D_name,
                $Gender,
                $Age,
                $Disease,
                $Medication,
                $Admission_date,
                $Discharge_date,
                $Visit_type,
                $Billing,
                $D_id,
                $P_id
            );

            // Execute the query
            if ($stmt->execute()) {
                echo "<div class='success'>Patient details updated successfully!</div>";
                $showForm = false; // Hide the form after success
            } else {
                echo "<div class='error'>Error updating patient details: " . $stmt->error . "</div>";
            }

            $stmt->close();
        } else {
            echo "<div class='error'>Error preparing statement: " . $conn->error . "</div>";
        }
    } else {
        echo "<div class='error'>No patient found with ID: $P_id</div>";
    }

    $check_stmt->close();
    $conn->close();
}
?>

<!-- CSS Styling -->
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f8f9fa;
        color: #333;
    }
    .container {
        max-width: 800px;
        margin: 50px auto;
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }
    h2 {
        text-align: center;
        color: #007bff;
        margin-bottom: 20px;
    }
    .success {
        color: green;
        margin: 20px 0;
        padding: 10px;
        border: 1px solid green;
        background-color: #eaffea;
        border-radius: 5px;
    }
    .error {
        color: red;
        margin: 20px 0;
        padding: 10px;
        border: 1px solid red;
        background-color: #ffecec;
        border-radius: 5px;
    }
    form {
        margin-top: 30px;
    }
    label {
        font-weight: bold;
        display: block;
        margin: 10px 0 5px;
    }
    input, select {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    button {
        background-color: #007bff;
        color: #fff;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }
    button:hover {
        background-color: #0056b3;
    }
</style>

<div class="container">
<h2>Update Patient Details</h2>
    <?php if ($showForm): ?>
        <form method="POST">
            <label for="P_id">Patient ID:</label>
            <input type="text" id="P_id" name="P_id" required>

            <label for="P_name">Patient Name:</label>
            <input type="text" id="P_name" name="P_name" required>

            <label for="Phone_no">Phone Number:</label>
            <input type="text" id="Phone_no" name="Phone_no" required>

            <label for="D_name">Doctor Name:</label>
            <input type="text" id="D_name" name="D_name" required>

            <label for="Gender">Gender:</label>
            <select id="Gender" name="Gender" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>

            <label for="Age">Age:</label>
            <input type="number" id="Age" name="Age" required>

            <label for="Disease">Disease:</label>
            <input type="text" id="Disease" name="Disease" required>

            <label for="Medication">Medication:</label>
            <input type="text" id="Medication" name="Medication" required>

            <label for="Admission_date">Admission Date:</label>
            <input type="date" id="Admission_date" name="Admission_date" required>

            <label for="Discharge_date">Discharge Date:</label>
            <input type="date" id="Discharge_date" name="Discharge_date">

            <label for="Visit_type">Visit Type:</label>
            <select id="Visit_type" name="Visit_type" required>
                <option value="Inpatient">Inpatient</option>
                <option value="Outpatient">Outpatient</option>
            </select>

            <label for="Billing">Billing Amount:</label>
            <input type="number" id="Billing" name="Billing" required>

            <label for="D_id">Doctor ID:</label>
            <input type="number" id="D_id" name="D_id" required>

            <button type="submit">Update Details</button>
        </form>
    <?php endif; ?>
</div>
