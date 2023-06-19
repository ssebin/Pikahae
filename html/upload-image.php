<?php
    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Process the image upload
        $targetFile = $_FILES['file-upload']['tmp_name'];

        // Database connection and query to insert the new menu item
        $dbHost = 'localhost:3307';
        $dbUsername = 'root';
        $dbPassword = '';
        $dbName = 'pikahae_db';

        $conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Read the uploaded image file
        $imageData = file_get_contents($targetFile);
        $imageData = mysqli_real_escape_string($conn, $imageData);

        // Insert the new menu item into the menu table
        $insertQuery = "UPDATE user SET user_img = $imageData WHERE user_id = 1";
        $result = mysqli_query($conn, $insertQuery);
        if (!$result) {
            die("Error: " . mysqli_error($conn));
        }

        // Close the database connection
        mysqli_close($conn);

        // Redirect back to manage_menu.php
        header("Location: view-profile.php");
        exit;
    }
?>