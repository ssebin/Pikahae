<?php
include 'auth.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Pikahae</title>
    <link rel="stylesheet" href="../stylesheet/pikahae.css">

    <!-- For icons -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!--  Google fonts Roboto -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@100;200;400;500;600;700;800;900&family=Roboto:ital,wght@0,100;0,300;0,400;0,700;1,300;1,400;1,500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Aldrich&family=Open+Sans:wght@600&display=swap" rel="stylesheet">

</head>

<body>
    <!-- header -->
    <section>
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
        <div class="banner">
            <img src="../images/other/contact-us-bg.png" alt="picture of pikachu with dessert">
            <div class="sub-header-wrapper">
                <p>CONTACT US</p>
            </div>
        </div>
        <hr>
    </section>
    <div class="contact-us-background">
        <div class="image-description-wrapper">
            <img src="../images/other/contact-us-image.png" alt="cute pikachu picture">
            <div class="description-wrapper">
                <p style="font-weight: bold; font-size: 25px; color: #FE6A86;">We'd love to talk about how we can work together.</p>
                <br>
                <p style="margin-left: 5px; color:#525C60;">Simply dummy text of the printing and typesetting industry. Lorem had ceased to
                    been the industry's standard dummy text ever since the 1500s, when an unknown printer
                    took a galley.</p>
                <div class="contact-us-icon-container">
                    <div class="email-icon-wrapper">
                        <p style="font-weight: bold; font-size: large;">Message</p>
                        <p style="color: #525C60;">support@pikahae.com</p>
                    </div>
                </div>
                <div class="contact-us-icon-container">
                    <div class="contact-icon-wrapper">
                        <p style="font-weight: bold; font-size: large;">Contact Us</p>
                        <p style="color: #525C60;">+60 123 4567 233</p>
                    </div>
                </div>
                <div class="small-button-container">
                    <button class="social-media-button"><img src="../images/other/Insta.png" alt="button 1"></button>
                    <button class="social-media-button"><img src="../images/other/Fb.png" alt="button 2"></button>
                    <button class="social-media-button"><img src="../images/other/Twiter.png" alt="button 3"></button>
                    <button class="social-media-button"><img src="../images/other/pinterest.png" alt="button 4"></button>
                </div>
            </div>
        </div>
        <div class="cafe-location-wrapper">
            <div class="cafe-location-information">
                <div class="locate-us">
                    <h4>Our Cafe</h4>
                    <p>Established fact that a reader will be distracted by the readable content of a page when looking
                        a layout. The point of using.</p>
                    <div class="cafe-location-address">
                        <img src="../images/other/Location.png" alt="locate us!">
                        <p>Batu Caves, Malaysia:<br>
                            299 Park Avenue New York,<br>
                            New York 10171</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="contact-us-form-container">
            <h2 class="contact-us-form-heading">Ask Us Anything!</h2>
            <form>
                <div class="form-row">
                    <label for="name">Full Name*</label>
                    <input type="text" id="name" name="name" required placeholder="Enter your name">
                </div>
                <div class="form-row">
                    <label for="email">Your Email*</label>
                    <input type="email" id="email" name="email" required placeholder="Example@gmail.com">
                </div>
                <div class="form-row">
                    <label for="company">Company*</label>
                    <input type="text" id="company" name="company" required placeholder="Company name">
                </div>
                <div class="form-row">
                    <label for="subject">Subject*</label>
                    <input type="text" id="subject" name="subject" required placeholder="How can we help?">
                </div>
                <div class="form-row">
                    <label for="message">Message*</label>
                    <textarea id="messages" name="message" required placeholder="Any message to us?"></textarea>
                </div>
            </form>
            <button type="submit" class="send-message">Send Message</button>
        </div>
        <script src="../script/about-contact.js"></script>
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
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </div>
</body>

</html>