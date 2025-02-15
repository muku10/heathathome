<?php
session_start(); // Start the session to store removed IDs

$con = mysqli_connect('localhost', 'root', '', 'healthathome');
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['status'])) {
    $recordId = $_POST['record_id'];
    $status = $_POST['status'];

    // Fetch the record from the jobform table
    $sql = "SELECT * FROM jobform WHERE id = $recordId";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Determine the target table based on the status
        if ($status === 'Accept') {
            $targetTable = 'accepted_jobs';
        } elseif ($status === 'Reject') {
            $targetTable = 'rejected_jobs';
        }

        // Insert the record into the target table
        $insertSql = "INSERT INTO $targetTable (id, name, email, phone, position, address, resume, message, date)
                      VALUES ('{$row['id']}', '{$row['name']}', '{$row['email']}', '{$row['phone']}', '{$row['position']}', '{$row['address']}', '{$row['resume']}', '{$row['message']}', '{$row['date']}')";

        if ($con->query($insertSql) === TRUE) {
            // Add the ID to the session so it won't be displayed again
            $_SESSION['removed_ids'][] = $recordId;

            // Redirect to job-dashboard.php
            header("Location: job-dashboard.php");
            exit(); // Ensure no further code is executed
        }
    }
}

// Build the query to fetch records, excluding those that have been removed
$search = isset($_GET['search']) ? mysqli_real_escape_string($con, $_GET['search']) : '';
$sortBy = isset($_GET['sort']) ? $_GET['sort'] : '';

$sql = "SELECT * FROM jobform WHERE (name LIKE '%$search%' OR position LIKE '%$search%' OR address LIKE '%$search%' OR message LIKE '%$search%')";

// Exclude removed IDs
if (isset($_SESSION['removed_ids']) && !empty($_SESSION['removed_ids'])) {
    $removedIds = implode(',', $_SESSION['removed_ids']);
    $sql .= " AND id NOT IN ($removedIds)";
}

if ($sortBy == 'position') {
    $sql .= " ORDER BY position, name";
} elseif ($sortBy == 'address') {
    $sql .= " ORDER BY address, name";
} elseif ($sortBy == 'date') {
    $sql .= " ORDER BY date DESC";
}

$result = $con->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Health At Home - Job Dashboard</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
</head>
<body>

    <div class="logo">
        <a class="navbar-brand" href="index.php">
            <img src="images/logo.png" alt="Health At Home Logo" height="40">
        </a>
    </div>

    <div class="dashboard-container">
        <h2 class="text-center">Job Applications Dashboard</h2>

        <!-- Search Bar -->
        <div class="search-bar">
            <form method="GET" action="">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search by name, position, address, or message..." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                    <div class="input-group-append">
                        <button class="btn custom-btn custom-btn-primary" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Buttons for Sorting -->
        <div class="d-flex justify-content-center mb-3">
            <form method="GET" action="">
                <input type="hidden" name="search" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                <button type="submit" name="sort" value="position" class="custom-btn 
<?php 
    if(isset($_GET['sort']) && $_GET['sort'] == 'position') {
        echo 'custom-btn-active';
    } else {
        echo 'custom-btn-inactive';
    }
?>">Sort by Position</button>
                <button type="submit" name="sort" value="address" class="custom-btn 
<?php 
    if(isset($_GET['sort']) && $_GET['sort'] == 'address') {
        echo 'custom-btn-active';
    } else {
        echo 'custom-btn-inactive';
    }
?>">Sort by Address</button>
                <button type="submit" name="sort" value="date" class="custom-btn 
<?php 
    if(isset($_GET['sort']) && $_GET['sort'] == 'date') {
        echo 'custom-btn-active';
    } else {
        echo 'custom-btn-inactive';
    }
?>">Sort by Date</button>
            </form>
        </div>

        <!-- Job Table -->
        <div class="table-container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Position</th>
                        <th>Address</th>
                        <th>Resume</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['id']); ?></td>
                            <td><?php echo htmlspecialchars($row['name']); ?></td>
                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                            <td><?php echo htmlspecialchars($row['phone']); ?></td>
                            <td><?php echo htmlspecialchars($row['position']); ?></td>
                            <td><?php echo htmlspecialchars($row['address']); ?></td>
                            <td>
                                <!-- Assuming resumes are stored in 'uploads' directory -->
                                <a href="uploads/<?php echo htmlspecialchars($row['resume']); ?>" target="_blank">
                                    View Resume
                                </a>
                            </td>
                            <td><?php echo htmlspecialchars($row['message']); ?></td>
                            <td><?php echo htmlspecialchars($row['date']); ?></td>
                            <td>
                                <form method="POST" action="" style="display:inline;">
                                    <input type="hidden" name="record_id" value="<?php echo htmlspecialchars($row['id']); ?>">
                                    <button type="submit" name="status" value="Accept" class="btn btn-success">Accept</button>
                                    <button type="submit" name="status" value="Reject" class="btn btn-danger">Reject</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
</body>
</html>

<?php
$con->close();
?>
