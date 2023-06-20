<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
phpinfo();



// Step 1: Establish database connection (replace with your credentials)
$host = "localhost"; // Database host
$username = "root"; // Database username
$password = ""; // Database password
$database = "pikahae_db"; // Database name

$connection = new mysqli('localhost', 'root', '', 'pikahae_db');

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

//testing to see if connected to db
//echo "Connected successfully!";


// Step 2: Retrieve user's table registration preferences
$reservationDate = $_SESSION['reservation_date'];
$reservationTime = $_SESSION['reservation_time'];
$numGuests = $_SESSION['num_guests'];
$tableSelected = $_POST['table_selection'];
$r_id = $_SESSION['user_id'];


//SQL STATEMENT TO INSERT TO TDB
$sqlToDB = "INSERT INTO user_order (order_date, order_time, order_pax, order_status, admin_id, user_id, table_id) VALUES (?, ?, ?, 'Pending', NULL, $r_id, ?)";

// Execute the SQL statement to insert the reservation details
$stmt = mysqli_prepare($connection, $sqlToDB);
$stmt->bind_param('ssii', $reservationDate, $reservationTime, $numGuests, $tableSelected);

$stmt->execute();


// //DEGUGGUNG THE DATABASE TO CHECK MASUK KE TAK
$result = mysqli_stmt_execute($stmt);

// Check if the execution failed
if (!$result) {
    die("Statement execution failed: " . mysqli_stmt_error($stmt));
}

// Get the order ID of the inserted row
$orderId = mysqli_insert_id($connection);

// Close the statement and database connection
mysqli_stmt_close($stmt);
mysqli_close($connection);

// Print the inserted data and order ID for debugging
echo "Data inserted successfully. Order ID: " . $orderId;

        


// Close the statement and database connection
//$stmt->close();
//$mysqli->close();



?>