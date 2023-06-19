<?php
    $conn = new mysqli('localhost', 'root', '', 'pikahae_db');

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
            <a href="#" class="logo"><img src="../images/logo_draft.png" alt="logo"></a>
            <!--        <p class="cafe-name">Pikahae</p>-->

            <ul class="navlist" style="margin: 0; padding: 0;">
                <li><a href="homepage-customer.html">Home</a></li>
                <li><a href="about_us.html">About</a></li>
                <li><a href="reservation.html">Reservations</a></li>
                <li><a href="menu.html">Menu</a></li>
                <li><a href="contact_us.html">Contact Us</a></li>
            </ul>

            <div class="icon">
                <a href="cart.html"><i class='bx bxs-cart'></i></a>
                <a href="view-profile.html"><i class='bx bxs-user'></i></a>
            </div>
        </nav>
        <div class="banner">
            <img src="../images/reservation/reservation_banner.png" alt="picture of pikachu with dessert">
        </div>

        <div class="sub-header-wrapper">
            <p style="margin: 0;">MY RESERVATIONS</p>
        </div>

        <hr style="background-color: #FE6A86; border: 1px solid #FE6A86; opacity: 1; margin: 0; padding: 0;">
    </section>


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
                            $userID = 3;

                            $userOrdersQuery = "SELECT * FROM user_order WHERE user_id = $userID";
                            $userOrdersResult = mysqli_query($conn, $userOrdersQuery);
                        
                            while ($orderRow = mysqli_fetch_assoc($userOrdersResult)) {
                                $tableID = $orderRow['table_id'];
                                $orderID = $orderRow['order_id'];
                                $date = $orderRow['order_date'];
                                $time = $orderRow['order_time'];
                                $pax = $orderRow['order_pax'];
                                $status = $orderRow['order_status'];
                        
                                $userNameQuery = "SELECT user_fname, user_lname FROM user WHERE user_id = $userID";
                                $userNameResult = mysqli_query($conn, $userNameQuery);
                                $userNameRow = mysqli_fetch_assoc($userNameResult);
                                $name = $userNameRow['user_fname'] . ' ' . $userNameRow['user_lname'];
                        
                                $orderItemsQuery = "SELECT * FROM order_item JOIN menu ON order_item.menu_id = menu.menu_id WHERE order_id = $orderID";
                                $orderItemsResult = mysqli_query($conn, $orderItemsQuery);
                        
                                echo "<tr>";
                                echo "<td>" . $tableID . "</td>";
                                echo "<td>" . $name . "</td>";
                                echo "<td>" . $date . "</td>";
                                echo "<td>" . $time . "</td>";
                                echo "<td>" . $pax . "</td>";
                                echo "<td>";
                                while ($orderItemRow = mysqli_fetch_assoc($orderItemsResult)) {
                                    $menuItemName = $orderItemRow['menu_name'];
                                    $menuItemQty = $orderItemRow['order_qty'];
                                    echo $menuItemName . " x" . $menuItemQty . "<br>";
                                }
                                echo "</td>";
                                echo "<td>" . $status . "</td>";
                                echo "</tr>";
                            }
                        
                            $conn->close();
                        
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