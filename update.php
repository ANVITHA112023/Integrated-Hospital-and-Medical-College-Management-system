<?php
// Connect to the database
$host="localhost";
$username="root";
$password="";
$dbname="management";

$conn = mysqli_connect($host, $username, $password, $dbname);

$sql = "SELECT * FROM doctor";
$result = mysqli_query($conn, $sql);

// Check if the form is submitted
if(isset($_POST['submit'])) {
    // Get the form data
    $D_name = $_POST['D_name'];
    $D_id = $_POST['D_id'];
    $Phone_no = $_POST['Phone_no'];
    $Speciality = $_POST['Speciality'];
    $Availability1=$_POST['Availability1'];

    // Validate the form data
    if(empty($D_name)|| empty($Phone_no)||empty($Speciality)||empty($Availability1)){
        echo "Please fill out all fields";
    } else {
        // Insert the record
        $sql = "UPDATE doctor SET D_name='$D_name', Phone_no= '$Phone_no', Speciality='$Speciality',Availability1='$Availability1' WHERE D_id='$D_id' ";
        $result = mysqli_query($conn, $sql);

        if($result) {
            echo '<h1 style="color: blue; text-align: center;"> Record updated successfully </h1>';
        } else {
            echo "Error updating record: " . mysqli_error($conn);
       }
    }
}

// Close the database connection
mysqli_close($conn);
?>

<form action="index.php" style="display: flex; justify-content: center; align-items: center; height: 100vh;">
    <input type="submit" value="Go back to main menu" style="background-color: blue; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
</form>