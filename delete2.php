<?php
// Connect to the database
$host="localhost";
$username="root";
$password="";
$dbname="management";

$conn = mysqli_connect($host, $username, $password, $dbname);

// Check if the form is submitted
if(isset($_POST['submit'])) {
    // Get the form data
    $E_id = $_POST['E_id'];

    // Validate the form data
    if(empty($E_id)) {
        echo "Please fill out all fields";
    } else {
        // Delete the record
        $sql = "DELETE FROM employee WHERE E_id='$E_id'";
        $result = mysqli_query($conn, $sql);

        if($result) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    }
}

// Close the database connection
mysqli_close($conn);
?>

<form action="index.php">
    <input type="submit" value="Go back to main menu">
</form>
