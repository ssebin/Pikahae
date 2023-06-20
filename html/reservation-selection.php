<?php 
session_start();
include 'auth.php';
$user_id = $_SESSION['user_id'];


// Step 1: Establish database connection (replace with your credentials)
$host = "localhost"; // Database host
$username = "root"; // Database username
$password = ""; // Database password
$database = "pikahae_db"; // Database name

$connection = new mysqli('localhost', 'root', '', 'pikahae_db');

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Retrieve the latest order ID from the user_order table
$query = "SELECT order_id FROM user_order ORDER BY order_id DESC LIMIT 1";
$result = mysqli_query($connection, $query);
if (!$result) {
    die('Query failed: ' . mysqli_error($connection));
}

// Fetch the data
$row = mysqli_fetch_assoc($result);
$order_id = $row['order_id'];

mysqli_free_result($result);

// Fetch the order details based on the latest order ID
$query = "SELECT order_date, order_time, order_pax, table_id FROM user_order WHERE order_id = '$order_id'";
$result = mysqli_query($connection, $query);
if (!$result) {
    die('Query failed: ' . mysqli_error($connection));
}

$row = mysqli_fetch_assoc($result);
$orderDate = $row['order_date'];
$orderTime = $row['order_time'];
$orderPax = $row['order_pax'];
$tableId = $row['table_id'];

mysqli_free_result($result);

// Retrieve the order items for the given order ID
$query = "SELECT oi.order_qty, m.menu_name
          FROM order_item oi
          INNER JOIN menu m ON oi.menu_id = m.menu_id
          WHERE oi.order_id = '$order_id'";
$result = mysqli_query($connection, $query);
if (!$result) {
    die('Query failed: ' . mysqli_error($conn));
}


mysqli_free_result($result);

// Close the database connection
mysqli_close($connection);


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

    <!--  Google fonts Roboto -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@100;200;400;500;600;700;800;900&family=Roboto:ital,wght@0,100;0,300;0,400;0,700;1,300;1,400;1,500&display=swap"
        rel="stylesheet">

    <!--Review swiper-->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!--Footer Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <!-- header -->
    <section>
        <!-- <nav class="header">
            <a href="homepage-customer.html" class="logo"><img src="../images/logo_draft.png" alt="logo"></a>

            <ul class="navlist">
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
        </nav> -->

        <nav class="header">
            <a href="homepage-customer.php" class="logo"><img src="../images/logo_draft.png" alt="logo"></a>
            <ul class="navlist">
                <li><a href="homepage-customer.php">Home</a></li>
                <li><a href="about_us.php">About</a></li>
                <li><a href="reservation.php">Reservations</a></li>
                <li><a href="menu3.php">Menu</a></li>
                <li><a href="contact_us.php">Contact Us</a></li>
            </ul>

            <div class="icon">
                <a href="view-profile.php"><i class='bx bxs-user'></i></a>
            </div>
        </nav>

        <!--Different banner for each page-->
        <div class="reservation_banner">
            <img src="../images/reservation/reservation_banner.png" alt="reservation banner pic">
        </div>
    </section>

    <!--    TODO: fix for mobile-->
    <!-- sub header section -->
    <div class="sub-header-wrapper">
        <p>RESERVATIONS</p>
    </div>
    <hr>

    <!--Reservation Selection Section-->
    <section class="reservation-selection">
        <!-- white box -->
        <figure class="selection-details">
            <div>
                <div class="edit-wrapper">
                    <h3>Table Selection Details:</h3>
                    <div class="profile-description-wrapper">
                        <figcaption class = "res-sel-fig">
                            <h3><i>
                              Chunsik Meow
                            </i></h3>
                            <br>

                            <titletext>Date:<br></titletext>
                            <div class="res-title" id="date">
                              <?php echo $orderDate; ?>
                            </div>
                            <br>

                            <titletext>Time:<br></titletext>
                            <div class="res-title" id="res-time">
                              <?php echo $orderTime; ?>                            
                            </div>
                            <br>

                            <titletext>Number of Guests:<br></titletext>
                            <div class="res-title" id="pax">
                              <?php echo $orderPax; ?>  
                            </div>
                            <br>
                            
                            <titletext>Table Selected:<br></titletext>
                            <div class="res-title" id="table-selected">
                              <?php echo $tableId; ?>
                            </div>
                        </figcaption>                        
                    </div>                    
                    <div class="res-button-wrapper">
                        <!-- <a href="reservationForm1.html"><button class="res-back-btn">Back</button></a> -->
                        <a href="./menu3.php"><button class="proceed-btn">Proceed to pre-order menu</button></a>                 
                    </div>
                </div>
                
            </div>
        </figure>        
    </section>    

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