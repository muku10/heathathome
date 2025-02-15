<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $con = mysqli_connect('localhost', 'root', '', 'healthathome');
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    $recordId = $_POST['record_id'];
    $action = $_POST['action'];
    $status = ($action === 'accept') ? 'Accepted' : 'Rejected';

    $updateSql = "UPDATE jobform SET status = '$status' WHERE id = $recordId";
    
    if ($con->query($updateSql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $con->error;
    }

    $con->close();
}
?>
