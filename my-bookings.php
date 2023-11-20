<?php
session_start(); 

if (!isset($_SESSION['user_id'])) {

  header('Location: login.php');
  exit;
}


$userId = $_SESSION['user_id'];


$conn = new PDO('mysql:host=localhost;dbname=travel', 'root', '');
$stmt = $conn->prepare("SELECT bookings.*, tours.name AS tour_name FROM bookings JOIN tours ON bookings.tour_id = tours.id WHERE user_id = :user_id");
$stmt->bindParam(':user_id', $userId);
$stmt->execute();
$bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>

<head>
  <title>My Bookings - TRAVIO.</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <a class="navbar-brand" href="index.html">TRAVIO.</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="navbar-nav ml-auto">

      <li class="nav-item">
        <a class="nav-link" href="dashboard.php">Book A Tour</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="my-bookings.php">My Bookings</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact-support.php">Contact Support</a>
      </li>
    </ul>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">

        <li class="nav-item">
          <a class="nav-link" href="update-profile.php">Update Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="container mt-5">
    <h2>My Bookings</h2>
    <table class="table">
      <thead>
        <tr>
          <th>Tour Name</th>
          <th>Booking Date</th>
        </tr>

      </thead>
      
      <tbody>
      <?php foreach ($bookings as $booking) : ?>
      <tr>
        <td><?php echo $booking['tour_name']; ?></td>
        <td><?php echo $booking['booking_date']; ?></td>
        <td>
          <form action="delete-booking.php" method="post"> 
            <input type="hidden" name="booking_id" value="<?php echo $booking['id']; ?>">
            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
          </form>
        </td>
      </tr>
    <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <footer class="footer">
    <nav class="navbar fixed-bottom navbar-dark bg-success">
      <div class="container-fluid">
        <a class="navbar-brand text-center" href="#">© 2023 TRAVIO. All rights reserved.</a>
      </div>

  </footer>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>