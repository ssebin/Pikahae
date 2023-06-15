<?php
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

$sql = "SELECT menu_id, menu_name, menu_price, menu_cat, menu_stock, menu_img, menu_desc FROM menu";
$result = $conn->query($sql);

$menu_items = [];

if ($result) {
    while($row = $result->fetch_assoc()) {
        // Check if the image data is not null
        if ($row["menu_img"] !== null) {
            // Convert the binary data to base64
            $row["menu_img"] = "data:image/jpeg;base64," . base64_encode($row["menu_img"]);
        }
        $menu_items[] = $row;
    }
}

$json = json_encode($menu_items, JSON_UNESCAPED_UNICODE);

if ($json) {
    echo $json;
} else {
    echo json_encode(['error' => "json_encode error: " . json_last_error_msg()]);
}

$conn->close();
?>