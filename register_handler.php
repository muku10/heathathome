<?php
require 'config.php'; // Include database connection

if (isset($_POST['submit'])) {
    // Sanitize input data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $role = mysqli_real_escape_string($conn, $_POST['role']); // Capture the role

    // Check for duplicate records
    $duplicate = mysqli_query($conn, "SELECT * FROM register WHERE email='$email' OR username='$username'");
    if (mysqli_num_rows($duplicate) > 0) {
        echo "<script>alert('Email or Username already taken');</script>";
    } else {
        if ($password === $confirm_password) {
            // Store the password as plain text (no hashing)
            // Insert data into the database, including the role
            $query = "INSERT INTO register (name, email, username, password, confirm_password, role) VALUES ('$name', '$email', '$username', '$password', '$confirm_password', '$role')";
            if (mysqli_query($conn, $query)) {
                echo "<script>alert('Registration Successful');</script>";
                header("Location: detail.php");
                exit();
            } else {
                echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
            }
        } else {
            echo "<script>alert('Passwords do not match');</script>";
        }
    }
}
?>
