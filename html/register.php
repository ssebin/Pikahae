<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Start the session
session_start();

// Check if the user is already logged in
if (isset($_SESSION['user_id'])) {
    // Redirect to the homepage or any other desired page
    header('Location: homepage-customer.php');
    exit();
}

// Declare the $registrationSuccess variable
$registrationSuccess = false;
$registrationFailed = false;

// Check if the registration form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve user input from the registration form
    $user_fname = $_POST['fname'];
    $user_lname = $_POST['lname'];
    $user_nickname = $_POST['username'];
    $user_phone = $_POST['contact'];
    $user_email = $_POST['email'];
    $user_pass = $_POST['password'];
    $confirm_pass = $_POST['confirmPassword'];

    // Validate user input if needed
    if (empty($user_fname) || empty($user_lname) || empty($user_nickname) || empty($user_phone) || empty($user_email) || empty($user_pass) || empty($confirm_pass)) {
        // Handle validation error, e.g., redirect back to the registration page with an error message
        header("Location: register.php?error=1");
        exit();
    }

    if ($user_pass !== $confirm_pass) {
        // Handle password mismatch error, e.g., redirect back to the registration page with an error message
        header("Location: register.php?error=2");
        exit();
    }

    // Perform additional validation if needed
    // ...

    // Establish a connection to the database
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "pikahae_db";

    $connection = mysqli_connect($host, $username, $password, $database);
    if (!$connection) {
        // Handle database connection error, e.g., redirect to an error page
        die("Connection failed: " . mysqli_connect_error());
    }

    // Check if the user already exists in the database
    $query = "SELECT * FROM user WHERE user_email = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "s", $user_email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $rows = mysqli_stmt_num_rows($stmt);

    if ($rows > 0) {
        // User already exists, redirect back to the registration page with an error message
        header("Location: register.php?error=3");
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($user_pass, PASSWORD_DEFAULT);

    // Insert the user into the database
    $query = "INSERT INTO user (user_fname, user_lname, user_nickname, user_phone, user_email, user_pass, user_points, user_pokemon, user_img, user_id, user_bday) VALUES (?, ?, ?, ?, ?, ?, '0', 'Pikachu', '', '0', '1999-11-09')";

    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "ssssss", $user_fname, $user_lname, $user_nickname, $user_phone, $user_email, $hashed_password);

    if (mysqli_stmt_execute($stmt)) {
        // Data insertion was successful
        // Redirect to a registration success page or display a success message

        // Set a flag to indicate successful registration
        $registrationSuccess = true;
    } else {
        // Data insertion failed
        // Handle the failure, e.g., redirect back to the registration page with an error message

        // Set a flag to indicate unsuccessful registration
        $registrationFailed = true;
    }

    // Close the prepared statement and the database connection
    mysqli_stmt_close($stmt);
    mysqli_close($connection);

}
// Display the alert message if registration was successful
if ($registrationSuccess) {
    echo '<script>
            alert("Registration successful! You can now log in.");
            window.location.href = "login.php";
        </script>';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Pikahae Register</title>
    <link rel="stylesheet" href="../stylesheet/pikahae.css">

    <!-- For icons -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!--  Google fonts Roboto -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@100;200;400;500;600;700;800;900&family=Roboto:ital,wght@0,100;0,300;0,400;0,700;1,300;1,400;1,500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Aldrich&family=Open+Sans:wght@600&display=swap" rel="stylesheet">

    <!--Footer Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <div class="form-body">
        <div class="overlay"></div>
        <div class="form-container register-container">
            <div class="form-card-logo">
                <img src="../images/logo_draft.png" alt="pikahae logo">
            </div>
            <h1>Be A Part of Pikahae&nbsp<span class="exclamation">!</span></h1>
            <div class="form-card register">
                <div class="form-card-header">
                    <h2>Register</h2>
                    <p>Enter your details register your account.</p>
                </div>
                <form class="form-card-input register-input" method="POST" action="register.php">
                    <div class="form-item">
                        <input type="text" id="fname" name="fname" placeholder="First Name" required autofocus><br>
                    </div>
                    <div class="form-item">
                        <input type="text" id="lname" name="lname" placeholder="Last Name" required autofocus>
                    </div>
                    <div class="form-item">
                        <input type="text" id="username" name="username" placeholder="Username" required autofocus>
                    </div>
                    <div class="form-item">
                        <input type="tel" id="contact" name="contact" placeholder="Contact" required autofocus>
                    </div>
                    <div class="form-item">
                        <input type="email" id="email" name="email" placeholder="E-mail" required autofocus>
                    </div>
                    <div class="form-item">
                        <input type="password" id="password" name="password" placeholder="Password" required autofocus>
                    </div>
                    <div class="form-item">
                        <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required autofocus>
                    </div>
                    <div class="form-item-other register-other">
                    </div>
                    <div class="register-input-alert">
                        <p id="name-input-alert">Enter alphabetical characters for your name</p><br>
                        <p id="username-input-alert">Username must be at least 4 characters</p><br>
                        <p id="password-requirement-alert">Password must be at least 8 characters long and contain at least 1 number and 1 special character</p><br>
                        <p id="password-match-alert">Passwords do not match</p>
                    </div>
                    <!-- <p>By clicking register, you agree to Pikahae's<a href="#" id="terms-link">&nbsp; Terms and Conditions</a></p> -->
                    <button type="submit" id="register-btn">Register</button><br>
                </form>
                <div class="form-card-footer">
                    Already have an account? <a href="login.php">Login</a>
                </div>
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

    <script>
        <?php
        if (isset($_GET['error']) && $_GET['error'] == 1 || $_GET['error'] == 2 || $_GET['error'] == 3) {
            // Display the registration failure alert message
            echo 'alert("Registration failed. Please try again.");';
        }
        ?>
    </script>
    <script src="../script/register.js"></script>

</body>

</html>