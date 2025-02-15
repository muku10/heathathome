<?php
include 'db.php'; // Include the database connection

// Check if the job ID is provided in the URL
if (isset($_GET['id'])) {
    $job_id = $_GET['id'];

    // Fetch the job details from the database
    $sql = "SELECT * FROM jobs WHERE id = $job_id";
    $result = mysqli_query($conn, $sql);

    // Check if the job exists
    if (mysqli_num_rows($result) > 0) {
        $job = mysqli_fetch_assoc($result);
    } else {
        echo "<script>alert('Job not found.'); window.location.href='admin_jobs.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('Invalid job ID.'); window.location.href='admin_jobs.php';</script>";
    exit();
}

// Handle update action
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $openings = $_POST['openings'];
    $job_type = $_POST['job_type'];
    $qualification = $_POST['qualification']; // Added qualification field
    $shift = $_POST['shift'];
    $published_date = $_POST['published_date'];

    // Validate inputs
    if (!empty($title) && !empty($openings) && !empty($job_type) && !empty($qualification) && !empty($shift) && !empty($published_date)) {
        $sql = "UPDATE jobs SET title = '$title', openings = '$openings', job_type = '$job_type', qualification = '$qualification', shift = '$shift', published_date = '$published_date' WHERE id = $job_id";
        
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Job updated successfully'); window.location.href='admin_jobs.php';</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "<script>alert('All fields are required');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Job - Admin Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Edit Job</h2>

        <!-- Edit Job Form -->
        <form method="POST" action="">
            <div class="form-group">
                <label>Job Title</label>
                <input type="text" class="form-control" name="title" value="<?php echo $job['title']; ?>" required>
            </div>
            <div class="form-group">
                <label>Number of Openings</label>
                <input type="number" class="form-control" name="openings" value="<?php echo $job['openings']; ?>" required>
            </div>
            <div class="form-group">
                <label>Job Type</label>
                <select class="form-control" name="job_type" required>
                    <option value="Full-Time" <?php if ($job['job_type'] == 'Full-Time') echo 'selected'; ?>>Full-Time</option>
                    <option value="Part-Time" <?php if ($job['job_type'] == 'Part-Time') echo 'selected'; ?>>Part-Time</option>
                    <option value="Remote" <?php if ($job['job_type'] == 'Remote') echo 'selected'; ?>>Remote</option>
                    <option value="On-Site" <?php if ($job['job_type'] == 'On-Site') echo 'selected'; ?>>On-Site</option>
                </select>
            </div>
            <div class="form-group">
                <label>Qualification</label>
                <select class="form-control" name="qualification" required>
                    <option value="Master's Degree" <?php if ($job['qualification'] == "Master's Degree") echo 'selected'; ?>>Master's Degree</option>
                    <option value="Bachelor's Degree" <?php if ($job['qualification'] == "Bachelor's Degree") echo 'selected'; ?>>Bachelor's Degree</option>
                    <option value="PhD" <?php if ($job['qualification'] == 'PhD') echo 'selected'; ?>>PhD</option>
                </select>
            </div>
            <div class="form-group">
                <label>Shift</label>
                <select class="form-control" name="shift" required>
                    <option value="Morning" <?php if ($job['shift'] == 'Morning') echo 'selected'; ?>>Morning</option>
                    <option value="Afternoon" <?php if ($job['shift'] == 'Afternoon') echo 'selected'; ?>>Afternoon</option>
                    <option value="Night" <?php if ($job['shift'] == 'Night') echo 'selected'; ?>>Night</option>
                </select>
            </div>
            <div class="form-group">
                <label>Published Date</label>
                <input type="date" class="form-control" name="published_date" value="<?php echo $job['published_date']; ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Job</button>
            <a href="admin_job_view.php" class="btn btn-secondary ml-3">Back to Job List</a>
        </form>
    </div>
</body>
</html>

<?php
mysqli_close($conn);
?>
