<?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $img = "4444.jpg";
        $connection = new mysqli('localhost:3307', 'root', '', 'pikahae_db');
        // Check the connection
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        } else {
        }
        // Perform the database update operation to store the values
        $query1 = "UPDATE user SET user_img = ? WHERE user_id = 1";
        $stmt = $connection->prepare($query1);
        $stmt->bind_param("s", $img);
        $stmt->execute();

        // Send a response back to the client if needed
        echo "Data saved successfully.";
    }
?>