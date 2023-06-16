<?php
if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    $conn = new mysqli('localhost', 'root', '', 'pikahae_db');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT user_id, user_fname, user_lname, user_email, user_phone, user_bday, user_pokemon, user_points FROM user WHERE user_id = $user_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user_fname = $row["user_fname"];
        $user_lname = $row["user_lname"];
        $user_email = $row["user_email"];
        $user_phone = $row["user_phone"];
        $user_bday = $row["user_bday"];
        $user_pokemon = $row["user_pokemon"];
        $user_points = $row["user_points"];
    } else {
        die("User not found");
    }
    $conn->close();
} else {
    die("User ID not provided");
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
                <li><a href="homepage-admin.html">Home</a></li>
                <li><a href="cusomter_accounts.html">Accounts</a></li>
                <li><a href="reservationDashboardAdmin.html">Reservations</a></li>
                <li><a href="manage_menu.html">Menu</a></li>
            </ul>
    
            <div class="icon">
                <!-- <a href="cart.html"><i class='bx bxs-cart'></i></a>
                <a href="view-profile.html"><i class='bx bxs-user'></i></a> -->
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
                    <div>
                        <div class="edit-wrapper">
                            <h3>Edit Profile</h3>
                            <div class="profile-description-wrapper">
                                <div class="profile-wrapper">
                                    <img src="../images/profile/profile_pic.png" id="ProfilePicture" alt="Profile Picture" class="profile-picture">
                                    <div class="upload-wrapper">
                                        <label for="file-upload" id="upload-btn">Upload</label>
                                        <input type="file" id="file-upload" name="file-upload" accept=".jpg, .jpeg, .png">
                                        <span class="file-name"></span>
                                        <script src="../script/editProfileAdmin.js"></script>
                                    </div>
                                </div>
                                <figcaption>
                                    <?php echo "$user_fname $user_lname"; ?><br>
                                    <h2>current points: <?php echo $user_points; ?>pts<br></h2>
                                    <br>
                                    <titletext>E-mail:<br></titletext>
                                    <div contenteditable="true" id="email"><?php echo $user_email; ?></div>
                                    <br>
                                    <titletext>Birthday:<br></titletext>
                                    <input type="date" id="birthday" name="birthday" value="<?php echo $user_bday; ?>">
                                    <br>
                                    <titletext>Favourite pokemon:<br></titletext>
                                    <select id="favorite-pokemon">
                                        <option value="bulbasaur" <?php if ($user_pokemon === "bulbasaur") echo "selected"; ?>>Bulbasaur</option>
                                        <option value="charmander" <?php if ($user_pokemon === "charmander") echo "selected"; ?>>Charmander</option>
                                        <option value="squirtle" <?php if ($user_pokemon === "squirtle") echo "selected"; ?>>Squirtle</option>
                                        <option value="pikachu" <?php if ($user_pokemon === "pikachu") echo "selected"; ?>>Pikachu</option>
                                        <option value="rowlet" <?php if ($user_pokemon === "rowlet") echo "selected"; ?>>Rowlet</option>
                                        <?php if (!in_array($user_pokemon, ['bulbasaur', 'charmander', 'squirtle', 'pikachu', 'rowlet'])) {
                                            echo "<option value='$user_pokemon' selected>$user_pokemon</option>";
                                        } ?>
                                    </select>

                                    <script src="../script/editProfileAdmin.js"></script>
                                </figcaption>
                            </div>
                        </div>
                        <div class="button-wrapper">
                            <button class="delete-account">Delete Account</button>
                            <button class="cancel-edit">Cancel</button>
                            <button class="save-edit">Save</button>
                            <script src="../script/editProfileAdmin.js"></script>
                        </div>
                        <div class="confirmation-box" id="confirmationBox">
                            <div class="confirmation-content">
                                <img src="../images/other/cry-pokemon.png" alt="pokemon-crying">
                                <p>Do you want to delete the account?</p>
                                <div class="confirmation-buttons">
                                    <button id="confirmYes">Yes</button>
                                    <button id="confirmNo">No</button>
                                </div>
                            </div>
                        </div>
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
    </div>
</body>
</html>