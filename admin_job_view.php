<?php
include 'db.php'; // Include the database connection

// Handle delete action
if (isset($_GET['delete'])) {
    $job_id = $_GET['delete'];
    $sql = "DELETE FROM jobs WHERE id = $job_id";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Job deleted successfully'); window.location.href='admin_jobs.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Get all jobs from the database
$sql = "SELECT * FROM jobs";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Manage Jobs</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
    
    <div class="container mt-5">
        <h2 class="text-center">Manage Jobs</h2>
        
        <!-- Table to display all jobs -->
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Job Title</th>
                    <th>Openings</th>
                    <th>Job Type</th>
                    <th>Shift</th>
                    <th>Published Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Check if there are jobs in the database
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['title'] . "</td>";
                        echo "<td>" . $row['openings'] . "</td>";
                        echo "<td>" . $row['job_type'] . "</td>";
                        echo "<td>" . $row['shift'] . "</td>";
                        echo "<td>" . $row['published_date'] . "</td>";
                        echo "<td>
                            <a href='admin_edit_job.php?id=" . $row['id'] . "' class='btn btn-warning'>Edit</a>
                            <a href='admin_jobs.php?delete=" . $row['id'] . "' class='btn btn-danger' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                        </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7' class='text-center'>No jobs available.</td></tr>";
                }
                ?>
            </tbody>
        </table>
        
        <a href="admin_add_job.php" class="btn btn-success">Add New Job</a>
    </div>
</body>
</html>

<?php
mysqli_close($conn);
?>
