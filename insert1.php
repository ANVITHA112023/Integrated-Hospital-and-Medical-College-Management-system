<style>
    body {
        background-image: url('h2.jpg'); /* Replace with your image file */
        background-size: 100% 100%;
        background-position: center;
        background-repeat: no-repeat;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        text-align: center;
    }

    h1 {
            display: block;
            margin: 10px auto; /* Center horizontally */
            padding: 30px 30px;
            background-color: #c8eaea;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            text-decoration: none;
            font-size: 1.2em;
            font-weight: bold;
            color: rgb(67, 19, 19);
            font-size: 3em;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            width: 60%;
            max-width: 300px;
        }


    form {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    input[type="submit"] {
        background-color: blue;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
</style>

<?php
// Database connection
$host = "localhost";
$username = "root";
$password = "";
$dbname = "management";

// Create connection
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("<h1>Database connection failed: " . mysqli_connect_error() . "</h1>");
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $P_name = mysqli_real_escape_string($conn, $_POST['P_name'] ?? '');
$P_id = mysqli_real_escape_string($conn, $_POST['P_id'] ?? '');
$Phone_no = mysqli_real_escape_string($conn, $_POST['Phone_no'] ?? '');
$D_name = mysqli_real_escape_string($conn, $_POST['D_name'] ?? '');
$Gender = mysqli_real_escape_string($conn, $_POST['Gender'] ?? '');
$Age = mysqli_real_escape_string($conn, $_POST['Age'] ?? '');
$Disease = mysqli_real_escape_string($conn, $_POST['Disease'] ?? '');
$Medication = mysqli_real_escape_string($conn, $_POST['Medication'] ?? '');
$Admission_date = mysqli_real_escape_string($conn, $_POST['Admission_date'] ?? '');
$Discharge_date = mysqli_real_escape_string($conn, $_POST['Discharge_date'] ?? '');
$Visit_type = mysqli_real_escape_string($conn, $_POST['Visit_type'] ?? '');
$Billing = mysqli_real_escape_string($conn, $_POST['Billing'] ?? '');
$D_id = mysqli_real_escape_string($conn, $_POST['D_id'] ?? '');


    // Check required fields
    if (empty($P_name) || empty($P_id) || empty($Phone_no) || empty($D_name) || empty($D_id)) {
        echo "<h1>Please fill out all required fields</h1>";
    } else {
        // Insert into the database
        $sql = "INSERT INTO patient (P_name, P_id, Phone_no, D_name, Gender, Age, Disease, Medication, Admission_date, Discharge_date, Visit_type, Billing, D_id)
                VALUES ('$P_name', '$P_id', '$Phone_no', '$D_name', '$Gender', '$Age', '$Disease', '$Medication', '$Admission_date', '$Discharge_date', '$Visit_type', '$Billing', '$D_id')";

        if (mysqli_query($conn, $sql)) {
            echo "<h1>Record inserted successfully</h1>";
        } else {
            echo "<h1>Error: " . mysqli_error($conn) . "</h1>";
        }
    }
}

// Close the connection
mysqli_close($conn);
?>

<form action="index.php">
    <input type="submit" value="Go back to main menu" >
</form>

<form action="index.php">
    <input type="submit" value="logout" >
</form>