<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Manage Menu</title>
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

        <div class="sub-header-wrapper">
            <p>MANAGE MENU</p>
            <!-- <div class="add-menu-button">
                <a href="./edit_menu.html">
                    <button id="menu-add-btn" type="button">
                        <img src="../images/manage/add.png" alt="Add">
                    </button>
                </a>
            </div> -->
            <div class="input-box">
                <i class="uil uil-search"></i>
                <input type="text" id="menu-search-input" placeholder="Search menu" />
                <button class="button" id="menu-search-button"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </div>

        <hr>
    </section>

    <?php
    $hostname = 'localhost';
    $username = 'root';
    $database = 'pikahase_db';

    $conn = new mysqli($hostname, $username, '', $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT menu_id, menu_name, menu_price, menu_cat, menu_stock, menu_desc FROM menu";
    $result = $conn->query($sql);

    $menus = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $menus[] = $row;
        }
    }
    ?>

    <div class="admin-view-body">
        <div class="admin-view-container">
            <div class="admin-view-table">
            <table>
    <thead>
        <tr>
            <th id="menu-table-id">ID</th>
            <th id="menu-table-name">Name</th>
            <th id="menu-table-cat">Category</th>
            <th id="menu-table-price">Price</th>
            <th>Stock</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (!empty($menus)) {
            foreach ($menus as $menu) {
                $menu_id = $menu["menu_id"];
                $menu_name = $menu["menu_name"];
                $menu_price = $menu["menu_price"];
                $menu_cat = $menu["menu_cat"];
                $menu_stock = $menu["menu_stock"];
                $menu_desc = $menu["menu_desc"];
                $menu_img_base64 = base64_encode($menu_img);
                $menu_img_base64_urlencoded = urlencode($menu_img_base64);

                echo "<tr>";
                echo "<td>$menu_id</td>";
                echo "<td>$menu_name</td>";
                echo "<td>$menu_cat</td>";
                echo "<td>$menu_price</td>";
                echo "<td>$menu_stock</td>";
                echo "<td>$menu_desc</td>";
                echo "<td>";
                echo "<a href='./edit_menu.php?menu_id=$menu_id&menu_name=$menu_name&menu_price=$menu_price&menu_cat=$menu_cat&menu_stock=$menu_stock&menu_desc=$menu_desc&menu_img=$menu_img_base64_urlencoded'><button type='button'><img src='../images/manage/edit.png' alt='Edit'></button></a>";
                echo "<button type='button'><img src='../images/manage/delete.png' alt='Delete'></button>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No menu items found</td></tr>";
        }
        ?>
    </tbody>
</table>
            </div>
        </div>
        <div class="overlay"></div>
            <div class="cancel-popup-card">
                <div class="cancel-popup-text">
                    <div class="cancel-popup-header">
                        <h1>Confirm Delete Menu</h1>
                    </div>
                    <p>This process cannot be undone</p>
                </div>
                <button id="cancel-back-button" type="button">Back</button><span>
                    <a href="./manage_menu.html"><button id="cancel-confirm-button" type="button">Confirm</button></a>
                </span>
            </div>
    </div>
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

    <script src="../script/manageMenu.js"></script>
</body>

</html>