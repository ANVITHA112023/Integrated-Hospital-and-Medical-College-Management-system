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

    .container {
        text-align: center;
        padding: 30px 20px;
        background-color: #ffffff;
        border: 1px solid #ddd;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h1 {
        color: white;
        font-size :60px;
        margin-bottom: 20px; /* Space between the text and the button */
    }

    form {
        margin: 0;
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
    $username = $_POST['username'];
    $password1 = $_POST['password1'];
    $email = $_POST['email'];
    $id = $_POST['id'];
    $id = $_POST['D_id'];

    // Validate the form data
    if(empty($username) || empty($password1) || empty($email)||empty($id)){
        echo "Please fill out all fields";
    } else {
        // Insert the record
        $sql = "INSERT INTO intern( username,password1,email,id,D_id) VALUES ( '$username','$password1',' $email',' $id','$D_id')";
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

<form action="index.php" >
    <input type="submit" value="Go back to main menu">
</form>