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

    // Fetch the record from the serviceform table
    $sql = "SELECT * FROM serviceform WHERE id = $recordId";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Determine the target table based on the status
        $targetTable = '';
        if ($status === 'available') {
            $targetTable = 'available_services';
        } elseif ($status === 'unavailable') {
            $targetTable = 'unavailable_services';
        }

        // Ensure the target table is set before proceeding
        if (!empty($targetTable)) {
            // Insert the record into the target table
            $insertSql = "INSERT INTO $targetTable (id, name, email, phone, service, address, message)
                          VALUES ('{$row['id']}', '{$row['name']}', '{$row['email']}', '{$row['phone']}', '{$row['service']}', '{$row['address']}', '{$row['message']}')";

            if ($con->query($insertSql) === TRUE) {
                // Add the ID to the session so it won't be displayed again
                if (!isset($_SESSION['removed_ids'])) {
                    $_SESSION['removed_ids'] = [];
                }
                $_SESSION['removed_ids'][] = $recordId;

                // Redirect to service-dashboard.php
                header("Location: service-dashboard.php");
                exit(); // Ensure no further code is executed
            } else {
                echo "Error: " . $con->error; // For debugging
            }
        } else {
            echo "Invalid status."; // For debugging
        }
    } else {
        echo "Record not found."; // For debugging
    }
}

// Build the query to fetch records, excluding those that have been removed
$search = isset($_GET['search']) ? mysqli_real_escape_string($con, $_GET['search']) : '';
$sortBy = isset($_GET['sort']) ? $_GET['sort'] : '';

$sql = "SELECT * FROM serviceform WHERE (name LIKE '%$search%' OR service LIKE '%$search%' OR address LIKE '%$search%' OR message LIKE '%$search%')";

// Exclude removed IDs
if (isset($_SESSION['removed_ids']) && !empty($_SESSION['removed_ids'])) {
    $removedIds = implode(',', $_SESSION['removed_ids']);
    $sql .= " AND id NOT IN ($removedIds)";
}

if ($sortBy == 'service') {
    $sql .= " ORDER BY service, name";
} elseif ($sortBy == 'address') {
    $sql .= " ORDER BY address, name";
} 
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Service Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>
    <div class="logo">
        <a class="navbar-brand" href="index.php">
            <img src="images/logo.png" alt="Health At Home Logo" height="40">
        </a>
    </div>

    <div class="dashboard-container">
        <h2 class="text-center">Service Requests Dashboard</h2>

        <!-- Search Bar -->
        <div class="search-bar">
            <form method="GET" action="">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search by name, service, address, or message..." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                    <div class="input-group-append">
                        <button class="btn btn-primary custom-btn" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Buttons for Sorting -->
        <div class="d-flex justify-content-center mb-3">
            <form method="GET" action="">
                <input type="hidden" name="search" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                <button type="submit" name="sort" value="service" class="custom-btn mx-2 
<?php 
    if(isset($_GET['sort']) && $_GET['sort'] == 'service') {
        echo 'custom-btn-active';
    } else {
        echo 'custom-btn-inactive';
    }
?>">Sort by Service</button>
                <button type="submit" name="sort" value="address" class="custom-btn mx-2 
<?php 
    if(isset($_GET['sort']) && $_GET['sort'] == 'address') {
        echo 'custom-btn-active';
    } else {
        echo 'custom-btn-inactive';
    }
?>">Sort by Address</button>
                
            </form>
        </div>

        <!-- Service Requests Table -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Service</th>
                    <th>Address</th>
                    <th>Message</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $isRemoved = isset($_SESSION['removed_ids']) && in_array($row['id'], $_SESSION['removed_ids']);
                        if (!$isRemoved) {
                            echo "<tr>";
                            echo "<td>{$row['id']}</td>";
                            echo "<td>{$row['name']}</td>";
                            echo "<td>{$row['email']}</td>";
                            echo "<td>{$row['phone']}</td>";
                            echo "<td>{$row['service']}</td>";
                            echo "<td>{$row['address']}</td>";
                            echo "<td>{$row['message']}</td>";
                            echo "<td>";
                            echo "<form method='POST' action='' class='d-inline'>";
                            echo "<input type='hidden' name='record_id' value='{$row['id']}'>";
                            echo "<button type='submit' name='status' value='available' class='btn btn-success'>Available</button>";
                            echo "<button type='submit' name='status' value='unavailable' class='btn btn-danger ml-2'>Unavailable</button>";
                            echo "</form>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    }
                } else {
                    echo "<tr><td colspan='8' class='text-center'>No records found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<?php $con->close(); ?>
