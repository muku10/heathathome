<?php
// Include the database connection
include('db_connection.php');

// Start session
session_start();

// Check if the 'username' parameter exists in the URL query string
if (isset($_GET['username'])) {
    $username = $_GET['username']; // Get the username from the query string

    // Prepare SQL query to extract personal information based on the username
    $query = "SELECT * FROM personal_info WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username); // 's' denotes string type
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if a record is found
    if ($result->num_rows > 0) {
        // Fetch data
        $personal_info = $result->fetch_assoc();
    } else {
        echo "No record found for the given username.";
    }

    // Close the statement
    $stmt->close();
} else {
    echo "No username provided in the URL.";
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

    <div class="profile-container">
        <div class="profile-card">
            <h2 class="profile-title">Profile Details</h2>
            <?php if (isset($personal_info)): ?>
                <div class="profile-section">
                    <h3>Personal Information</h3>
                    <p><strong>Full Name:</strong> <?php echo htmlspecialchars($personal_info['fullname']); ?></p>
                    <p><strong>Birth:</strong> <?php echo htmlspecialchars($personal_info['birth']); ?></p>
                    <p><strong>Gender:</strong> <?php echo htmlspecialchars($personal_info['gender']); ?></p>
                    <p><strong>Address:</strong> <?php echo htmlspecialchars($personal_info['address']); ?></p>
                    <p><strong>Phone:</strong> <?php echo htmlspecialchars($personal_info['phone']); ?></p>
                    <p><strong>Email:</strong> <?php echo htmlspecialchars($personal_info['email']); ?></p>
                </div>

                <div class="profile-section">
                    <h3>Username & Summary</h3>
                    <p><strong>Username:</strong> <?php echo htmlspecialchars($personal_info['username']); ?></p>
                    <p><strong>Summary:</strong> <?php echo nl2br(htmlspecialchars($personal_info['summary'])); ?></p>
                </div>

                <div class="profile-section">
                    <h3>Emergency Contact</h3>
                    <p><strong>Contact Name:</strong> <?php echo htmlspecialchars($personal_info['contact_name']); ?></p>
                    <p><strong>Relationship:</strong> <?php echo htmlspecialchars($personal_info['relationship']); ?></p>
                    <p><strong>Contact Phone:</strong> <?php echo htmlspecialchars($personal_info['contact_phone']); ?></p>
                </div>

                <div class="profile-section">
                    <h3>Documents</h3>
                    <p><strong>CV:</strong> <a href="uploads/<?php echo htmlspecialchars($personal_info['cv']); ?>" target="_blank">View CV</a></p>
                    <p><strong>Cover Letter:</strong> <a href="uploads/<?php echo htmlspecialchars($personal_info['cover_letter']); ?>" target="_blank">View Cover Letter</a></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
<?php include 'footer.php';?>

</html>
