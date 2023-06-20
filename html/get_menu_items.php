<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pikahae_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// SQL to select all records from 'menu'
$sql = "SELECT menu_name FROM menu";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Output each row
  while($row = $result->fetch_assoc()) {
    echo "Menu Name: " . $row["menu_name"] . "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>