<?php
// Database connection
$con = mysqli_connect('localhost', 'root', '', 'healthathome');

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Initialize search term variable
$searchTerm = '';

// Check if the search form was submitted
if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
}

// Fetch accepted jobs from the accepted_jobs table with search filtering
$query = "SELECT * FROM available_services";
if (!empty($searchTerm)) {
    $searchTermEscaped = mysqli_real_escape_string($con, $searchTerm);
    $query .= " WHERE name LIKE '%$searchTermEscaped%' 
                OR email LIKE '%$searchTermEscaped%'
                OR phone LIKE '%$searchTermEscaped%'
                OR position LIKE '%$searchTermEscaped%'
                OR address LIKE '%$searchTermEscaped%'";
}

$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accepted Jobs</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css"> <!-- Link your custom CSS file here -->
   <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .logo {
            text-align: center;
            margin: 20px 0;
        }

        .container {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            max-width: 85rem;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h2 {
            margin-bottom: 20px;
            color: var(--primary-color);
        }

        .custom-btn {
            padding: 10px 20px;
            font-size: 18px;
            font-weight: bold;
            border-radius: 30px;
            transition: background-color 0.3s ease, transform 0.3s ease;
            height: 100%; /* Ensures button takes full height of the parent */
            border: none; /* Remove border */
            box-shadow: none; /* Remove box shadow */
        }

        .custom-btn-primary {
            background-color: white;
            color: var(--primary-color);
            border: 1px solid var(--primary-color);
        }

        .custom-btn-active {
            background-color: var(--primary-color); /* Red background for active */
            color: white; /* White text for active */
        }

        .custom-btn-inactive {
            background-color: white; /* White background for inactive */
            color: var(--primary-color); /* Red text for inactive */
            border: 2px solid var(--primary-color); /* Red border for inactive */
        }

        .search-bar {
            margin-bottom: 20px;
        }

        .input-group {
            display: flex;
        }

        .form-control {
            border-radius: 25px;
            padding: 10px 20px;
            font-size: 16px;
            height: 50px; /* Ensure consistent height with button */
        }

        .table {
            margin-top: 20px;
            border-collapse: separate;
            border-spacing: 0;
        }

        .table thead th {
            background-color: var(--primary-color);
            color: white;
            font-weight: bold;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .table tbody tr:hover {
            background-color: #e9ecef;
        }

        .table td, .table th {
            vertical-align: middle;
            padding: 15px;
        }

        .table td a {
            color: #007bff;
            text-decoration: none;
        }

        .table td a:hover {
            text-decoration: underline;
        }

        /* Custom button styles for the status column */
        .btn-success {
            background-color: #28a745; /* Green for "Accept" */
            color: white;
        }

        .btn-danger {
            background-color: #dc3545; /* Red for "Reject" */
            color: white;
        }

        .btn-success:hover, .btn-danger:hover {
            opacity: 0.8; /* Slightly fade on hover */
        }

        .btn-container {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="logo">
        <a class="navbar-brand" href="index.php">
            <img src="images/logo.png" alt="Health At Home Logo" height="40">
        </a>
    </div>

    <div class="container">
        <h2 class="text-center">Accepted Job Applications</h2>

        <!-- Search Bar -->
        <div class="search-bar">
            <form method="GET" action="">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search by name, email, phone, position, or address..." value="<?php echo htmlspecialchars($searchTerm); ?>">
                    <div class="input-group-append">
                        <button class="btn btn-primary custom-btn" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Job Table -->
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
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                        <td><?php echo htmlspecialchars($row['phone']); ?></td>
                        <td><?php echo htmlspecialchars($row['service']); ?></td>
                        <td><?php echo htmlspecialchars($row['address']); ?></td>
                        <td><?php echo htmlspecialchars($row['message']); ?></td>
                        </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
</body>
</html>

<?php
mysqli_close($con);
?>
