<?php
include 'auth.php';
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
  <link href="https://fonts.googleapis.com/css2?family=Jost:wght@100;200;400;500;600;700;800;900&family=Roboto:ital,wght@0,100;0,300;0,400;0,700;1,300;1,400;1,500&display=swap" rel="stylesheet">

  <!--Review swiper-->
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

  <!--Footer Bootstrap-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


</head>




<body class="reservation-body">
  <!-- header -->
  <section>
    <nav class="header">
      <a href="homepage-customer.php" class="logo"><img src="../images/logo_draft.png" alt="logo"></a>
      <ul class="navlist">
        <li><a href="./homepage-customer.php">Home</a></li>
        <li><a href="./about_us.php">About</a></li>
        <li><a href="./reservation.php">Reservations</a></li>
        <li><a href="./menu3.php">Menu</a></li>
        <li><a href="./contact_us.php">Contact Us</a></li>
      </ul>

      <div class="icon">
        <a href="./view-profile.php"><i class='bx bxs-user'></i></a>
      </div>
    </nav>

    <div class="reservation_banner">
      <img src="../images/reservation/reservation_banner.png" alt="picture of pikachu with dessert">
      <!-- <div class="banner-text res-banner-text">
          <h1 class="res-banner-text">Reservations</h1>
        </div> -->
    </div>
  </section>

  <!-- sub header section -->
  <div class="sub-header-wrapper">
    <p>RESERVATIONS</p>
  </div>

  <hr>
  <section class="reservation-container">
    <div class="reservationDets">
      <h2 class="reservationHead">Your Reservations</h2>
      <div class="text-center">
        <!-- <button type="button" class="btn btn-primary btn-lg reservation-Button">
          <a href="#">Reservations</a>
        </button> -->
        <a href="reservationForm1.html" class="btn-yellow">Make a Reservation</a>
        <a href="manage-reservations-customer.html" class="btn-yellow">History</a>
        <br> <br>
      </div>


    </div>

    <div class="reservation-description">
      <p class="res-dec">
        We kindly request that each diner select one style of degustation menu, that allows us to provide an engaging experience for the whole table. <br><br>
        To ensure each diner enjoys an immersive dining experience, with sufficient time to consume each course, please be advised that each menu will take approximately 3 hours to complete. <br><br>
        We cater to children above the age of 12, given the requirement that they order one (1) main dish (request to be made upon reservation).<br><br>
        Prices listed are not inclusive of prevailing taxes. <br><br>
        Our dress code is smart casual though we recommend dressing up for the occasion.<br>
        <br>Gentlemen, we ask that you come dressed in trousers and appropriate footwear.
      </p>
    </div>
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

</body>

</html>