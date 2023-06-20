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

    <!-- for icons  -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">

    <!-- For icons -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!--  Google fonts Roboto -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@100;200;400;500;600;700;800;900&family=Roboto:ital,wght@0,100;0,300;0,400;0,700;1,300;1,400;1,500&display=swap" rel="stylesheet">

    <!--Footer Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../stylesheet/pikahae.css">
</head>

<body>
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

        <!-- Different banner for homepage
        <div class="homepage_banner">
            <img src="../images/homepage/homepage_customer_main.jpg" alt="homepage customer main pic">
        </div> -->

        <!--image slider start-->
        <div class="slider">
            <div class="slides">
                <!--radio buttons start-->
                <input type="radio" name="radio-btn" id="radio1">
                <input type="radio" name="radio-btn" id="radio2">
                <input type="radio" name="radio-btn" id="radio3">
                <input type="radio" name="radio-btn" id="radio4">
                <!--radio buttons end-->
                <!--slide images start-->
                <div class="slide first">
                    <img src="../images/homepage/homepage_customer_main.jpg" alt="first slider pic">
                </div>
                <div class="slide second">
                    <img src="../images/homepage/slido-2.jpg" alt="second slider pic">
                </div>
                <div class="slide third">
                    <img src="../images/homepage/slide-3.jpg" alt="third slider pic">
                </div>
                <div class="slide fourth">
                    <img src="../images/homepage/slider-4.png" alt="fourth slider pic">
                </div>
                <!-- automatic navigation start-->
                <div class="navigation-auto">
                    <div class="auto-btn1"></div>
                    <div class="auto-btn2"></div>
                    <div class="auto-btn3"></div>
                    <div class="auto-btn4"></div>
                </div>
                <!--automatic navigation end -->
            </div>
            <!--manual navigation start-->
            <div class="navigation-manual">
                <label for="radio1" class="manual-btn"></label>
                <label for="radio2" class="manual-btn"></label>
                <label for="radio3" class="manual-btn"></label>
                <label for="radio4" class="manual-btn"></label>
            </div>
            <!--manual navigation end-->
        </div>
        <!--image slider end-->
    </section>

    <!--Homepage Section-->
    <section class="home">
        <!--About Us-->
        <div class="HP-about-us">
            <h1 class="HP-heading"><span class="cool-fontz">Welcome to </span>Pikahae <span class="cool-fontz">!</span>
            </h1>
            <p class="HP-desc">A Pokémon Cafe to meet and hang out with your pika-friends.<br>
                Try our exclusive Pokémon themed menu at the heart of KL.<br>
                Make a reservation to spend meaningful time with your loved ones!<br></p>
            <a href="about_us.php" class="btn-yellow">About Us</a>
        </div>
        <!--Menu-->
        <div class="HP-menu">
            <h2 class="HP-menu-heading">Menu</h2>

            <!--Copied from homung's menu-->
            <!--<section class="homepage-menu" id="homepage-menu">
                <div class="box-container">

                    &lt;!&ndash; FOOD 1 &ndash;&gt;
                    <div class="box">
                        <a href="#" class="category-btn">Food</a>
                        <img src="../images/menu/photo_food01_02.jpg">
                        <div class="item-text">
                            <h3 class="item-name">Pikachu Burger</h3>
                            <i class="item-desc">Lorem ipsum i love burger sometimes me think</i>
                            <br>
                            <span class="menu-price">RM25.00</span>
                        </div>
                        <div class="po-btn-container"><a href="#" class="po-btn">Pre-order</a></div>
                    </div>

                    &lt;!&ndash; FOOD 2 &ndash;&gt;
                    <div class="box">
                        <a href="#" class="category-btn">Food</a>
                        <img src="../images/menu/photo_food02_02.jpg">
                        <div class="item-text">
                            <h3 class="item-name">Pikachu Burger</h3>
                            <i class="item-desc">Lorem ipsum i love burger sometimes me think</i>
                            <br>
                            <span class="menu-price">RM25.00</span>
                        </div>
                        <div class="po-btn-container"><a href="#" class="po-btn">Pre-order</a></div>
                    </div>

                    &lt;!&ndash; FOOD 3 &ndash;&gt;
                    <div class="box">
                        <a href="#" class="category-btn">Food</a>
                        <img src="../images/menu/photo_food02_03.jpg">
                        <div class="item-text">
                            <h3 class="item-name">Pikachu Burger</h3>
                            <i class="item-desc">Lorem ipsum i love burger sometimes me think</i>
                            <br>
                            <span class="menu-price">RM25.00</span>
                        </div>
                        <div class="po-btn-container"><a href="#" class="po-btn">Pre-order</a></div>
                    </div>

                    &lt;!&ndash; FOOD 4 &ndash;&gt;
                    <div class="box">
                        <a href="#" class="category-btn">Drinks</a>
                        <img src="../images/menu/photo_drink01.jpg">
                        <div class="item-text">
                            <h3 class="item-name">Pikachu Burger</h3>
                            <i class="item-desc">Lorem ipsum i love burger sometimes me think</i>
                            <br>
                            <span class="menu-price">RM25.00</span>
                        </div>
                        <div class="po-btn-container"><a href="#" class="po-btn">Pre-order</a></div>
                    </div>

                    &lt;!&ndash; FOOD 5 &ndash;&gt;
                    <div class="box">
                        <a href="#" class="category-btn">Drinks</a>
                        <img src="../images/menu/photo_drink04.jpg">
                        <div class="item-text">
                            <h3 class="item-name">Pikachu Burger</h3>
                            <i class="item-desc">Lorem ipsum i love burger sometimes me think</i>
                            <br>
                            <span class="menu-price">RM25.00</span>
                        </div>
                        <div class="po-btn-container"><a href="#" class="po-btn">Pre-order</a></div>
                    </div>

                    &lt;!&ndash; FOOD 6 &ndash;&gt;
                    <div class="box">
                        <a href="#" class="category-btn">Dessert</a>
                        <img src="../images/menu/photo_sweets02.jpg">
                        <div class="item-text">
                            <h3 class="item-name">Pikachu Burger</h3>
                            <i class="item-desc">Lorem ipsum i love burger sometimes me think</i>
                            <br>
                            <span class="menu-price">RM25.00</span>
                        </div>
                        <div class="po-btn-container"><a href="#" class="po-btn">Pre-order</a></div>
                    </div>

                </div>
            </section>-->

            <!--  new one -->
            <div id="hp-menu-container" class="hp-menu-container">
                <div class="box">
                    <a href="#" class="category-btn">Food</a>
                    <img src="../images/menu/photo_food01_02.jpg" data-img-src="../images/menu/photo_food01_02.jpg">

                    <div class="item-text">
                        <h3 class="item-name">Pikachu Burger</h3><span></span>
                        <span class="menu-price">RM25.00</span>
                        <br>
                        <p class="item-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                        <div class="po-btn-container"><a href="menu.html" class="po-btn">Pre-order</a></div>
                    </div>
                </div>
                <div class="box">
                    <a href="#" class="category-btn">Drinks</a>
                    <img src="../images/menu/photo_drink01.jpg" data-img-src="../images/menu/photo_drink01.jpg">

                    <div class="item-text">
                        <h3 class="item-name">Eevee Choco Drink</h3><span></span>
                        <span class="menu-price">RM15.00</span>
                        <br>
                        <p class="item-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                        <div class="po-btn-container"><a href="menu.html" class="po-btn">Pre-order</a></div>
                    </div>
                </div>
                <div class="box">
                    <a href="#" class="category-btn">Food</a>
                    <img src="../images/menu/photo_food02_02.jpg" data-img-src="../images/menu/photo_food02_02.jpg">

                    <div class="item-text">
                        <h3 class="item-name">Eevee Burger</h3><span></span>
                        <span class="menu-price">RM25.00</span>
                        <br>
                        <p class="item-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                        <div class="po-btn-container"><a href="menu.html" class="po-btn">Pre-order</a></div>
                    </div>
                </div>
                <div class="box">
                    <a href="#" class="category-btn">Desserts</a>
                    <img src="../images/menu/photo_sweets02.jpg" data-img-src="../images/menu/photo_sweets02.jpg">

                    <div class="item-text">
                        <h3 class="item-name">Pikachu Cake</h3><span></span>
                        <span class="menu-price">RM25.00</span>
                        <br>
                        <p class="item-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                        <div class="po-btn-container"><a href="menu.html" class="po-btn">Pre-order</a></div>
                    </div>
                </div>
                <div class="box">
                    <a href="#" class="category-btn">Food</a>
                    <img src="../images/menu/photo_food02_03.jpg" data-img-src="../images/menu/photo_food02_03.jpg">

                    <div class="item-text">
                        <h3 class="item-name">Snorlax Rice</h3><span></span>
                        <span class="menu-price">RM25.00</span>
                        <br>
                        <p class="item-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                        <div class="po-btn-container"><a href="menu.html" class="po-btn">Pre-order</a></div>
                    </div>
                </div>
                <div class="box">
                    <a href="#" class="category-btn">Drinks</a>
                    <img src="../images/menu/photo_drink04.jpg" data-img-src="../images/menu/photo_drink04.jpg">

                    <div class="item-text">
                        <h3 class="item-name">Pokemon Drink Set</h3><span></span>
                        <span class="menu-price">RM25.00</span>
                        <br>
                        <p class="item-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
                        <div class="po-btn-container"><a href="menu.html" class="po-btn">Pre-order</a></div>
                    </div>
                </div>
            </div>

            <a href="menu3.php" class="btn-pink">Explore Menu</a>
        </div>

        <!--Mid pic-->
        <div class="HP-mid">
            <img src="../images/homepage/homepage_customer_mid.jpg" alt="homepage customer mid pic">
        </div>

        <!--Reservation-->
        <div class="HP-reservation">
            <div class="HP-res-2">
                <h2 class="HP-menu-heading">Special Day Ahead?</h2>
                <p class="HP-desc"><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam mi neque, hendrerit
                    nec ex at, rhoncus scelerisque elit. In hac habitasse platea dictumst. Aliquam egestas placerat
                    dolor vitae hendrerit.</p>
                <a href="reservation.html" class="btn-yellow">Make a Reservation</a>
            </div>

            <div class="HP-res-1">
                <img src="../images/homepage/bg_access.jpg" alt="pokemon latte art">
            </div>
        </div>
        <br>

        <!--Review-->
        <section class="HP-review-section">
            <div class="HP-titlez">
                <h3 class="HP-rev-heading">PikaFriends' Reviews</span></h3>
            </div>
            <div class="HP-review">
                <div class="HP-rev-1">
                    <img src="../images/review/pikapika.png" alt="" class="profile-img">
                </div>
                <div class="HP-rev-2">
                    <div class="testimonials-box">
                        <div class="testimonial-box-top">
                            <div class="testimonials-box-img back-img profile-img" style="background-image: url(../images/review/review-brock.jpg);">
                            </div>
                        </div>
                        <div class="testimonials-box-text">
                            <h3 class="h3-title">
                                Brock Kim<br>(Gym Leader)
                            </h3>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Itaque,
                                quisquam.</p>
                            <div class="animated-grey-box"></div>
                        </div>
                    </div>
                    <div class="testimonials-box">
                        <div class="testimonial-box-top">
                            <div class="testimonials-box-img back-img profile-img" style="background-image: url(../images/review/review-jessie.jpeg);">
                            </div>
                        </div>
                        <div class="testimonials-box-text">
                            <h3 class="h3-title">
                                Jessie Jee<br>(Team Rocket)
                            </h3>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Itaque,
                                quisquam.</p>
                            <div class="animated-grey-box"></div>
                        </div>
                    </div>
                </div>
                <div class="HP-rev-3">
                    <div class="testimonials-box">
                        <div class="testimonial-box-top">
                            <div class="testimonials-box-img back-img profile-img" style="background-image: url(../images/review/review-oak.png);">
                            </div>
                        </div>
                        <div class="testimonials-box-text">
                            <h3 class="h3-title">
                                Samuel Oak<br>(Professor)
                            </h3>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Itaque,
                                quisquam.</p>
                            <div class="animated-grey-box"></div>
                        </div>
                    </div>
                    <div class="testimonials-box">
                        <div class="testimonial-box-top">
                            <div class="testimonials-box-img back-img profile-img" style="background-image: url(../images/review/review-may.webp);">
                            </div>
                        </div>
                        <div class="testimonials-box-text">
                            <h3 class="h3-title">
                                May Nabilah<br>(Trainer)
                            </h3>
                            <p>Lorem, ipsum dolor sit
                                amet consectetur adipisicing elit. Itaque,
                                quisquam.</p>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!--Review
        <div class="review-container">
            <div class="review-board">
                <h2 class="review-title">What Our Customers are Saying</h2>

                Slider main container
                <div class="swiper">
                    Additional required wrapper
                    <div class="swiper-wrapper">
                         Slides
                        <div class="swiper-slide">
                            <div class="flex">
                                <div class="comments">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Non, placeat quisquam? Animi sunt, dignissimos est sit reiciendis iste ipsa error?
                                </div>
                                <div class="profile">
                                    <img src="../images/review/review-brock.jpg" alt="">
                                    <a href="#">Brock</a>
                                    <span>Gym Leader</span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="flex">
                                <div class="comments">
                                    Non, placeat quisquam? Animi sunt, dignissimos est sit reiciendis iste ipsa error?
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                </div>
                                <div class="profile">
                                    <img src="../images/review/review-jessie.jpeg" alt="">
                                    <a href="#">Jessie</a>
                                    <span>Team Rocket</span>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="flex">
                                <div class="comments">
                                    Animi sunt, ipsa error? Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Non, placeat quisquam? dignissimos est sit reiciendis iste
                                </div>
                                <div class="profile">
                                    <img src="../images/review/review-oak.png" alt="">
                                    <a href="#">Samuel Oak</a>
                                    <span>Pokemon Researcher</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    If we need pagination 
                    <div class="swiper-pagination"></div>

                    If we need navigation buttons 
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                    <br>
                </div>

            </div>
        </div>

        <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
         -->

        <!--Footer-->
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
        <!-- <script>
            // Detect browser/tab close event
            window.addEventListener('beforeunload', function(event) {
                // Make an AJAX request to the logout script to destroy the session
                var xhr = new XMLHttpRequest();
                xhr.open('GET', 'logout.php', true);
                xhr.send();
            });
        </script> -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </section>

</body>
<script src="../script/main.js"></script>

</html>