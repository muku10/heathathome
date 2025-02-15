<?php
$con = mysqli_connect('localhost', 'root', '', 'healthathome');
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if (isset($_GET['record_id']) && isset($_GET['status'])) {
    $recordId = $_GET['record_id'];
    $status = $_GET['status'];

    // Fetch the record from the jobform table
    $sql = "SELECT * FROM jobform WHERE id = $recordId";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Determine the target table based on the status
        if ($status === 'Accepted') {
            $targetTable = 'accepted_jobs';
        } elseif ($status === 'Rejected') {
            $targetTable = 'rejected_jobs';
        } else {
            echo "Invalid status.";
            exit;
        }

        // Insert the record into the target table
        $insertSql = "INSERT INTO $targetTable (id, name, email, phone, position, address, message, resume)
                      VALUES ('{$row['id']}', '{$row['name']}', '{$row['email']}', '{$row['phone']}', '{$row['position']}', '{$row['address']}', '{$row['message']}', '{$row['resume']}')";

        if ($con->query($insertSql) === TRUE) {
            // Remove the record from jobform (do not delete, just exclude in the dashboard)
            echo "success";
        } else {
            echo "Error inserting record: " . $con->error;
        }
    } else {
        echo "Record not found.";
    }
} else {
    echo "Invalid parameters.";
}

$con->close();
