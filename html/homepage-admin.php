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

    <!--  Google fonts Roboto -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@100;200;400;500;600;700;800;900&family=Roboto:ital,wght@0,100;0,300;0,400;0,700;1,300;1,400;1,500&display=swap" rel="stylesheet">

    <!--Review swiper-->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!--Footer Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <!-- header -->
    <section>
        <nav class="header">
            <a href="homepage-admin.html" class="logo"><img src="../images/logo_draft.png" alt="logo"></a>
            <!--        <p class="cafe-name">Pikahae</p>-->

            <ul class="navlist">
                <li><a href="homepage-admin.html">Home</a></li>
                <li><a href="cusomter_accounts.html">Accounts</a></li>
                <li><a href="reservationDashboardAdmin.html">Reservations</a></li>
                <li><a href="manage_menu.html">Menu</a></li>
            </ul>

            <div class="icon">
                <!-- <a href="#"><i class=null></i></a>
                <a href="#"><i class=null></i></a> -->
            </div>
        </nav>

        <!--Different banner for homepage-->
        <!-- <div class="homepage_banner">
            <img src="../images/homepage/homepage_admin_main.jpg" alt="homepage customer main pic">
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
                    <img src="../images/homepage/homepage_admin_main.jpg" alt="first slider pic">
                </div>
                <div class="slide second">
                    <img src="../images/homepage/slidepic-3.jpeg" alt="second slider pic">
                </div>
                <div class="slide third">
                    <img src="../images/homepage/slidepic-4.jpg" alt="third slider pic">
                </div>
                <div class="slide fourth">
                    <img src="../images/homepage/slidepic-2.jpg" alt="fourth slider pic">
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
        <div class="HP-admin-about-us">
            <h1 class="HP-heading"><span class="cool-fontz">Welcome back, </span>PikaFam<span class="cool-fontz">
                    !</span>
            </h1>
            <p class="HP-desc">"Gotta serve 'em all"<br>
                Manage consumer accounts, reservations, and menu items.<br>
                All within your fingertips.<br></p>
                <form method="POST" action="logout.php">
                    <button type="submit" class="logout-button">Log Out</button>
                </form>
        </div>
        <!--Menu-->
        <div class="HP-menu">
            <h2 class="HP-menu-heading">Manage</h2>

            <!--Copied from homung's menu-->
            <section class="homepage-admin-menu" id="homepage-admin-menu">
                <div class="box-container">

                    <!-- CARD 1 -->
                    <div class="box">
                        <img src="../images/homepage/manage-pic-1.png">
                        <div class="item-text">
                            <h3 class="item-name">Consumer Accounts</h3>
                            <i class="item-desc">View list of users<br>Update user information<br>Delete an account</i>
                            <br>
                        </div>
                        <div class="po-btn-container"><a href="cusomter_accounts.html" class="po-btn">Manage</a></div>
                    </div>

                    <!-- CARD 2 -->
                    <div class="box">
                        <img src="../images/homepage/manage-pic-2.png">
                        <div class="item-text">
                            <h3 class="item-name">Reservations</h3>
                            <i class="item-desc">View reserved tables<br>Edit availability options<br>View pre-ordered
                                menu items</i>
                            <br>
                        </div>
                        <div class="po-btn-container"><a href="reservationDashboardAdmin.html" class="po-btn">Manage</a></div>
                    </div>

                    <!-- CARD 3 -->
                    <div class="box">
                        <img src="../images/homepage/manage-pic-3.png">
                        <div class="item-text">
                            <h3 class="item-name">Menu Items</h3>
                            <i class="item-desc">View an item<br>Add or delete an item<br>Edit an item</i>
                            <br>
                        </div>
                        <div class="po-btn-container"><a href="manage_menu.html" class="po-btn">Manage</a></div>
                    </div>
                </div>
            </section>
            <a href="#" class="btn-pink">Contact Manager</a>
        </div>

        <!--Mid pic-->
        <div class="HP-mid">
            <img src="../images/homepage/homepage_admin_mid.jpg" alt="homepage customer mid pic">
        </div>

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

        <!--Footer-->
        <footer>

            <div class="footer-content">
                <h3>Pikahae</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.<br>Illo iste corrupti doloribus
                    odio sed!</p>
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
        <script>
            // Detect browser/tab close event
            window.addEventListener('beforeunload', function(event) {
                // Make an AJAX request to the logout script to destroy the session
                var xhr = new XMLHttpRequest();
                xhr.open('GET', 'logout.php', true);
                xhr.send();
            });
        </script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </section>

</body>
<script src="../script/main.js"></script>

</html>