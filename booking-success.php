<!DOCTYPE html>
<html>
<head>
  <title>Booking Success - TRAVIO.</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    html,
    body {
      height: 100%;
    }

    .wrapper {
      min-height: 100%;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }

    .content {
      text-align: center;
    }

    
    .icon {
      font-size: 48px;
      margin-bottom: 20px;
    }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <a class="navbar-brand" href="#">Travel Webpage</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="navbar-nav ml-auto">
      
        <li class="nav-item">
          <a class="nav-link" href="dashboard.php">Book A Tour</a>
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
  <div class="wrapper">
    <div class="content">
      <h2><span class="icon">&#10003;</span> Booking Successful!</h2>
      <p>Thank you for booking a tour with TRAVIO.</p>
      <p>Your booking has been confirmed. We will contact you shortly with further details. Please check your email.</p>
      <a href="dashboard.php" class="btn btn-primary">Back to Dashboard</a>
    </div>
    
  </div>
  <footer class="footer">
  <nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand text-center" href="index.html">© 2023 TRAVIO. All rights reserved.</a>
  </div>

    </footer>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
