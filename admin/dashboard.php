<!DOCTYPE html>
<html>
<head>
  <title>Book a Tour - TRAVIO.</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://kit.fontawesome.com/fdd776d634.js" crossorigin="anonymous"></script>
  <style>
    .container {
      max-width: 800px;
      margin-top: 50px;
    }
  </style>
</head>
<body>
  
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">TRAVIO.</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="navbar-nav ml-auto">
      
        <li class="nav-item">
          <a class="nav-link active" href="dashboard.php">All Bookings</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="create-tours.php">Create A Tour</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tours.php">Manage Tours</a>
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
  <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm">
          <div class="card-header py-3  text-white bg-success border-primary">
            <h4 class="my-0 fw-normal">Create A Tour</h4>
          </div>
          <div class="card-body">
          
           <a href="create-tours.php"> <button type="button" class="w-100 btn btn-lg btn-outline-success"> Click Here</button></a>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm">
          <div class="card-header py-3  text-white bg-success border-primary">
            <h4 class="my-0 fw-normal">Manage Tours</h4>
          </div>
          <div class="card-body">
            
          <a href="tours.php">  <button type="button" class="w-100 btn btn-lg btn-outline-success">Click Here</button></a>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm ">
          <div class="card-header py-3 text-white bg-success border-primary">
            <h4 class="my-0 fw-normal">Manage Users</h4>
          </div>
          <div class="card-body">
          <a href="users.php"><button type="button" class="w-100 btn btn-lg btn-outline-success">Click Here</button></a>
          </div>
        </div>
      </div>
    </div>
    <h2 class="mb-3">All Bookings </h2>
    <?php

include '../db/db_connection.php';


$sql = "SELECT bookings.id, users.username AS user_name, tours.name AS tour_name, bookings.booking_date
        FROM bookings
        JOIN users ON bookings.user_id = users.id
        JOIN tours ON bookings.tour_id = tours.id";
$result = $connection->query($sql);


if ($result->rowCount() > 0) {
  
  echo "<table class='table'>
          <tr>
            <th>Booking ID</th>
            <th>User Name</th>
            <th>Tour Name</th>
            <th>Booking Date</th>
          </tr>";
  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['user_name']}</td>
            <td>{$row['tour_name']}</td>
            <td>{$row['booking_date']}</td>
          </tr>";
  }
  echo "</table>";
} else {
  echo "No bookings found.";
}

?>


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
