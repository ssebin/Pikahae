<?php
include 'auth.php';


// Check if the user is logged in or redirect to the login page if not
// if (!isset($_SESSION['username'])) {
//     header('Location: login.php');
//     exit();
// }

// Check if the reservation details are stored in session variables
if (!isset($_SESSION['reservation_date']) || !isset($_SESSION['reservation_time']) || !isset($_SESSION['num_guests'])) {
    // Redirect to the reservation form page if the details are missing
    header('Location: reservationForm1.php');
    exit();
}

    


// Step 1: Establish database connection (replace with your credentials)
$host = "localhost"; // Database host
$username = "root"; // Database username
$password = ""; // Database password
$database = "pikahae_db"; // Database name

$connection = new mysqli('localhost', 'root', '', 'pikahae_db');

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

//testing to see if connected to db
//echo "Connected successfully!";


// Step 2: Retrieve user's table registration preferences
$reservationDate = $_SESSION['reservation_date'];
$reservationTime = $_SESSION['reservation_time'];
$numGuests = $_SESSION['num_guests'];




// Step 3: Write and execute SQL query to fetch available tables
// Query the database to fetch available tables based on date and time
// Assuming you have a table called 'tables' in your database

$sql = "SELECT table_id FROM user_order WHERE order_date = '$reservationDate' AND order_time = '$reservationTime'";
//$query = "SELECT table_id FROM user_order WHERE table_id NOT IN (SELECT table_id FROM user_order WHERE order_date = '$reservationDate' AND order_time = '$reservationTime')";
//$query = "SELECT table_id FROM user_order WHERE order_date = '$reservationDate'";

$result = mysqli_query($connection, $sql);

// Create an array to store the booked table IDs
$bookedTables = array();


// Check if the query executed successfully
if ($result) {
    // Fetch the booked table IDs
    while ($row = mysqli_fetch_assoc($result)) {
        $tableID = $row['table_id'];
        $bookedTables[] = $tableID;
    }
} else {
    // Query execution failed
    echo "Error executing query: " . mysqli_error($connection);
}

 // Get the order ID of the inserted row
 $orderId = mysqli_insert_id($connection);

         

// Step 5: Close the database connection
mysqli_close($connection);

// Generate an array of all table IDs
$totalTables = range(1, 10);

// Get the available tables by excluding the booked tables
$availableTables = array_diff($totalTables, $bookedTables);

// TESTING TO Display the available tables
// echo "Available Tables:<br>";
// foreach ($availableTables as $tableID) {
//     echo "Table ID: $tableID<br>";
// }


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
  
  <!-- Googlefonts  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jost:wght@100;200;400;500;600;700;800;900&family=Roboto:ital,wght@0,100;0,300;0,400;0,700;1,300;1,400;1,500&display=swap" rel="stylesheet">
  
  <!-- Banner font -->
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Aldrich&family=Roboto:wght@100&display=swap" rel="stylesheet">

  <!-- Boostrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <!--Review swiper-->
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

  <!--Footer Bootstrap-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<body class="reservationTableSelectionDetails-body">
    <!-- header -->
  <section>
    <!-- <nav class="header">
      <a href="#" class="logo"><img src="../images/logo_draft.png" alt="logo"></a>

      <ul class="navlist" style="margin: 0; padding: 0;">
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
    </nav> -->

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
  </section>

    <div class="banner">
      <img src="../images/bannerReservation.png" alt="picture of pikachu with dessert">
    </div>

    <!-- sub header section -->
    <div class="sub-header-wrapper">
      <p style="margin: 0;">RESERVATIONS</p>
    </div>

    <hr style="background-color: #FE6A86; border: 1px solid #FE6A86; opacity: 1; margin: 0; padding: 0;">

<section class = "reservation-select-table-bg">
  <div class="reservation-form-container">
      <h2 class="available-table-header">Available Tables</h2>
      <h6 class="select-table-header">*Please select one</h6>



      <form action="reservation-selection.php" method="POST">
      
      <div style="text-align: center;">
        <div class="row align-items-center">
          <div class="col-md-3 text-end">
              <label for="selected_table"> Select a Table: </label>            
          </div>
            <div class="col-md-9">
              <select class="drop-down-table" name="table_selection" id="table_selection">
                <?php foreach ($availableTables as $table) : ?>
                    <option value="<?php echo $table; ?>"><?php echo $table; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
        </div>
        
        <br>

        <div style="text-align: center;">
          <img src="../images/reservation/seatmap.png" width="600" height="400" alt="Seating Map">
        </div>


        <br>
        <input class="btn-yellow-reservation" type="submit" value="Confirm">
        
      </div>
      </form>

      
  </div>
</section>


    <!--Footer-->
<footer>        
    <div class="footer-content">
        <h3 style="margin-bottom: 0;">Pikahae</h3>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.<br>Illo iste corrupti doloribus odio sed!</p>
        <ul class="socials" style="padding: 0;">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
        </ul>
        <img src=../images/babies_trans.png>
    </div>
    <hr style="border: 0.5px solid #ddddddc1; opacity: 1; margin: 0; padding: 0;">
    <div class="footer-bottom">
        <p style="margin: 0;">copyright &copy;2023 Pikahae. designed by <span>dino kuning</span></p>
    </div>
  </footer>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="../script/selectTableReservation.js"></script>

</body>
</html>
