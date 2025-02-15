<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register - Health At Home</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php include 'navbar.php';?>

  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card register-card">
          <div class="card-header text-center">
            <h2 class="register-title">Register</h2>
          </div>
          <div class="card-body">
            <form action="register_handler.php" method="POST">
              <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" class="form-control register-input" id="name" name="name" required>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control register-input" id="email" name="email" required>
              </div>
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control register-input" id="username" name="username" required>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control register-input" id="password" name="password" required>
              </div>
              <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" class="form-control register-input" id="confirm_password" name="confirm_password" required>
              </div>
              <div class="form-group">
  <label for="role">Role</label>
  <select class="form-control register-input" id="role" name="role" required>
    <option value="user">User</option>
    <option value="admin">Admin</option>
  </select>
</div>
              <button type="submit" name="submit" class="btn register-btn btn-block mt-4">Register</button>
            </form>
          </div>
          <div class="card-footer text-center">
            <a href="login.php" class="register-link">Already have an account? Login here</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include 'footer.php';?>


  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
