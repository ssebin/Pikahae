<?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $email = $_POST['email'];
        $birthday = $_POST['birthday'];
        $favorite_pokemon = $_POST['favorite_pokemon'];
        $img_Url = $_POST['img_Url'];
        $connection = new mysqli('localhost:3307', 'root', '', 'pikahae_db');
        // Check the connection
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        } else {
        }
        // Perform the database update operation to store the values
        $query1 = "UPDATE user SET user_email = ?, user_pokemon = ?, user_bday = ?, user_img = ? WHERE user_id = 1";
        $stmt = $connection->prepare($query1);
        $stmt->bind_param("sss", $email, $favorite_pokemon, $birthday);
        $stmt->execute();

        // Send a response back to the client if needed
        echo "Data saved successfully.";
    }
?>
