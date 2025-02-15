<?php
// Include the database connection
include('db_connection.php'); 

session_start();

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Create a prepared statement to avoid SQL injection
    $stmt = $conn->prepare("SELECT * FROM register WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if email exists in the register table
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Compare the plain text password
        if ($password === $row['password']) {
            // Password is correct, set session variables
            $_SESSION['user_id'] = $row['id']; // Assuming 'id' is the primary key in the register table
            $_SESSION['email'] = $row['email'];
            $_SESSION['role'] = $row['role']; // Store the user's role in the session
            $_SESSION['username'] = $row['username']; // Assuming there's a 'username' column in the register table

            // Check the role of the user before anything else
            if ($_SESSION['role'] === 'admin') {
                // If role is admin, redirect to the admin dashboard
                header('Location: dashboard.php');
                exit();
            }

            // Check if the email exists in the personal_info table
            $stmt_info = $conn->prepare("SELECT * FROM personal_info WHERE email = ?");
            $stmt_info->bind_param("s", $email);
            $stmt_info->execute();
            $result_info = $stmt_info->get_result();

            if ($result_info->num_rows == 0) {
                // Email is not found in personal_info table, redirect to the details page
                header('Location: detail.php');
                exit();
            }

            // Store login attempt information in the login table
            $login_time = date('Y-m-d H:i:s'); // Current timestamp
            $user_id = $row['id']; // User's id from the register table
            $stmt_login = $conn->prepare("INSERT INTO login (user_id, email, login_time) VALUES (?, ?, ?)");
            $stmt_login->bind_param("iss", $user_id, $email, $login_time);
            $stmt_login->execute();

            // Redirect to the user profile page
            $username = $_SESSION['username']; // Fetch the username from the session
            header('Location: profile.php?username=' . $username);
            exit();

        } else {
            // Incorrect password
            header('Location: login.php?error=incorrect_password');
            exit();
        }
    } else {
        // No account found with the provided email, redirect to the register page
        header('Location: register.php');
        exit();
    }
}
?>
