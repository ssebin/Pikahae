<?php
    if (isset($_POST['save-btn'])) {
        $user_id = $_GET['user_id'];
        $email = $_POST['user_email'];
        $birthday = $_POST['birthday'];
        $favorite_pokemon = $_POST['favorite_pokemon'];
        $connection = new mysqli('localhost', 'root', '', 'pikahae_db');

        // Check the connection
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        } else {
        }

        if (!empty($_FILES['file-upload']['tmp_name'])) {
            $imageData = addslashes(file_get_contents($_FILES['file-upload']['tmp_name']));
            $query1 = "UPDATE user SET user_email = ?, user_pokemon = ?, user_bday = ?, user_img = '$imageData' WHERE user_id = $user_id";
        }
        else{
            $query1 = "UPDATE user SET user_email = ?, user_pokemon = ?, user_bday = ? WHERE user_id = $user_id";
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
        $user_id = $_GET['user_id'];
        $connection = new mysqli('localhost', 'root', '', 'pikahae_db');
        // Check the connection
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        } else {
        }
        // Delete acc
        $queryCheck = "SET FOREIGN_KEY_CHECKS=0";
        $stmt = $connection->prepare($queryCheck);
        $stmt->execute();

        $query = "DELETE FROM user_order WHERE user_id = ?";
        $stmt1 = $connection->prepare($query);
        $stmt1->bind_param("i", $user_id);
        $stmt1->execute();

        $query2 = "DELETE FROM user WHERE user_id = ?";
        $stmt2 = $connection->prepare($query2);
        $stmt2->bind_param("i", $user_id);
        $stmt2->execute();
        header("Location: logout.php");
    }

?>