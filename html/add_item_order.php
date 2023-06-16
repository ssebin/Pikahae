<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$postData = json_decode(file_get_contents('php://input'), true);

$servername = "localhost:4306";
$username = "root";
$password = "";
$dbname = "pikahae_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(['error' => "Connection failed: " . $conn->connect_error]));
} 

// Define variables from the request
$order_id = $conn->real_escape_string($postData['order_id']);
$menu_id = $conn->real_escape_string($postData['menu_id']);
$order_qty = $conn->real_escape_string($postData['order_qty']);

// Generate unique order_item_id
$order_item_id = uniqid();

// Check if the order_item_id already exists in the database
$check_sql = "SELECT * FROM `order_item` WHERE order_item_id = '$order_item_id'";
$check_result = $conn->query($check_sql);

while ($check_result->num_rows > 0) {
    $order_item_id = uniqid();
    $check_result = $conn->query($check_sql);
}

$sql = "INSERT INTO `order_item` (order_item_id, order_id, menu_id, order_quantity) VALUES ('$order_item_id', '$order_id', '$menu_id', '$order_qty')";

$result = $conn->query($sql);

if ($result) {
    echo json_encode(['order_item_id' => $order_item_id]);
} else {
    echo json_encode(['error' => "Error: " . $sql . "<br>" . $conn->error]);
}

$conn->close();
?>
