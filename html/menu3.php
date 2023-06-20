<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Pikahae</title>

    <link rel="stylesheet" href="../stylesheet/pikahae.css" />

    <!-- For icons -->
    <link
            rel="stylesheet"
            href="https://unpkg.com/boxicons@latest/css/boxicons.min.css"
    />
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />

    <!--  Google fonts Roboto -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
            href="https://fonts.googleapis.com/css2?family=Jost:wght@100;200;400;500;600;700;800;900&family=Roboto:ital,wght@0,100;0,300;0,400;0,700;1,300;1,400;1,500&display=swap"
            rel="stylesheet"
    />

    <script defer src="../script/menu3.js"></script>
</head>

<body>
<!-- header -->
<section>
    <nav class="header">
        <a href="#" class="logo"
        ><img src="../images/logo_draft.png" alt="logo"
            /></a>

        <ul class="navlist">
            <li><a href="homepage-customer.html">Home</a></li>
            <li><a href="about_us.html">About</a></li>
            <li><a href="reservation.html">Reservations</a></li>
            <li><a href="menu.html">Menu</a></li>
            <li><a href="contact_us.html">Contact Us</a></li>
        </ul>
        <!-- Cart -->
        <div class="menu-head-cart" id="menu-head-cart">
            <h3 class="head-cart__heading">
                Cart<span class="cart-close">&times;</span>
            </h3>
            <!--            <div class="head-cart__txt empty-cart">Your cart is empty.</div>-->

            <div class="head-cart__items"></div>

            <h3 class="head-cart__price-total">RM 0.00</h3>
            <button class="head-cart-checkout">Checkout</button>
        </div>

        <div class="icon">
            <div class="head-rgt">
                <button class="head-rgt__btn">
                    <i class="bx bxs-cart"></i>
                    <span class="cart-item-count">0</span>
                </button>
                <a href="view-profile.html"><i class="bx bxs-user"></i></a>
            </div>
        </div>
    </nav>

    <div class="banner">
        <img src="../images/menu/banner_2.png" alt="picture of pikachu with dessert" />
    </div>
</section>

<!-- sub header section -->
<div class="sub-header-wrapper">
    <p>MENU</p>
    <div class="input-box">
        <i class="uil uil-search"></i>
        <input type="text" placeholder="Search menu" />
        <button class="button"><i class="fa-solid fa-magnifying-glass"></i></button>
    </div>
</div>
<hr />

<!--    menu section -->

<!-- menu header -->
<section class="menu-header">
    <nav class="menu-nav">
        <ul class="menu-navlist">
            <li><a href="#">ALL</a></li>
            <li><a href="#food-category">FOOD</a></li>
            <li><a href="#desserts-category">DESSERT</a></li>
            <li><a href="#drinks-category">DRINKS</a></li>
        </ul>
    </nav>
</section>

<section class="menu" id="menu">
    <!-- FOOD -->
    <div id="food" class="d-food">
        <?php

        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);

        $dbHost = 'localhost';
        $dbUsername = 'root';
        $dbPassword = '';
        $dbName = 'pikahae_db';

        $conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $query = "SELECT menu_name, menu_price, menu_img, menu_cat, menu_desc FROM menu";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die('Query failed: ' . mysqli_error($conn));
        }

        while ($row = mysqli_fetch_assoc($result)) {
            $menuName = $row['menu_name'];
            $menuPrice = $row['menu_price'];
            $menuImg = $row['menu_img'];
            $menuCat = $row['menu_cat'];
            $menuDesc = $row['menu_desc'];

            $formattedPrice = 'RM ' . $menuPrice;

            echo '
          <div class="box">
              <a href="#" class="category-btn">' . $menuCat . '</a>
              <img src="data:image/jpeg;base64,' . base64_encode($menuImg) . '" data-img-src="data:image/jpeg;base64,' . base64_encode($menuImg) . '" />

              <div class="item-text">
                  <h3 class="item-name">' . $menuName . '</h3><span></span>
                  <span class="menu-price">' . $formattedPrice . '</span>
                  <br>

                  <!-- The Modal -->
                  <span class="menu-details-btn" onclick="openModal(this)">View details</span>

                  <div class="modal">
                      <!-- Modal content -->
                      <div class="modal-content">
                          <span class="close">&times;</span>
                          <div class="item-section">
                              <section class="img">
                                  <img src="data:image/jpeg;base64,' . base64_encode($menuImg) . '" alt="" class="img-main" />
                              </section>
                              <section class="item-detail">
                                  <h3 class="item-title">' . $menuName . '</h3>
                                  <p class="item-price">' . $formattedPrice . '</p>
                                  <p class="item-desc">' . $menuDesc . '</p>
                                  <p class="allergen-title">Allergen</p>
                                  <div class="allergen">
                                      <!-- Put allergen here -->
                                      <img src="../images/menu/allergen/meat.png" alt="meat" title="meat" />
                                      <img src="../images/menu/allergen/seafood.png" alt="seafood" title="seafood" />
                                      <img src="../images/menu/allergen/wheat.png" alt="wheat" title="wheat" />
                                      <img src="../images/menu/allergen/mushroom.png" alt="mushroom" title="mushroom" />
                                  </div>
                              </section>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="po-btn-container">
                  <div class="menu-quantity">
                      <button class="minus-btn price-btn__img">
                          <i class="fa-solid fa-minus"></i>
                      </button>
                      <span class="price-btn__txt">0</span>
                      <button class="plus-btn price-btn__img">
                          <i class="fa-solid fa-plus"></i>
                      </button>
                  </div>
                  <a href="#" class="po-btn">Add to cart</a>
              </div>
          </div>';
        }

        mysqli_free_result($result);
        mysqli_close($conn);
        ?>
    </div>

    <!-- FOOD END -->

    <div class="menu-bottom-img">
        <img id="menu-img" src="../images/menu/illust_menu.png" />
        <img id="pika-bottle-img" src="../images/menu/pika_bottle_trans.png" />
    </div>
</section>
<button onclick="topFunction()" id="topBtn" title="Go to top"><i class="fa-solid fa-angle-up"></i></button>
</body>

<!--Footer-->
<footer>
    <div class="footer-content">
        <h3>Pikahae</h3>
        <p>
            Lorem ipsum dolor sit, amet consectetur adipisicing elit.<br />
            Illo iste corrupti doloribus odio sed!
        </p>
        <ul class="socials">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
        </ul>
        <img src=../images/babies_trans.png />
    </div>
    <hr class="footer-line" />
    <div class="footer-bottom">
        <p>copyright &copy;2023 Pikahae. designed by <span>dino kuning</span></p>
    </div>
</footer>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
</html>
