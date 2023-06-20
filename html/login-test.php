<?php
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
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "pikahae_db";
    
    $connection = mysqli_connect($host, $username, $password, $database);
    if (!$connection) {
        // Handle database connection error, e.g., redirect to an error page
        die("Connection failed: " . mysqli_connect_error());
    }

    // Construct a SQL query to check if the email and password exist in the database
    $query = "SELECT * FROM user WHERE user_email = ? AND user_pass = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "ss", $user_email, $user_pass);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $rows = mysqli_stmt_num_rows($stmt);

    // Check if the login is successful
    if ($rows > 0) {
        // Start the session and store user information
        session_start();
        $_SESSION['email'] = $user_email;

        // Redirect to a logged-in page
        header("Location: homepage-customer.php");
        exit();
    } else {
        // Login failed, redirect back to the login page with an error message
        header("Location: login.php?error=2");
        exit();
    }

    // Close the prepared statement and the database connection
    mysqli_stmt_close($stmt);
    mysqli_close($connection);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <!-- Your CSS and other head elements -->
</head>
<body>
    <!-- Your HTML login form -->
    <form method="POST" action="login-test.php">
        <input type="email" name="email" placeholder="E-mail" required autofocus>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Log In</button>
    </form>
    <!-- Error handling if needed -->
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
</body>
</html>
