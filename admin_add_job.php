<?php
include 'db.php'; // Include the database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $openings = $_POST['openings'];
    $job_type = $_POST['job_type'];
    $shift = $_POST['shift'];
    $published_date = $_POST['published_date'];
    

    // Validate inputs
    if (!empty($title) && !empty($openings) && !empty($job_type) && !empty($shift) && !empty($published_date) ) {
        $sql = "INSERT INTO jobs (title, openings, job_type, shift, published_date) 
                VALUES ('$title', '$openings', '$job_type', '$shift', '$published_date')";
        
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Job added successfully'); window.location.href='admin_add_job.php';</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "<script>alert('All fields are required');</script>";
    }
}

mysqli_close($conn);
?>

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
