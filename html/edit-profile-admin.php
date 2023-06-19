<?php 
    $connection = new mysqli('localhost:3307', 'root', '', 'pikahae_db');
    // Check the connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    } else {
    }
    $user_id = $_GET['user_id'];
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
            <img src="../images/profile/Background_pic1.png" alt="picture of pikachu with dessert">
        </div>
        <div class="sub-header-wrapper">
            <p>PROFILE</p>
        </div>
        <hr>
    </section>
    <div class="edit-profile-page">
        <div class="background-image">
                <figure class="edit-profile-figure">
                <form class="edit-item-form" method="POST" enctype="multipart/form-data" action="update-profile-admin.php?user_id=<?php echo $user_id; ?>">
                    <div>
                        <div class="edit-wrapper">
                            <h3>Edit Profile</h3>
                                <div class="profile-description-wrapper">
                                    <div class="profile-wrapper">
                                        <img src="<?php echo $dataURL; ?>" id="ProfilePicture" alt="Profile Picture" class="profile-picture">
                                        <div class="upload-wrapper">
                                            <label for="file-upload" id="upload-btn">Upload</label>
                                            <input type="file" id="file-upload" name="file-upload" accept=".jpg, .jpeg, .png">
                                            <script src="../script/editProfileAdmin.js"></script>         
                                        </div>
                                    </div>
                                    <figcaption>
                                        <?php echo $username?><br>
                                        <h2>current points: <span id="user_points"><?php echo $point?></span><br></h2>
                                        <br>
                                        <titletext>E-mail:<br></titletext>
                                        <input type="email" id="email" name="email" value="<?php echo $email ?>">
                                        <br>
                                        <titletext>Birthday:<br></titletext>
                                        <input type="date" id="birthday" name="birthday" value=<?php echo $birthday ?>>
                                        <br>
                                        <titletext>Favourite pokemon:<br></titletext>
                                            <select id="favorite-pokemon" name="favorite_pokemon">
                                                <option value="Bulbasaur"<?php if ($pokemon === 'Bulbasaur') echo 'selected'; ?>>Bulbasaur</option>
                                                <option value="Charmander" <?php if ($pokemon === 'Charmander') echo 'selected'; ?>>Charmander</option>
                                                <option value="Squirtle"<?php if ($pokemon === 'Squirtle') echo 'selected'; ?>>Squirtle</option>
                                                <option value="Pikachu"<?php if ($pokemon === 'Pikachu') echo 'selected'; ?>>Pikachu</option>
                                                <option value="Rowlet" <?php if ($pokemon === 'Rowlet') echo 'selected'; ?>>Rowlet</option>
                                            </select>
                                        <script src="../script/editProfileAdmin.js"></script>
                                    </figcaption>
                                </div>
                        </div>
                        <div class="button-wrapper">
                        <button class="delete-account" name="delete-account" onclick="return confirm('Are you sure you want to delete your account? This action cannot be undone.')" >Delete Account</button>
                            <button class="cancel-edit" name="cancel-edit">Cancel</button>
                            <span><button class="save-edit" name="save-btn" type="submit">Save</button></span>
                            <script src="../script/editProfileAdmin.js"></script>
                        </div>
                    </div>
                </form>
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
    </div>
</body>
<script src="../script/editProfileAdmin.js"></script>
</html>