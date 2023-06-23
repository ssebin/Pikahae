<?php
session_start();
include 'auth.php';
$user_id = $_SESSION['user_id'];


if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    // Retrieve the form data
    $reservationDate = $_POST['reservation_date'];
    $reservationTime = $_POST['reservation_time'];
    $numGuests = $_POST['num_guests'];

     // Perform server-side validation to make sure user fills out the form and not leave it empty
     $errors = [];

     // Check if any of the fields are empty
     if (empty($reservationDate)) {
         $errors[] = "Reservation date is required.";
     }
     if (empty($reservationTime)) {
         $errors[] = "Reservation time is required.";
     }
     if (empty($numGuests)) {
         $errors[] = "Number of guests is required.";
     }
 
     // If there are any errors, display them and prevent further processing
     if (!empty($errors)) {
         foreach ($errors as $error) {
             echo $error . "<br>";
         }
         exit();
     }

    // Store the data in session variables
    $_SESSION['reservation_date'] = $reservationDate;
    $_SESSION['reservation_time'] = $reservationTime;
    $_SESSION['num_guests'] = $numGuests;


    // Redirect to the table selection page
    header('Location: reservationSelectTable.php');
    exit();
    
    }
    require 'reservationForm1.html';
    
?>

