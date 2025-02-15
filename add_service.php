<?php
// Start session for authentication (optional)
session_start();
/*
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit;
} */

include 'db.php'; // Include your DB connection

// Handle form submission for adding/editing services
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = $_POST['image']; // In practice, this should handle file uploads
    

    if (isset($_POST['edit'])) {
        // Update service
        $sql = "UPDATE services SET title='$title', description='$description', image='$image',  WHERE id=" . $_POST['edit'];
    } else {
        // Insert new service
        $sql = "INSERT INTO services (title, description, image, link) VALUES ('$title', '$description', '$image')";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Service added/updated successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Get services from the database
$sql = "SELECT * FROM services";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel - Manage Services</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
<?php include 'navbar.php'; ?>

<div class="container mt-5">
    <h2 class="text-center">Admin Panel - Manage Services</h2>
    
    <!-- Form to Add or Edit a Service -->
    <div class="mt-4">
        <h4>Add/Edit Service</h4>
        <form method="POST" action="add_service.php">
            <div class="form-group">
                <label for="title">Service Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="description">Service Description</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>
            <div class="form-group">
                <label for="image">Image URL</label>
                <input type="text" class="form-control" id="image" name="image" required>
            </div>
         
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <h4 class="mt-5">Existing Services</h4>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>
                <th>Link</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['title'] . "</td>";
                    echo "<td>" . $row['description'] . "</td>";
                    echo "<td><img src='" . $row['image'] . "' alt='" . $row['title'] . "' width='50'></td>";
                    echo "<td><a href='" . $row['link'] . "' target='_blank'>View</a></td>";
                    echo "<td>
                        <a href='add_service.php?edit=" . $row['id'] . "' class='btn btn-warning'>Edit</a>
                        <a href='add_service.php?delete=" . $row['id'] . "' class='btn btn-danger'>Delete</a>
                    </td>";
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>
</div>

<?php
// Handle Delete Service
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM services WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Service deleted successfully.";
        header("Location: add_service.php"); // Refresh to reflect changes
    } else {
        echo "Error: " . $conn->error;
    }
}

// Handle Edit Service (pre-populate the form)
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $sql = "SELECT * FROM services WHERE id=$id";
    $result = $conn->query($sql);
    $service = $result->fetch_assoc();
    // Pre-fill form with existing data
    echo "<script>
        document.getElementById('title').value = '" . $service['title'] . "';
        document.getElementById('description').value = '" . $service['description'] . "';
        document.getElementById('image').value = '" . $service['image'] . "';
        document.getElementById('link').value = '" . $service['link'] . "';
    </script>";
}
?>

<?php include 'footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
