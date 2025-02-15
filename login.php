<?php
// Include the database connection
include('db_connection.php'); 

if (isset($_GET['error'])) {
    $error_message = $_GET['error'] == 'incorrect_email' ? 'No account found with that email.' : 'Incorrect password.';
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Health Hire - Index</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
</head>
<body>
<?php include 'navbar.php';?>

    <div class="login-page">
        <div class="login-box">
            <h2>Login</h2>
            <form action="login_handler.php" method="POST">
                <div class="input-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required placeholder="Enter your email">
                </div>

                <div class="input-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required placeholder="Enter your password">
                </div>

                <button type="submit" name="login" class="btn-login">Login</button>
            </form>

            <p class="register-link">Don't have an account? <a href="register.php">Register here</a></p>

            <!-- Display error message if login failed -->
            <?php if (isset($error_message)): ?>
                <p class="error-message"><?php echo $error_message; ?></p>
            <?php endif; ?>
        </div>
    </div>
    <?php include 'footer.php';?>

</body>
</html>
