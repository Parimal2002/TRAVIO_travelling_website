<?php

include '../db/db_connection.php';


$name = $description = $price = $duration = $location = '';
$success = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 
  $name = $_POST['name'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $duration = $_POST['duration'];
  $location = $_POST['location'];

  $stmt = $connection->prepare("INSERT INTO tours (name, description, price, duration, location) VALUES (?, ?, ?, ?, ?)");
  $stmt->execute([$name, $description, $price, $duration, $location]);

  
  if ($stmt->rowCount() > 0) {
    $success = "Tour created successfully!";
    
   
    $name = $description = $price = $duration = $location = '';
  } else {
    $error = "Failed to create tour. Please try again.";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Create Tour - Admin Dashboard</title>
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
          <a class="nav-link " href="dashboard.php">List Bookings & Tours</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="create-tours.php">Create A Tour</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="tours.php">Manage Tours</a>
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
    <h2>Create Tour</h2>
    <?php if (!empty($success)) : ?>
      <div class="alert alert-success"><?php echo $success; ?></div>
    <?php endif; ?>
    <?php if (!empty($error)) : ?>
      <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>" required>
      </div>
      <div class="form-group">
        <label for="description">Description:</label>
        <textarea class="form-control" id="description" name="description" required><?php echo $description; ?></textarea>
      </div>
      <div class="form-group">
        <label for="price">Price:</label>
        <input type="number" class="form-control" id="price" name="price" step="0.01" value="<?php echo $price; ?>" required>
      </div>
      <div class="form-group">
        <label for="duration">Duration (in days):</label>
        <input type="number" class="form-control" id="duration" name="duration" value="<?php echo $duration; ?>" required>
      </div>
      <div class="form-group">
        <label for="location">Location:</label>
        <input type="text" class="form-control" id="location" name="location" value="<?php echo $location; ?>" required>
      </div>
      <button type="submit" class="btn btn-primary">Create</button>
    </form>
  </div>

  </div>
  <footer class="footer mt-5">
  <nav class="navbar  navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand text-center" href="index.html">© 2023 TRAVIO. All rights reserved.</a>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
