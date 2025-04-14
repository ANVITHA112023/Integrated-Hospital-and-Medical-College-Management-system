<?php
// Connect to the database
$host="localhost";
$username="root";
$password="";
$dbname="management";

$conn = mysqli_connect($host, $username, $password, $dbname);

$sql = "SELECT * FROM employee";
$result = mysqli_query($conn, $sql);


// Check if the form is submitted
if(isset($_POST['submit'])) {
    // Get the form data
    $E_name = $_POST['E_name'];
    $E_id = $_POST['E_id'];
    $Phone_no = $_POST['Phone_no'];
    $E_type = $_POST['E_type'];

    // Validate the form data
    if(empty($E_name) || empty($Phone_no)||empty($E_type)){
        echo "Please fill out all fields";
    } else {
        // Insert the record
        $sql = " UPDATE employee SET E_name='$E_name', Phone_no='$Phone_no',E_type='$E_type' WHERE E_id='$E_id'";
        $result = mysqli_query($conn, $sql);

        if($result) {
            echo '<h1 style="color: blue; text-align: center;"> Record updated successfully </h1>';
        } else {
            echo "Error Updating record: " . mysqli_error($conn);
        }
    }
}

// Close the database connection
mysqli_close($conn);
?>

<form action="index.php" style="display: flex; justify-content: center; align-items: center; height: 100vh;">
    <input type="submit" value="Go back to main menu" style="background-color: blue; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
</form>