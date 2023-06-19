<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Menu</title>
    <link rel="stylesheet" href="../stylesheet/pikahae.css">

    <!-- For icons -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!--  Google fonts Roboto -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@100;200;400;500;600;700;800;900&family=Roboto:ital,wght@0,100;0,300;0,400;0,700;1,300;1,400;1,500&display=swap" rel="stylesheet">

    <!--Footer Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="admin-view">
<!-- header -->
<section>
    <nav class="header">
        <a href="#" class="logo"><img src="../images/logo_draft.png" alt="logo"></a>
        <ul class="navlist">
            <li><a href="./homepage-admin.html">Home</a></li>
            <li><a href="./about_us.html">About</a></li>
            <li><a href="./edit-profile.html">Accounts</a></li>
            <li><a href="./reservationDashboardAdmin.html">Reservations</a></li>
            <li><a href="./edit_menu.html">Menu</a></li>
        </ul>

        <div class="icon">
            <!-- <a href="#"><i class='bx bxs-cart'></i></a>
            <a href="#"><i class='bx bxs-user'></i></a> -->
        </div>
    </nav>
    <div class="banner">
        <img src="../images/homepage/homepage_admin_main.jpg" alt="picture of pikachu with dessert">
    </div>

    <div class="sub-header-wrapper">
        <p>ADD MENU</p>
    </div>
    <hr>
    <div class="edit-item-container">
        <div class="edit-item-card">
            <h1 class="edit-item-header">Add Item Details</h1>

            <?php
            // Check if the form is submitted
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Retrieve the form data
                $itemName = $_POST['item-name'];
                $itemCategory = $_POST['item-category'];
                $itemPrice = $_POST['item-price'];
                $itemDesc = $_POST['item-desc'];

                // Process the image upload
                $targetFile = $_FILES['item-photo']['tmp_name'];

                // Database connection and query to insert the new menu item
                $dbHost = 'localhost';
                $dbUsername = 'root';
                $dbPassword = '';
                $dbName = 'pikahae_db';

                $conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                // Get the maximum menu_id from the current menu table
                $query = "SELECT MAX(menu_id) AS max_id FROM menu";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_assoc($result);
                $menuId = $row['max_id'] + 1;

                // Read the uploaded image file
                $imageData = file_get_contents($targetFile);
                $imageData = mysqli_real_escape_string($conn, $imageData);

                // Insert the new menu item into the menu table
                $insertQuery = "INSERT INTO menu (menu_id, menu_name, menu_cat, menu_price, menu_desc, menu_stock, menu_img) VALUES ('$menuId', '$itemName', '$itemCategory', '$itemPrice', '$itemDesc', '25', '$imageData')";
                $result = mysqli_query($conn, $insertQuery);
                if (!$result) {
                    die("Error: " . mysqli_error($conn));
                }

                // Close the database connection
                mysqli_close($conn);

                // Redirect back to manage_menu.php
                header("Location: manage_menu.php");
                exit;
            }
            ?>



            <form class="edit-item-form" method="POST" enctype="multipart/form-data">

                <div class="edit-item-form-item">
                    <label for="item-category">Category:</label><br>
                    <select id="item-category" name="item-category">
                        <option value="food">Food</option>
                        <option value="dessert">Dessert</option>
                        <option value="drink">Drink</option>
                    </select><br>
                </div>

                <div class="edit-item-form-item">
                    <label for="item-name">Item name:</label><br>
                    <input id="item-name" type="text" name="item-name" placeholder="Enter item name" required><br>
                </div>

                <div class="edit-item-form-item">
                    <label for="item-price">Item price:</label><br>
                    <input type="text" id="item-price" name="item-price" pattern="[0-9]+(\.[0-9]{2})?" placeholder="RM 0.00" required><br>
                </div>

                <div class="edit-item-form-item">
                    <label for="item-desc">Item description:</label><br>
                    <textarea id="item-desc" name="item-desc" rows="4" cols="100" placeholder="Enter item description" required></textarea>
                </div>

                <div class="edit-item-form-item">
                    <label for="item-photo">Item photo:</label><br>
                    <img id="preview" src="../images/edit_menu/image-preview.png" alt="Image Preview"><br>
                    <input type="file" id="item-photo" name="item-photo" accept="image/*" required><br>
                </div>

                <div class="edit-item-form-btn">
                    <button id="cancel-edit-btn" type="button">Cancel</button>
                    <span><button id="submit-edit-btn" type="submit">Save</button></span>
                </div>
            </form>
        </div>
    </div>
</section>
<footer>

    <div class="footer-content">
        <h3>Pikahae</h3>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.<br>Illo iste corrupti doloribus odio sed!
        </p>
        <ul class="socials">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
        </ul>
        <img src="../images/babies_trans.png">
    </div>
    <hr class="footer-line">
    <div class="footer-bottom">
        <p>copyright &copy;2023 Pikahae. designed by <span>dino kuning</span></p>
    </div>
</footer>
<script src="../script/editMenu.js"></script>
</body>
</html>
