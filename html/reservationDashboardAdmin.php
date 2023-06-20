<?php
include 'auth-admin.php';
$hostname = 'localhost';
$username = 'root';
$database = 'pikahae_db';

$conn = new mysqli($hostname, $username, '', $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pikahae</title>
    <link rel="stylesheet" href="../stylesheet/pikahae.css">

    <!-- For icons -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Googlefonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@100;200;400;500;600;700;800;900&family=Roboto:ital,wght@0,100;0,300;0,400;0,700;1,300;1,400;1,500&display=swap"
        rel="stylesheet">

    <!--Review swiper-->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <!--Footer Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body class="admin-view">
    <!-- header -->
    <section>
        <nav class="header">
            <a href="homepage-admin.php" class="logo"><img src="../images/logo_draft.png" alt="logo"></a>
            <ul class="navlist">
                <li><a href="homepage-admin.php">Home</a></li>
                <li><a href="customer_accounts.php">Accounts</a></li>
                <li><a href="reservationDashboardAdmin.php">Reservations</a></li>
                <li><a href="manage_menu.php">Menu</a></li>
            </ul>
            <div class="icon">
                <!-- <a href="#"><i class=null></i></a>
                <a href="#"><i class=null></i></a> -->
            </div>
        </nav>
        <div class="banner">
            <img src="../images/homepage/homepage_admin_main.jpg" alt="picture of pikachu with dessert">
        </div>

        <div class="sub-header-wrapper">
            <p style="margin: 0;">ADMIN DASHBOARD</p>
            <div class="tab-switch-reservation">
                <ul class="nav nav-pills justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page"
                            href="reservationDashboardAdmin.html">Reservation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="reservationTableDashboardAdmin.html" style="color: black;">Tables</a>
                    </li>
                </ul>
            </div>
        </div>
        <hr style="background-color: #FE6A86; border: 1px solid #FE6A86; opacity: 1; margin: 0; padding: 0;">
    </section>
    <?php
    $conn = new mysqli('localhost', 'root', '', 'pikahae_db');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    ?>

    <div class="admin-view-body">
        <div class="admin-view-container">
            <div class="admin-view-table">
                <table>
                    <div class="table-header">
                        <thead>
                            <tr>
                                <th>Table<br>Number</th>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Pax.</th>
                                <th>Preordered Menu</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                    </div>
                    <div class="table-body">
                    <tbody>
                        <?php

                        $sql = "SELECT * FROM user_order JOIN user ON user_order.user_id = user.user_id";
                        $result = mysqli_query($conn, $sql);

                        while ($row = mysqli_fetch_assoc($result)) {
                            $orderID = $row['order_id'];
                            $tableName = $row['table_id'];
                            $name = $row['user_fname'] . ' ' . $row['user_lname'];
                            $date = $row['order_date'];
                            $time = $row['order_time'];
                            $pax = $row['order_pax'];
                            $status = $row['order_status'];

                            $orderItemsQuery = "SELECT * FROM order_item JOIN menu ON order_item.menu_id = menu.menu_id WHERE order_id = $orderID";
                            $orderItemsResult = mysqli_query($conn, $orderItemsQuery);

                            $menuItems = '';
                            while ($orderItemRow = mysqli_fetch_assoc($orderItemsResult)) {
                                $menuItemName = $orderItemRow['menu_name'];
                                $menuItemQty = $orderItemRow['order_qty'];
                                $menuItems .= "$menuItemName x$menuItemQty<br>";
                            }
                            echo "<tr>
                                <td>$tableName</td>
                                <td>$name</td>
                                <td>$date</td>
                                <td>$time</td>
                                <td>$pax</td>
                                <td>$menuItems</td>
                                <td>$status</td>
                            </tr>";
                        }
                        mysqli_close($conn);
                        ?>
                    </tbody>
                    </div>
                </table>
            </div>
        </div>
    </div>

    <!--Footer-->
    <footer>
        <div class="footer-content">
            <h3>Pikahae</h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.<br>Illo iste corrupti doloribus odio sed!</p>
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</body>
</html>