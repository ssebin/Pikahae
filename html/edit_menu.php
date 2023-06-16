<?php
$hostname = 'localhost';
$username = 'root';
$database = 'pikahae_db';

$conn = new mysqli($hostname, $username, '', $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['save-confirm'])) {
        $menu_id = $_POST['menu_id'];
        $category = $_POST['item-category'];
        $name = $_POST['item-name'];
        $price = $_POST['item-price'];
        $description = $_POST['item-desc'];

        // Update text fields
        $sql = "UPDATE menu SET menu_cat = '$category', menu_name = '$name', menu_price = '$price', menu_desc = '$description' WHERE menu_id = $menu_id";
        if ($conn->query($sql) !== TRUE) {
            echo "Error updating menu: " . $conn->error;
            exit();
        }

        // Update image
        if (!empty($_FILES['item-photo']['tmp_name'])) {
            $image = addslashes(file_get_contents($_FILES['item-photo']['tmp_name']));
            $sql = "UPDATE menu SET menu_img = '$image' WHERE menu_id = $menu_id";
            if ($conn->query($sql) !== TRUE) {
                echo "Error updating menu image: " . $conn->error;
                exit();
            }
        }

        header("Location: manage_menu.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Menu</title>
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

    <style>
        .menu-image {
            border-radius: 10px;
            max-width: 200px;
            max-height: 200px;
        }
    </style>

</head>

<body class="admin-view">
<!-- header -->
<section>
    <nav class="header">
        <a href="#" class="logo"><img src="../images/logo_draft.png" alt="logo"></a>
        <ul class="navlist">
            <li><a href="homepage-admin.html">Home</a></li>
            <li><a href="cusomter_accounts.html">Accounts</a></li>
            <li><a href="reservationDashboardAdmin.html">Reservations</a></li>
            <li><a href="manage_menu.html">Menu</a></li>
        </ul>

        <div class="icon">
            <!-- <a href="#"><i class='bx bxs-cart'></i></a>
            <a href="#"><i class='bx bxs-user'></i></a> -->
        </div>
    </nav>
    <div class="banner">
        <img src="../images/homepage/homepage_admin_main.jpg" alt="picture of pikachu with dessert">
    </div>

        <?php
        $hostname = 'localhost';
        $username = 'root';
        $database = 'pikahase_db';

        $conn = new mysqli($hostname, $username, '', $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        ?>

        <div class="sub-header-wrapper">
            <p>EDIT MENU</p>
        </div>
        <hr>
        <div class="edit-item-container">
            <div class="edit-item-card">
                <h1 class="edit-item-header">Edit Item Details</h1>

            <form class="edit-item-form" method="POST" action="" enctype="multipart/form-data">
                <div class="edit-item-form-item">
                    <label for="item-category">Category:</label><br>
                    <select id="item-category" name="item-category">
                        <?php
                        $menu_cat = $_GET['menu_cat'];
                        $categories = ['food', 'dessert', 'drink'];
                        foreach ($categories as $category) {
                            $selected = ($category == $menu_cat) ? 'selected' : '';
                            echo "<option value='$category' $selected>$category</option>";
                        }
                        ?>
                    </select><br>
                </div>

                <div class="edit-item-form-item">
                    <label for="item-name">Item name:</label><br>
                    <input id="item-name" type="text" placeholder="Enter item name" name="item-name" value="<?php echo $_GET['menu_name']; ?>"><br>
                </div>

                <div class="edit-item-form-item">
                    <label for="item-price">Item price:</label><br>
                    <input type="text" id="item-price" name="item-price" pattern="[0-9]+(\.[0-9]{2})?" placeholder="RM 0.00" required oninput="formatCurrency(this)" value="<?php echo $_GET['menu_price']; ?>"><br>
                </div>

                <div class="edit-item-form-item">
                    <label for="item-desc">Item description:</label><br>
                    <textarea id="item-desc" rows="4" cols="100" placeholder="Enter item description" name="item-desc"><?php echo $_GET['menu_desc']; ?></textarea>
                </div>

                <div class="edit-item-form-item">
                    <label for="item-photo">Item photo:</label><br>
                    <?php
                    $menu_id = $_GET['menu_id'];

                    $sql = "SELECT menu_img FROM menu WHERE menu_id = $menu_id";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $menu_img = $row['menu_img'];

                        // Display the image
                        if ($menu_img) {
                            echo "<img class='menu-image' src='data:image/jpeg;base64," . base64_encode($menu_img) . "' alt='Image Preview'><br>";
                        } else {
                            echo "No image available";
                        }
                    } else {
                        echo "Menu item not found";
                    }
                    ?>
                    <input type="file" id="item-photo" name="item-photo" accept="image/*"><br>
                </div>

                <div class="edit-item-form-btn">
                    <button id="cancel-edit-btn" type="button">
                        <a href="manage_menu.php">Cancel</a>
                    </button>
                    <span>
                        <button id="submit-edit-btn" type="submit" name="save-confirm">Save</button>
                    </span>
                </div>

                <input type="hidden" name="menu_id" value="<?php echo $_GET['menu_id']; ?>">
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
