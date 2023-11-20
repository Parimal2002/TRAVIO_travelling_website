<?php

if (!isset($_GET['id'])) {
  
  header("Location: tours.php"); 
  exit;
}


require_once "../db/db_connection.php";


$tourId = $_GET['id'];


$stmt = $connection->prepare("SELECT * FROM tours WHERE id = :id");
$stmt->bindParam(':id', $tourId);
$stmt->execute();
$tour = $stmt->fetch(PDO::FETCH_ASSOC);


if (!$tour) {
  
  header("Location: tours.php"); 
  exit;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
  $updatedName = $_POST['name'];
  $updatedDescription = $_POST['description'];
  $updatedPrice = $_POST['price'];

  
  $updateStmt = $connection->prepare("UPDATE tours SET name = :name, description = :description, price = :price WHERE id = :id");
  $updateStmt->bindParam(':name', $updatedName);
  $updateStmt->bindParam(':description', $updatedDescription);
  $updateStmt->bindParam(':price', $updatedPrice);
  $updateStmt->bindParam(':id', $tourId);
  
  if ($updateStmt->execute()) {
    
    header("Location: tours.php"); 
    exit;
  } else {
    
    $errorMessage = "Failed to update the tour. Please try again.";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Tour</title>
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
          <a class="nav-link" href="dashboard.php">List Bookings & Tours</a>
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
    <h2>Edit Tour</h2>

    <?php if (isset($errorMessage)) : ?>
      <div class="alert alert-danger"><?php echo $errorMessage; ?></div>
    <?php endif; ?>

    <form method="POST" action="edit_tour.php?id=<?php echo $tourId; ?>">
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name" value="<?php echo $tour['name']; ?>" required>
      </div>

      <div class="form-group">
        <label for="description">Description:</label>
        <textarea class="form-control" id="description" name="description" required><?php echo $tour['description']; ?></textarea>
      </div>

      <div class="form-group">
        <label for="price">Price:</label>
        <input type="number" class="form-control" id="price" name="price" value="<?php echo $tour['price']; ?>" required>
      </div>

      <button type="submit" class="btn btn-primary">Update Tour</button>
    </form>
  </div>
  <footer class="footer">
  <nav class="navbar fixed-bottom  navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand text-center" href="#">© 2023 TRAVIO. All rights reserved.</a>
  </div>

  <!-- Include Bootstrap JS -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
