<style>
    body {
        background-image: url('h2.jpg'); /* Replace this with your image file */
    background-size: 100% 100% ;
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
// Connect to the database
$host="localhost";
$username="root";
$password="";
$dbname="management";

$conn = mysqli_connect($host, $username, $password, $dbname);

// Check if the form is submitted
if(isset($_POST['submit'])) {
    // Get the form data
    $D_name = $_POST['D_name'];
    $D_id = $_POST['D_id'];
    $Phone_no = $_POST['Phone_no'];
    $Speciality = $_POST['Speciality'];
    $Availability1=$_POST['Availability1'];

    // Validate the form data
    if(empty($D_name) || empty($D_id) || empty($Phone_no)||empty($Speciality)||empty($Availability1)){
        echo "Please fill out all fields";
    } else {
        // Insert the record
        $sql = "INSERT INTO doctor( D_name,D_id, Phone_no, Speciality,Availability1) VALUES ( '$D_name','$D_id',' $Phone_no','$Speciality','$Availability1')";
        $result = mysqli_query($conn, $sql);

        if($result) {
            echo '<h1> Record inserted successfully </h1>';
        } else {
            echo "Error inserting record: " . mysqli_error($conn);
       }
    }
}

// Close the database connection
mysqli_close($conn);
?>

<form action="index.php">
    <input type="submit" value="Go back to main menu" >
</form>

<form action="index.php">
    <input type="submit" value="logout" >
</form>