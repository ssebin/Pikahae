<?php
    $connection = new mysqli('localhost:3307', 'root', '', 'pikahae_db');
    // Check the connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    } else {
    }

    // Delete acc
    $query = "DELETE FROM user WHERE user_id = 1";
    $stmt = $connection->prepare($query);
    $stmt->execute();
?>
