<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start the session
session_start();

// Check if the user is already logged in
if (isset($_SESSION['user_id'])) {
    // Redirect to the homepage or any other desired page
    header('Location: homepage-customer.php');
    exit();
}

// Declare the $registrationSuccess variable
$loginSuccess = false;
$loginFailed = false;

// Check if the login form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve user input from the login form
    $user_email = $_POST['email'];
    $user_pass = $_POST['password'];

    // Validate user input if needed
    if (empty($user_email) || empty($user_pass)) {
        // Handle validation error, e.g., redirect back to the login page with an error message
        header("Location: login.php?error=1");
        exit();
    }

    // Establish a connection to the database
    $host = "localhost:3307";
    $username = "root";
    $password = "";
    $database = "pikahae_db";

    $connection = mysqli_connect($host, $username, $password, $database);
    if (!$connection) {
        // Handle database connection error, e.g., redirect to an error page
        die("Connection failed: " . mysqli_connect_error());
    }

    // Construct a SQL query to retrieve the hashed password from the database
    $query = "SELECT user_id, user_pass FROM user WHERE user_email = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "s", $user_email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $user_id, $hashed_password);
    mysqli_stmt_fetch($stmt);

    // Verify the entered password with the stored hashed password
    if (password_verify($user_pass, $hashed_password)) {
        // Start the session and store user information
        // session_start();
        $_SESSION['user_id'] = $user_id; // Store the user_id in the session

        $loginSuccess = true;
    } else {
        // Login failed, redirect back to the login page with an error message
        $loginFailed = true;
    }

    // Close the prepared statement and the database connection
    mysqli_stmt_close($stmt);
    mysqli_close($connection);
}
// Display the alert message if registration was successful
if ($loginSuccess) {
    echo '<script>
            alert("Login successful. Welcome to Pikahae!");
            window.location.href = "homepage-customer.php";
        </script>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Pikahae Login</title>
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
        <div class="form-container">
            <div class="form-card-logo">
                <img src="../images/logo_draft.png" alt="pikahae logo">
            </div>
            <h1>Welcome Back&nbsp<span class="exclamation">!</span></h1>
            <div class="form-card login">
                <div class="form-card-header login header">
                    <h2>Login</h2>
                    <p>Enter your details to log in into your account.</p>
                </div>
                <form class="form-card-input login-input" method="POST" action="login.php">
                    <div class="form-item">
                        <input type="email" name="email" placeholder="E-mail" required autofocus>
                    </div>
                    <div class="form-item">
                        <input type="password" name="password" placeholder="Password" required autofocus>
                    </div>
                    <button type="submit" id="login-button">Log In</button><br>
                </form>
                <?php
                if (isset($_GET['error'])) {
                    $error = $_GET['error'];
                    if ($error === '1') {
                        echo "<p>Please enter both email and password.</p>";
                    } elseif ($error === '2') {
                        echo "<p>Invalid email or password. Please try again.</p>";
                    }
                }
                ?>
                <div class="form-card-footer">
                    New account? <a href="register.php">Create account</a>
                </div>
            </div>
        </div>
        <a href="login-admin.php" id="admin-login-button"><button type="submit"><img src="../images/login/admin_logo.png" alt="Admin"></button></a>
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
        if ($loginFailed) {
            // Display the registration failure alert message
            echo 'alert("Login failed. Please try again.");';
        }
        ?>
    </script>

</body>

</html>