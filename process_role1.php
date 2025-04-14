<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the selected user role
    $userRole = $_POST['userRole'] ?? '';

    // Check the role and redirect to the appropriate page
    if ($userRole === 'doctor') {
        header('Location: doctor.html'); // Redirect to Doctor Signup
        exit();
    } elseif ($userRole === 'employee') {
        header('Location: staff.php'); // Redirect to Employee Signup
        exit();
    }elseif ($userRole === 'patient') {
        header('Location: patient.php'); // Redirect to Employee Signup
        exit();
    }elseif ($userRole === 'manager') {
        header('Location: manager.php'); // Redirect to Employee Signup
        exit();
    } else {
        // If no valid role is selected, show an error message
        echo "<h1>Invalid Role Selected</h1>";
        echo "<p>Please go back and select a valid option.</p>";
    }
} else {
    echo "<h1>Invalid Request</h1>";
    echo "<p>Please use the form to submit data.</p>";
}
?>