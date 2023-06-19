<?php
    if (isset($_POST['save-btn'])) {
        $email = $_POST['email'];
        $birthday = $_POST['birthday'];
        $favorite_pokemon = $_POST['favorite_pokemon'];
        $connection = new mysqli('localhost:3307', 'root', '', 'pikahae_db');

        // Check the connection
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        } else {
        }

        if (!empty($_FILES['file-upload']['tmp_name'])) {
            $imageData = addslashes(file_get_contents($_FILES['file-upload']['tmp_name']));
            $query1 = "UPDATE user SET user_email = ?, user_pokemon = ?, user_bday = ?, user_img = '$imageData' WHERE user_id = 1";
        }
        else{
            $query1 = "UPDATE user SET user_email = ?, user_pokemon = ?, user_bday = ? WHERE user_id = 1";
        }

        // Perform the database update operation to store the values
        $stmt = $connection->prepare($query1);
        $stmt->bind_param("sss", $email, $favorite_pokemon, $birthday);
        $stmt->execute();

        header("Location: view-profile.php");
        exit;
    }  

    elseif(isset($_POST['cancel-edit'])) {
        header("Location: view-profile.php");
    }

    elseif(isset($_POST['delete-account'])){
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
        header("Location: login.html");
    }

?>