<?php
$servername = "localhost";
$username = "root";  // Use your phpMyAdmin username
$password = "";      // Use your phpMyAdmin password
$dbname = "healthathome"; // Database name you created

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submitted'])) {
    // Collect form data
    $fullname = $_POST['fullname'];
    $birth = $_POST['birth'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $summary = $_POST['summary'];
    $contact_name = $_POST['contact_name'];
    $relationship = $_POST['relationship'];
    $contact_phone = $_POST['contact_phone'];

    // Handle file upload for CV
    $cv = $_FILES['cv']['name'];
    $cover_letter = $_FILES['cover_letter']['name'];

    // Define upload directory
    $uploadDir = 'uploads/';

    // Move uploaded files
    if (move_uploaded_file($_FILES['cv']['tmp_name'], $uploadDir . $cv) &&
        move_uploaded_file($_FILES['cover_letter']['tmp_name'], $uploadDir . $cover_letter)) {
        
        // Insert form data into the database
        $sql = "INSERT INTO personal_info (fullname, birth, gender, address, phone, email, username, summary, contact_name, relationship, contact_phone, cv, cover_letter)
                VALUES ('$fullname', '$birth', '$gender', '$address', '$phone', '$email', '$username', '$summary', '$contact_name', '$relationship', '$contact_phone', '$cv', '$cover_letter')";

        if ($conn->query($sql) === TRUE) {
            echo "Information submitted successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error uploading files.";
    }
}

// Close the database connection
$conn->close();
?>
