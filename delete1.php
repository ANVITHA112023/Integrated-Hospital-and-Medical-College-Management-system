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
        color: white;
        font-size :60px;
        margin-bottom: 20px; /* Space between the text and the button */
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
    $P_id = $_POST['P_id'];

    // Validate the form data
    if(empty($P_id)) {
        echo "Please fill out all fields";
    } else {
        // Delete the record
        $sql = "DELETE FROM patient WHERE P_id='$P_id'";
        $result = mysqli_query($conn, $sql);

        if($result) {
            echo "<h1>Record deleted successfully</h1>";
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
