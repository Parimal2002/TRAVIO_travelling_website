<?php 
session_start(); 
if($_SESSION['user_id'] == 2) {
  header("Location: ./admin/dashboard.php");
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Book a Tour - TRAVIO.</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body{
      line-height: 0.7;
    }
    .container {
      max-width: 800px;
      margin-top: 50px;
    }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <a class="navbar-brand" href="index.html"> TRAVIO. </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="navbar-nav ml-auto">
      
        <li class="nav-item">
          <a class="nav-link active" href="dashboard.php">Book A Tour</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="my-bookings.php">My Bookings</a>
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
  <div class="container">
  
    <h2 class="mt-3">Book a Tour</h2>
    <?php
      require_once './db/db_connection.php'; 
      
      

      if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $tourId = $_POST['tour_id'];
        $userId = $_SESSION['user_id'];


        $stmt = $connection->prepare("INSERT INTO bookings (tour_id, user_id) VALUES (:tour_id, :user_id)");
        $stmt->bindParam(':tour_id', $tourId);
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
          echo '<div class="alert alert-success">Booking successful!</div>';

          header('Location: booking-success.php');
          exit;
        } else {
          echo '<div class="alert alert-danger">Failed to book the tour. Please try again.</div>';
        }
      }


      $stmt = $connection->query("SELECT * FROM tours");
      $tours = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
      <div class="form-group">
        <label for="tour"> Select a Tour :</label>
        <select class="form-control" id="tour" name="tour_id" required>
          <?php foreach ($tours as $tour): ?>
            <option value="<?php echo $tour['id']; ?>">
              <?php echo $tour['name']; ?> | (Rs.<?php echo $tour['price']; ?>/- ) | <?php echo $tour['duration']; ?> Days
            </option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group">
        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
      </div>
      <button type="submit" class="btn btn-warning mb-5">Book My Tour</button>
    </form>
    <img src="./Images/kedarnath.jpg" class="rounded float-start" alt="..." width="30%">
  <img src="./Images/kerala copy.jpg" class="rounded float-middle" alt="..." width="30%">
  <img src="./Images/chopta.jpg" class="rounded float-end" alt="..." width="30%">
  <img src="./Images/Rishikesh.jpg" class="rounded float-end" alt="..." width="30%">
  <img src="./Images/tirupati-balaji-temple.jpg.jpg" class="rounded float-end" alt="..." width="30%">
  <img src="./Images/Vrindavan.jpg" class="rounded float-end" alt="..." width="30%">
  <img src="./Images/4_Dham.jpg" class="rounded float-end" alt="..." width="30%">
  <img src="./Images/leh-Ladakh-tour.jpg" class="rounded float-end" alt="..." width="30%">


  </div>
  
  <footer class="footer">
    <nav class="navbar fixed-bottom navbar-dark bg-success">
      <div class="container-fluid">
        <a class="navbar-brand text-center" href="index.html">© 2023 TRAVIO. All rights reserved.</a>
      </div>

  </footer>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
