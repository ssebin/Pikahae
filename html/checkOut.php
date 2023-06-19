<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'pikahae_db';

$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve the latest order ID from order_item table
$orderQuery = "SELECT MAX(order_id) AS latest_order_id FROM order_item";
$orderResult = mysqli_query($conn, $orderQuery);
$row = mysqli_fetch_assoc($orderResult);
$latestOrderId = $row['latest_order_id'];
mysqli_free_result($orderResult);

// Increment the latest order ID by 1
if ($latestOrderId === null) {
    // No existing orders, set order_id to 1
    $order_id = 1;
} else {
    $order_id = $latestOrderId + 1;
}

$data = json_decode(file_get_contents("php://input"), true);

foreach ($data as $item) {
    $menu_name = mysqli_real_escape_string($conn, $item['menuName']);
    $menu_price = $item['menuPrice'];
    $menu_qty = $item['quantity'];

    // Assuming you have a menu table and every menu has a unique ID
    $menu_query = "SELECT menu_id FROM menu WHERE menu_name='$menu_name'";
    $menu_result = mysqli_query($conn, $menu_query);
    $row = mysqli_fetch_assoc($menu_result);
    $menu_id = $row['menu_id'];
    mysqli_free_result($menu_result);

    $query = "INSERT INTO order_item (order_id, menu_id, order_qty) VALUES ('$order_id', '$menu_id', '$menu_qty')";
    if (mysqli_query($conn, $query)) {
        echo "New order created successfully. Order ID: $order_id\n";
    } else {
        echo "Error: " . $query . "\n" . mysqli_error($conn);
    }
}

// Update the item_order table with the new order ID
$itemOrderQuery = "INSERT INTO item_order (order_id) VALUES ('$order_id')";
if (mysqli_query($conn, $itemOrderQuery)) {
    echo "item_order updated successfully.\n";
} else {
    echo "Error: " . $itemOrderQuery . "\n" . mysqli_error($conn);
}

mysqli_close($conn);

//// Redirect to reservation_confirmation.php with the order ID
//if (count($data) > 0) {
//    header("Location: reservation_confirmation.php?order_id=$order_id");
//    exit();
//}
?>
