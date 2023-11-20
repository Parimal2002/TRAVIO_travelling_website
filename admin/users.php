<?php

include '../db/db_connection.php';


function sanitizeInput($input) {
  return htmlspecialchars(trim($input));
}


$stmt = $connection->query("SELECT * FROM users WHERE id!=2");


if ($stmt->rowCount() > 0) {
  $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
  $users = [];
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
  $id = $_POST['id'];
  $name = sanitizeInput($_POST['name']);
  
 
  $stmt = $connection->prepare("UPDATE users SET username = ? WHERE id = ?");
  $stmt->execute([$name, $id]);
  
  header("Location: users.php");
  exit;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
  $id = $_POST['id'];
  
  $stmt = $connection->prepare("DELETE FROM users WHERE id = ?");
  $stmt->execute([$id]);
  
  
  header("Location: users.php");
  exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Users - Admin Dashboard</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
          <a class="nav-link" href="tours.php">Manage Tours</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="users.php">Manage Users</a>
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
    <h2>Users</h2>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Password</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($users as $user) : ?>
          <tr>
            <td><?php echo $user['id']; ?></td>
            <td><?php echo $user['username']; ?></td>
            <td><?php echo $user['password']; ?></td>
            <td>
              <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal<?php echo $user['id']; ?>">Edit</button>
              <form method="POST" style="display: inline-block;">
                <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                <button type="submit" name="delete" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
              </form>
            </td>
          </tr>
          
          <div class="modal fade" id="editModal<?php echo $user['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel<?php echo $user['id']; ?>" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="editModalLabel<?php echo $user['id']; ?>">Edit User</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="POST">
                    <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                    <div class="form-group">
                      <label for="name">Username:</label>
                      <input type="text" class="form-control" id="name" name="name" value="<?php echo $user['username']; ?>" required>
                    </div>
                    
                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <footer class="footer">
    <nav class="navbar fixed-bottom navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand text-center" href="index.html">© 2023 TRAVIO. All rights reserved.</a>
      </div>

  </footer>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
