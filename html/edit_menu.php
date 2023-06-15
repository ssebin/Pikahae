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
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@100;200;400;500;600;700;800;900&family=Roboto:ital,wght@0,100;0,300;0,400;0,700;1,300;1,400;1,500&display=swap"
        rel="stylesheet">

    <!--Footer Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
        $database = 'pikahae_db';

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

                <form class="edit-item-form">

                <form class="edit-item-form">
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
                        <input id="item-name" type="text" placeholder="Enter item name" value="<?php echo $_GET['menu_name']; ?>"><br>
                    </div>

                    <div class="edit-item-form-item">
                        <label for="item-price">Item price:</label><br>
                        <input type="text" id="item-price" name="item-price" pattern="[0-9]+(\.[0-9]{2})?" placeholder="RM 0.00" required oninput="formatCurrency(this)" value="<?php echo $_GET['menu_price']; ?>"><br>
                    </div>

                    <div class="edit-item-form-item">
                        <label for="item-desc">Item description:</label><br>
                        <textarea id="item-desc" rows="4" cols="100" placeholder="Enter item description"><?php echo $_GET['menu_desc']; ?></textarea>
                    </div>

                    <div class="edit-item-form-item">
                        <label for="item-photo">Item photo:</label><br>
                        <?php
                            $menu_img_base64_urlencoded = $_GET['menu_img'];
                            $menu_img_base64 = urldecode($menu_img_base64_urlencoded);
                            $menu_img_data_uri = 'data:image/jpeg;base64,' . $menu_img_base64;
                            echo "<img id='preview' src='$menu_img_data_uri' alt='Image Preview'><br>";                            
                        ?>
                        <input type="file" id="item-photo" name="item-photo" accept="image/*"><br>
                    </div>

                    <div class="edit-item-form-btn">
                        <button id="cancel-edit-btn" type="button">Cancel</button></a>
                        <span><button id="submit-edit-btn" type="button">Save</button></span>
                    </div>
                </form>
            </div>
        </div>
        <div class="overlay"></div>
            <div class="cancel-popup-card">
                <div class="cancel-popup-text">
                    <div class="cancel-popup-header">
                        <h1>Confirm Cancel Changes</h1>
                    </div>
                    <p>Changes made will not be saved</p>
                </div>
                <button id="cancel-back-button" type="button">Back</button><span>
                    <a href="./manage_menu.html"><button id="cancel-confirm-button" type="button">Confirm</button></a>
                </span>
            </div>
            <div class="save-popup-card">
                <div class="save-popup-text">
                    <div class="save-popup-header">
                        <h1>Confirm Save Changes</h1>
                    </div>
                    <p>Changes made will be saved</p>
                </div>
                <button id="save-back-button" type="button">Back</button><span>
                    <a href="./manage_menu.html"><button id="save-confirm-button" type="button">Confirm</button></a>
                </span>
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
            <img src=../images/babies_trans.png>
        </div>
        <hr class="footer-line">
        <div class="footer-bottom">
            <p>copyright &copy;2023 Pikahae. designed by <span>dino kuning</span></p>
        </div>
    </footer>
    <script src="../script/editMenu.js"></script>

</body>

</html>