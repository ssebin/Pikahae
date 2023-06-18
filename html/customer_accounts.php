<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Customer Accounts</title>
    <link rel="stylesheet" href="../stylesheet/pikahae.css">

    <!-- For icons -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!--  Google fonts Roboto -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@100;200;400;500;600;700;800;900&family=Roboto:ital,wght@0,100;0,300;0,400;0,700;1,300;1,400;1,500&display=swap"
        rel="stylesheet">

    <!--Footer Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- <script src="https://cdn.jsdelivr.net/npm/@supabase/supabase-js"></script> -->
    <?php
    echo '<script src="../script/customerAccounts.js"></script>';
    ?>
</head>

<body class="admin-view">
    <!-- header -->
    <section>
        <nav class="header">
            <a href="#" class="logo"><img src="../images/logo_draft.png" alt="logo"></a>
            <ul class="navlist">
                <li><a href="homepage-admin.html">Home</a></li>
                <li><a href="cusomter_accounts.html">Accounts</a></li>
                <li><a href="reservationDashboardAdmin.html">Reservations</a></li>
                <li><a href="manage_menu.html">Menu</a></li>
            </ul>

            <div class="icon">
            </div>
        </nav>
        <div class="banner">
            <img src="../images/homepage/homepage_admin_main.jpg" alt="picture of pikachu with dessert">
        </div>

        <div class="sub-header-wrapper">
            <p>CUSTOMER ACCOUNTS</p>
            <div class="input-box">
                <i class="uil uil-search"></i>
                <input type="text" id="customer-search-input" placeholder="Search customer" />
                <button class="button" id="customer-search-button"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </div>

        <hr>
    </section>
    <div class="admin-view-body">
        <div class="admin-view-container">
        </div>
        <div class="admin-view-table">
            <table>
                <div class="table-header">
                    <thead>
                        <tr>
                            <th id="customer-acc-num">Account<br>Number</th>
                            <th id="customer-acc-name">Name</th>
                            <th id="customer-acc-phone">Phone Number</th>
                            <th id="customer-acc-email">Email</th>
                            <th id="customer-acc-birthday">Birthday</th>
                            <th id="customer-acc-favpoke">Favourite<br>Pokemon</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </div>
                <div class="table-body">
                    <tbody id="customer-table-body">
                        <?php
                        $conn = new mysqli('localhost:3307', 'root', '', 'pikahae_db');

                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $sql = "SELECT user_id, user_fname, user_lname, user_email, user_phone, user_bday, user_pokemon FROM user";
                        $result = $conn->query($sql);
                        
                        // Output the table rows dynamically
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $user_id = $row["user_id"];
                                $user_fname = $row["user_fname"];
                                $user_lname = $row["user_lname"];
                                $user_email = $row["user_email"];
                                $user_phone = $row["user_phone"];
                                $user_bday = $row["user_bday"];
                                $user_pokemon = $row["user_pokemon"];

                                echo "<tr>";
                                echo "<td>$user_id</td>";
                                echo "<td>$user_fname $user_lname</td>";
                                echo "<td>$user_phone</td>";
                                echo "<td>$user_email</td>";
                                echo "<td>$user_bday</td>";
                                echo "<td>$user_pokemon</td>";
                                echo "<td>";
                                echo "<a href='edit-profile-admin.php?user_id=$user_id'><button type='button'><img src='../images/manage/edit.png' alt='Edit'></button></a>";
                                echo "<button type='button'><img src='../images/manage/delete.png' alt='Delete'></button>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7'>No results found</td></tr>";
                        }
                        ?>
                    </tbody>
                </div>
            </table>
        </div>
        <div class="overlay"></div>
            <div class="cancel-popup-card">
                <div class="cancel-popup-text">
                    <div class="cancel-popup-header">
                        <h1>Confirm Delete Account</h1>
                    </div>
                    <p>This process cannot be undone</p>
                </div>
                <button id="cancel-back-button" type="button">Back</button><span>
                    <a><button id="cancel-confirm-button" type="button">Confirm</button></a>
                </span>
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
</body>

</html>