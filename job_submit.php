<?php
// Database connection
$con = mysqli_connect('localhost', 'root', '', 'healthathome');

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Collect form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$position = $_POST['position'];
$address = $_POST['address'];
$message = $_POST['message'];
$date = $_POST['date'];

// Handle file upload
if (isset($_FILES['resume']) && $_FILES['resume']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = 'uploads/';
    $resume = $_FILES['resume']['name'];
    $uploadFile = $uploadDir . basename($resume);
    $fileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));
    $allowedTypes = array('pdf', 'doc', 'docx'); // Add other allowed types if needed

    // Check for file upload errors
    if ($_FILES['resume']['error'] !== UPLOAD_ERR_OK) {
        die("Error uploading file: " . $_FILES['resume']['error']);
    }

    // Validate file type
    if (!in_array($fileType, $allowedTypes)) {
        die("Invalid file type. Only PDF, DOC, and DOCX files are allowed.");
    }

    // Validate file size (e.g., 5MB max)
    if ($_FILES['resume']['size'] > 5 * 1024 * 1024) {
        die("File size exceeds the 5MB limit.");
    }

    // Move the uploaded file
    if (move_uploaded_file($_FILES['resume']['tmp_name'], $uploadFile)) {
        // File upload successful, prepare the query
        $query = $con->prepare("INSERT INTO jobform (name, email, phone, position, address, resume, message, date) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $query->bind_param("ssssssss", $name, $email, $phone, $position, $address, $resume, $message, $date);

        // Execute the query
        if ($query->execute()) {
            echo "<script>alert('Form submitted successfully!'); window.location.href='job-vacancy.php';</script>";
        } else {
            echo "Error: " . $query->error;
        }
    } else {
        echo "Error uploading file.";
    }
} else {
    echo "File upload error or file not selected.";
}

// Close the connection
mysqli_close($con);
?>
