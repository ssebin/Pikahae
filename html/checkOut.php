<?php

$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'pikahae_db';

try {
    $conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

    if (!$conn) {
        throw new Exception("Connection failed: " . mysqli_connect_error());
    }

    // Retrieve the latest order ID from user_order table
    $orderQuery = "SELECT MAX(order_id) AS latest_order_id FROM user_order";
    $orderResult = mysqli_query($conn, $orderQuery);
    if (!$orderResult) {
        throw new Exception("Query failed: " . mysqli_error($conn));
    }
    $row = mysqli_fetch_assoc($orderResult);
    $latestOrderId = $row['latest_order_id'];
    mysqli_free_result($orderResult);

    $order_id = $latestOrderId; // Assign the latest order ID to $order_id

    $data = json_decode(file_get_contents("php://input"), true);

    foreach ($data as $item) {
        $menu_name = mysqli_real_escape_string($conn, $item['menuName']);
        $menu_price = $item['menuPrice'];
        $menu_qty = $item['quantity'];

        // Assuming you have a menu table and every menu has a unique ID
        $menu_query = "SELECT menu_id FROM menu WHERE menu_name='$menu_name'";
        $menu_result = mysqli_query($conn, $menu_query);
        if (!$menu_result) {
            throw new Exception("Query failed: " . mysqli_error($conn));
        }
        $row = mysqli_fetch_assoc($menu_result);
        $menu_id = $row['menu_id'];
        mysqli_free_result($menu_result);

        $query = "INSERT INTO order_item (order_id, menu_id, order_qty) VALUES ('$order_id', '$menu_id', '$menu_qty')";
        if (mysqli_query($conn, $query)) {
            echo "New order item created successfully.\n";
        } else {
            throw new Exception("Error: " . $query . "\n" . mysqli_error($conn));
        }
    }

    // Update the user_order table with the new order ID and order_date
    $user_order_query = "INSERT INTO user_order (order_id, order_date) VALUES ('$order_id', NOW())";
    if (mysqli_query($conn, $user_order_query)) {
        echo "user_order updated successfully.\n";
    } else {
        throw new Exception("Error: " . mysqli_error($conn));
    }

    mysqli_close($conn);
} catch (Exception $e) {
    echo "Exception caught: " . $e->getMessage();
}
?>
