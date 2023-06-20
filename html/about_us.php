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
            <a href="#" class="logo"><img src="../images/logo_draft.png" alt="logo"></a>
            <!--        <p class="cafe-name">Pikahae</p>-->
    
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
        </nav>
        <div class="banner">
            <img src="../images/other/pokemon_bg.png" alt="picture of pikachu with dessert">
            <div class="sub-header-wrapper">
              <p>ABOUT US</p>
            </div>
          <hr>
        </div>
    </section>
    <div class="about-us-background">
        <div class="about-us-introduction">
            <h1>What is Pikahae?</h1>
            <br>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse tincidunt quam sit amet 
                volutpat tempus. Donec euismod molestie blandit. Donec erat libero, sollicitudin a odio et, 
                cursus accumsan massa. Cras viverra ante augue, id sagittis lorem faucibus at. In eget erat 
                ut mauris sollicitudin gravida. Vestibulum et tincidunt massa, vel viverra massa. Donec at
                ante commodo justo maximus malesuada.
                <br><br>
                Sed aliquet magna sed elit varius dignissim. Fusce aliquam lectus sed scelerisque molestie. 
                Quisque dolor augue, tincidunt sit amet ullamcorper a, euismod vitae justo. Etiam in diam 
                non mi sodales condimentum. Donec placerat mauris vitae enim venenatis, at sodales magna facilisis. 
                Morbi rutrum eget nisi eu eleifend. Nulla fermentum pulvinar laoreet. Morbi in odio turpis.
                Fusce quis dolor nec risus cursus scelerisque. Nulla facilisi. Ut tellus risus, interdum et 
                posuere sed, pulvinar mattis tortor. Aliquam auctor suscipit libero nec porttitor. Aenean sit 
                amet rutrum tellus. Nulla sit amet auctor lorem. Quisque vel dolor id nisi rutrum ullamcorper. 
                Ut dictum ante ut ipsum interdum, vitae finibus erat sollicitudin.</p>
        </div>
        <br>
        <div class="slogan-container">
            <p>“The first rule of any organic used in a business is that nature applied to an efficient operation 
                will magnify the efficiency. The second is that organic applied to an inefficient operation will 
                magnify the health.”</p>
        </div>
        <div class="team-container">
            <h1>Our Developers</h1>
            <br>
            <p>Simply dummy text of the printing and typesetting industry. Lorem had ceased to been the industry's 
                standard dummy text ever since the 1500s, when an unknown printer took a galley.</p>
        </div>
        <div class="member-container">
            <div class="item">
              <div class="img-container">
                <img src="../images/about-us/pikachu.webp" alt="member1">
              </div>
              <p>Sebin Hwang</p>
            </div>
            <div class="item">
              <div class="img-container">
                <img src="../images/about-us/charmander.webp" alt="member2">
              </div>
              <p>Nur Anati</p>
            </div>
            <div class="item">
              <div class="img-container">
                <img src="../images/about-us/meowth.webp" alt="member3">
              </div>
              <p>Lutfil Hadi</p>
            </div>
            <div class="item">
              <div class="img-container">
                <img src="../images/about-us/jigglypuff.webp" alt="member4">
              </div>
              <p>Anneisha Akson</p>
            </div>
            <div class="item">
              <div class="img-container">
                <img src="../images/about-us/starly.webp" alt="member5">
              </div>
              <p>Jee Jian Qi</p>
            </div>
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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</body>
</html>