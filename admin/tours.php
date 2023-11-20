<!DOCTYPE html>
<html>
<head>
  <title>Book a Tour - TRAVIO.</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .container {
      max-width: 800px;
      margin-top: 50px;
    }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">TRRAVIO.</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="navbar-nav ml-auto">
      
        <li class="nav-item">
          <a class="nav-link " href="dashboard.php">List Bookings & Tours</a>
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
  <div class="container">
    
    <?php

include '../db/db_connection.php';



$stmt = $connection->query("SELECT * FROM tours");

if ($stmt->rowCount() > 0) {
  $tours = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
  $tours = [];
}

?>

<h2 class="mt-5">Tours</h2>
<?php if (empty($tours)) : ?>
  <div class="alert alert-info">No tours found !.</div>
<?php else : ?>
  <table class="table">
    <thead>
      <tr>
        <th>Tour ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Actions</th> 
      </tr>
    </thead>
    <tbody>
      <?php foreach ($tours as $tour) : ?>
        <tr>
          <td><?php echo $tour['id']; ?></td>
          <td><?php echo $tour['name']; ?></td>
          <td><?php echo $tour['description']; ?></td>
          <td><?php echo $tour['price']; ?></td>
          <td>
            <a href="edit_tour.php?id=<?php echo $tour['id']; ?>" class="btn btn-primary">Edit</a>
            <a href="delete_tour.php?id=<?php echo $tour['id']; ?>" class="btn btn-danger">Delete</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<?php endif; ?>


  </div>
  <footer class="footer">
  <nav class="navbar fixed-bottom navbar-light bg-success">
  <div class="container-fluid">
    <a class="navbar-brand text-center" href="#">© 2023 TRAVIO. All rights reserved.</a>
  </div>

    </footer>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
