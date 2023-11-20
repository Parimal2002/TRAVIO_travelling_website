<?php

if (!isset($_GET['id'])) {
  
  header("Location: tours.php"); 
  exit;
}


require_once "../db/db_connection.php";


$tourId = $_GET['id'];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $deleteStmt = $connection->prepare("DELETE FROM tours WHERE id = :id");
  $deleteStmt->bindParam(':id', $tourId);
  
  if ($deleteStmt->execute()) {
   
    header("Location: tours.php"); // 
    exit;
  } else {
    
    $errorMessage = "Failed to delete the tour. Please try again.";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Delete Tour</title>
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">TRAVIO.</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="navbar-nav ml-auto">
      
        <li class="nav-item">
          <a class="nav-link " href="dashboard.php">All Bookings</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="create-tours.php">Create A Tour</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="tours.php">Manage Tours</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="users.php">Manage Users</a>
        </li>
      </ul>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
      
        
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="container mt-5">
    <h2>Delete Tour</h2>

    <?php if (isset($errorMessage)) : ?>
      <div class="alert alert-danger"><?php echo $errorMessage; ?></div>
    <?php endif; ?>

    <p>Are you sure you want to delete this tour?</p>

    <form method="POST" action="delete_tour.php?id=<?php echo $tourId; ?>">
      <button type="submit" class="btn btn-danger">Delete Tour</button>
      <a href="tours.php" class="btn btn-secondary">Cancel</a>
    </form>
  </div>

  <footer class="footer">
  <nav class="navbar fixed-bottom navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand text-center" href="#">© 2023 TRAVIO. All rights reserved.</a>
  </div>


  <!-- Include Bootstrap JS -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
