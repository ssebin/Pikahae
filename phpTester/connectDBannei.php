<?php
$host = "localhost"; // Database host
$username = "root"; // Database username
$password = ""; // Database password
$database = "pikahae_db"; // Database name

// Create a new mysqli instance
$connection = new mysqli('localhost', 'root', '', 'pikahae_db');

// Check the connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Connection successful, perform database operations here
echo "Connected successfully!";

// Close the connection
$connection->close();
?>
