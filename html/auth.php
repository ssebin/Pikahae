<?php
// Start the session
session_start();

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    // User is logged in
    $user_id = $_SESSION['user_id']; // Retrieve the user_id from the session
    // Display the user_id or perform other operations
} else {
    // User is not logged in, redirect to the login page
    header("Location: login.php");
    exit();
}

?>
