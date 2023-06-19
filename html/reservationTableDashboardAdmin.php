<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Manage Menu</title>
  <link rel="stylesheet" href="../stylesheet/pikahae.css">

  <!-- For icons -->
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <!-- Googlefonts  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Jost:wght@100;200;400;500;600;700;800;900&family=Roboto:ital,wght@0,100;0,300;0,400;0,700;1,300;1,400;1,500&display=swap"
    rel="stylesheet">

  <!-- Boostrap link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!--Review swiper-->
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

  <!--Footer Bootstrap-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body class="admin-view">
  <!-- header -->
  <section>
    <nav class="header">
      <a href="#" class="logo"><img src="../images/logo_draft.png" alt="logo"></a>
      <!--        <p class="cafe-name">Pikahae</p>-->

      <ul class="navlist" style="margin: 0; padding: 0;">
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
    <div class="banner">
      <img src="../images/homepage/homepage_admin_main.jpg" alt="picture of pikachu with dessert">
    </div>

    <div class="sub-header-wrapper">
      <p style="margin: 0;">ADMIN DASHBOARD</p>
      <div class="tab-switch-reservation">
        <ul class="nav nav-pills justify-content-end">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="reservationDashboardAdmin.php"
              style="color: black;">Reservation</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="reservationTableDashboardAdmin.html">Tables</a>
          </li>
        </ul>
      </div>
    </div>
    <hr style="background-color: #FE6A86; border: 1px solid #FE6A86; opacity: 1; margin: 0; padding: 0;">
  </section>

  <section class="reservation-admintable-bg">
    <div class="reservation-admintable-container">
        <h2 class="available-table-header">Tables View</h2>
        <form method="POST" action="reservationTableDashboardAdmin.php">
            <label for="date">Select Date:</label> &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="date" id="date" name="date" class="custom-date-input" required><br><br>
            <label for="time">Select Time:</label> &nbsp;&nbsp;&nbsp;&nbsp;
            <select id="time" name="time" required><br><br>
                <option value="">--Please choose an option--</option>
                <option value="15:00:00">3:00 PM - 4:00 PM</option>
                <option value="16:00:00">4:00 PM - 5:00 PM</option>
                <option value="17:00:00">5:00 PM - 6:00 PM</option>
                <option value="18:00:00">6:00 PM - 7:00 PM</option>
                <option value="19:00:00">7:00 PM - 8:00 PM</option>
                <option value="20:00:00">8:00 PM - 9:00 PM</option>
            </select><br><br>
            <button type="submit" id="admin-table-reservation-dashboard-submit">Submit</button>
        </form>
        <div class="admin-view-container">
            <div class="admin-view-table">
                <table>
                    <thead>
                        <tr>
                            <th id="menu-table-id">Table ID</th>
                            <th id="menu-table-name">Date</th>
                            <th id="menu-table-cat">Time</th>
                            <th id="menu-table-price">No. of Guests</th>
                            <th>Pre-Ordered Items</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $hostname = 'localhost';
                        $username = 'root';
                        $database = 'pikahae_db';

                        $conn = new mysqli($hostname, $username, '', $database);

                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
                          $orderID = $_POST["order_id"];
                      
                          // Delete from order_item table
                          $deleteOrderItemsQuery = "DELETE FROM order_item WHERE order_id = $orderID";
                          $deleteOrderItemsResult = mysqli_query($conn, $deleteOrderItemsQuery);
                      
                          // Delete from user_order table
                          $deleteUserOrderQuery = "DELETE FROM user_order WHERE order_id = $orderID";
                          $deleteUserOrderResult = mysqli_query($conn, $deleteUserOrderQuery);
                      
                          if ($deleteOrderItemsResult && $deleteUserOrderResult) {
                              echo "Order deleted successfully.";
                          } else {
                              echo "Error deleting order.";
                          }
                      }


                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $date = $_POST["date"];
                            $time = $_POST["time"];

                            $tablesQuery = "SELECT * FROM tables";
                            $tablesResult = mysqli_query($conn, $tablesQuery);

                            while ($tableRow = mysqli_fetch_assoc($tablesResult)) {
                              $tableID = $tableRow['table_id'];
                          
                              // Check if the table is booked for the selected date and time
                              $bookedQuery = "SELECT * FROM user_order WHERE table_id = $tableID AND order_date = '$date' AND order_time = '$time'";
                              $bookedResult = mysqli_query($conn, $bookedQuery);
                          
                              echo "<tr>";
                              echo "<td>" . $tableRow['table_id'] . "</td>";
                          
                              if (mysqli_num_rows($bookedResult) > 0) {
                                  // Table is booked
                                  $row = mysqli_fetch_assoc($bookedResult);
                                  echo "<td>" . $date . "</td>";
                                  echo "<td>" . $time . "</td>";
                                  echo "<td>" . $row['order_pax'] . "</td>";
                          
                                  $orderID = $row['order_id'];
                                  $orderItemsQuery = "SELECT * FROM order_item JOIN menu ON order_item.menu_id = menu.menu_id WHERE order_id = $orderID";
                                  $orderItemsResult = mysqli_query($conn, $orderItemsQuery);
                          
                                  echo "<td>";
                                  while ($orderItemRow = mysqli_fetch_assoc($orderItemsResult)) {
                                      $menuItemName = $orderItemRow['menu_name'];
                                      $menuItemQty = $orderItemRow['order_qty'];
                                      echo $menuItemName . " x" . $menuItemQty . "<br>";
                                  }
                                  echo "</td>";
                          
                                  echo "<td>";
                                  echo "</button>";
                                  echo "<form method='POST' action='reservationTableDashboardAdmin.php'>";
                                  echo "<input type='hidden' name='order_id' value='" . $orderID . "'>";
                                  echo "<input type='hidden' name='date' value='" . $date . "'>";
                                  echo "<input type='hidden' name='time' value='" . $time . "'>";
                                  echo "<button type='submit' name='delete'><img src='../images/manage/delete.png' alt='Delete'></button>";
                                  echo "</form>";
                                  echo "</td>";
                              } else {
                                  // Table is available
                                  echo "<td>-</td>";
                                  echo "<td>-</td>";
                                  echo "<td>Table is Available</td>";
                                  echo "<td>-</td>";
                                  echo "<td>-</td>";
                              }
                              echo "</tr>";
                          }
                        }

                        $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
  <!--Footer-->
  <footer>

    <div class="footer-content">
      <h3>Pikahae</h3>
      <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.<br>Illo iste corrupti doloribus odio sed!</p>
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