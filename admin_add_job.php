<?php
include 'db.php'; // Include the database connection

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $title = $_POST['title'];
    $openings = $_POST['openings'];
    $job_type = $_POST['job_type'];
    $qualification = $_POST['qualification'];
    $shift = $_POST['shift'];
    $published_date = $_POST['published_date'];

    // Validate inputs
    if (!empty($title) && !empty($openings) && !empty($job_type) && !empty($qualification) && !empty($shift) && !empty($published_date)) {
        // Use prepared statements to prevent SQL injection
        $sql = "INSERT INTO jobs (title, openings, job_type, qualification, shift, published_date) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sissss", $title, $openings, $job_type, $qualification, $shift, $published_date);
        $success = mysqli_stmt_execute($stmt);

        if ($success) {
            echo "<script>alert('Job added successfully'); window.location.href='admin_job_view.php';</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "<script>alert('All fields are required');</script>";
    }
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Job - Admin Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Add New Job</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label>Job Title</label>
                <input type="text" class="form-control" name="title" required>
            </div>
            <div class="form-group">
                <label>Number of Openings</label>
                <input type="number" class="form-control" name="openings" required>
            </div>
            <div class="form-group">
                <label>Job Type</label>
                <select class="form-control" name="job_type">
                    <option value="Full-Time">Full-Time</option>
                    <option value="Part-Time">Part-Time</option>
                    <option value="Remote">Remote</option>
                    <option value="On-Site">On-Site</option>
                </select>
            </div>
            <div class="form-group">
                <label>Qualification</label>
                <select class="form-control" name="qualification" required>
                    <option value="Master's Degree">Master's Degree</option>
                    <option value="Bachelor's Degree">Bachelor's Degree</option>
                    <option value="PhD">PhD</option>
                </select>
            </div>
            <div class="form-group">
                <label>Shift</label>
                <select class="form-control" name="shift">
                    <option value="Morning">Morning</option>
                    <option value="Afternoon">Afternoon</option>
                    <option value="Night">Night</option>
                </select>
            </div>
            <div class="form-group">
                <label>Published Date</label>
                <input type="date" class="form-control" name="published_date" required>
            </div>

            <button type="submit" class="btn btn-primary">Add Job</button>
        </form>
    </div>
</body>
</html>
<?php
mysqli_close($conn);
?>
