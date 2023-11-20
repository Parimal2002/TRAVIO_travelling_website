<?php
session_start(); 


if (!isset($_SESSION['user_id'])) {
  
  header('Location: login.php');
  exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 
  if (isset($_POST['booking_id'])) {
    $bookingId = $_POST['booking_id'];


    $conn = new PDO('mysql:host=localhost;dbname=travel', 'root', '');
    $stmt = $conn->prepare("DELETE FROM bookings WHERE id = :booking_id");
    $stmt->bindParam(':booking_id', $bookingId);
    $stmt->execute();


    header('Location: my-bookings.php');
    exit;
  }
}
?>
