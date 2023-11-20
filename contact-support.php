<?php

include './db/db_connection.php';


$name = $email = $message = '';
$success = false;
$error = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];


  if (empty($name) || empty($email) || empty($message)) {
    $error = 'Please fill in all the fields.';
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = 'Invalid email address.';
  } else {
   
    $stmt = $connection->prepare("INSERT INTO contacts (name, email, message) VALUES (:name, :email, :message)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':message', $message);
    $stmt->execute();

  
    $success = true;
    $name = $email = $message = '';
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Contact Support - TRAVIO.</title>
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
          <a class="nav-link " href="my-bookings.php">My Bookings</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="contact-support.php">Contact Support</a>
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
    <h2>Contact Support</h2>
    <?php if ($success) : ?>
      <div class="alert alert-success">Thank you for contacting us ! We will get back to you soon.</div>
    <?php else : ?>
      <?php if (!empty($error)) : ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
      <?php endif; ?>
      <form method="POST">
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>" required>
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
        </div>
        <div class="form-group">
          <label for="message">Message:</label>
          <textarea class="form-control" id="message" name="message" required><?php echo htmlspecialchars($message); ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    <?php endif; ?>
  </div>
  <footer class="footer">
  <nav class="navbar fixed-bottom navbar-light bg-success">
  <div class="container-fluid">
    <a class="navbar-brand text-center" href="index.html">© 2023 TRAVIO. All rights reserved.</a>
  </div>

    </footer>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
