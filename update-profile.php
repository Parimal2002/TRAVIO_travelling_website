<?php
session_start(); 


if (!isset($_SESSION['user_id'])) {
  
  header('Location: login.php');
  exit;
}


$userId = $_SESSION['user_id'];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
  $newPassword = $_POST['new_password'];

  
  if (!empty($newPassword)) {
   
    $conn = new PDO('mysql:host=localhost;dbname=travel', 'root', '');
    $stmt = $conn->prepare("UPDATE users SET password = :password WHERE id = :user_id");
    $stmt->bindParam(':password', $newPassword);
    $stmt->bindParam(':user_id', $userId);
    $stmt->execute();
    echo "<script>alert('Password Changed Successfully');</script>";
   
    header('Location: update-profile.php');
    exit;
  } else {
    $error = "Please enter a new password.";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Update Profile - TRAVIO.</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.html">TRAVIO.</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="navbar-nav ml-auto">
      
        <li class="nav-item">
          <a class="nav-link" href="dashboard.php">Book A Tour</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="my-bookings.php">My Bookings</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact-support.php">Contact Support</a>
        </li>
      </ul>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
      
        <li class="nav-item">
          <a class="nav-link active" href="update-profile.php">Update Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="container mt-5">
    <h2>Update Profile</h2>
    <?php if (isset($error)) : ?>
      <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>
    <form method="POST">
      <div class="form-group">
        <label for="new_password">New Password:</label>
        <input type="password" class="form-control" id="new_password" name="new_password" required>
      </div>
      <button type="submit" class="btn btn-primary">Update Password</button>
    </form>
  </div>
  <footer class="footer">
  <nav class="navbar fixed-bottom navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand text-center" href="#">© 2023 TRAVIO. All rights reserved.</a>
  </div>

    </footer>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
