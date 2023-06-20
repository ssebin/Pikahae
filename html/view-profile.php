<?php 
include 'auth.php';
    $connection = new mysqli('localhost', 'root', '', 'pikahae_db');
    // Check the connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    } else {
    }
    $user_id = $_SESSION['user_id'];
    $query = "SELECT user_fname, user_lname, user_email, user_points, user_pokemon, user_bday, user_img FROM user WHERE user_id = $user_id";
    $stmt = $connection->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    $profileData = $result->fetch_assoc();
    $username = $profileData['user_fname'] ." ". $profileData['user_lname'];
    $point = $profileData['user_points'];
    $birthday = $profileData['user_bday'];
    $email = $profileData['user_email'];
    $pokemon = $profileData['user_pokemon'];
    if($profileData['user_img'] === NULL){
        $dataURL = '../images/profile/profile_pic.png';

    }
    else{
        $userImage = $profileData['user_img'];
        $imageData = base64_encode($userImage);
        $dataURL = "data:image/jpeg;base64," . $imageData;
    }
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
        <div class="banner">
            <img src="../images/profile/Background_pic1.png" alt="picture of pikachu with dessert">
            <div class="sub-header-wrapper">
                <p>PROFILE</p>
            </div>
        </div>
        <hr>
    </section>
    <div class="background-image">
        <figure class="view-profile-figure">
            <div class="profile-wrapper">
                <img src="<?php echo $dataURL; ?>" alt="Profile Picture" class="profile-picture" id="profile_img">
                <a href="edit-profile.php" class="profile-button">Edit Profile</a>
                <script src="../script/viewProfile.js"></script>
            </div>
            <figcaption>
                <contenttext id="user_name"><?php echo $username?><br></contenttext>
                <h2>current points: <span id="user_points"><?php echo $point?></span><br></h2>
                <br>
                <titletext>E-mail:<br></titletext>
                <contenttext id="user_emails"><?php echo $email?></contenttext><br>
                <br>
                <titletext>Birthday:<br></titletext>
                <contenttext id="user_birthday"><?php echo $birthday?></contenttext><br>
                <br>
                <titletext>Favourite pokemon:<br></titletext>
                <contenttext id="user_pokemon"><?php echo $pokemon?></contenttext><br>
            </figcaption>
            <div class="qr-code">
                <img src="../images/profile/QR_code_for_mobile.png" alt="QR Code" class="qr-code">
                <form method="POST" action="logout.php">
                    <button type="submit" class="profile2-button">Log Out</button>
                </form>
            </div>           
        </figure>
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

