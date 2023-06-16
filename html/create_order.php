<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
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

    // Extract order_pax, user_id, table_id from the request, default to 1 if not provided
    $order_pax = isset($postData['order_pax']) ? $conn->real_escape_string($postData['order_pax']) : 1;
    $user_id = isset($postData['user_id']) ? $conn->real_escape_string($postData['user_id']) : 1;
    $table_id = isset($postData['table_id']) ? $conn->real_escape_string($postData['table_id']) : 1;

    // Set default order_status to 'Pending'
    $order_status = 'Pending';

    // Insert order with date, time, order_pax, order_status, user_id, table_id
    $sql = "INSERT INTO `user_order` (order_date, order_time, order_pax, order_status, user_id, table_id) VALUES (CURDATE(), CURTIME(), '$order_pax', '$order_status', '$user_id', '$table_id')";

    $result = $conn->query($sql);

    if ($result) {
        echo json_encode(['order_id' => $conn->insert_id]);
    } else {
        echo json_encode(['error' => "Error: " . $sql . "<br>" . $conn->error]);
    }

    $conn->close();
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
    exit();
}
?>