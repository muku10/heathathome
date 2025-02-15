<?php
include 'db.php'; // Ensure this file has the correct database connection setup

// SQL query to get total counts from both tables
$sqlCombinedCounts = "
SELECT 'jobform' as type, COUNT(*) as total FROM jobform
UNION ALL
SELECT 'serviceform' as type, COUNT(*) as total FROM serviceform
";

// Execute the query
$resultCombinedCounts = $conn->query($sqlCombinedCounts);

$counts = [];
while ($row = $resultCombinedCounts->fetch_assoc()) {
    $counts[$row['type']] = (int)$row['total'];
}

// Get individual counts
$totalJobApplications = isset($counts['jobform']) ? $counts['jobform'] : 0;
$totalServiceRequests = isset($counts['serviceform']) ? $counts['serviceform'] : 0;

// Calculate combined total
$totalApplicationsAndRequests = $totalJobApplications + $totalServiceRequests;

// Fetch data from specific tables for further details
$sqlJobDetails = "
SELECT COUNT(*) as accepted_jobs FROM accepted_jobs
";
$resultJobDetails = $conn->query($sqlJobDetails);
$acceptedJobs = $resultJobDetails->fetch_assoc()['accepted_jobs'];

$sqlRejectedJobs = "
SELECT COUNT(*) as rejected_jobs FROM rejected_jobs
";
$resultRejectedJobs = $conn->query($sqlRejectedJobs);
$rejectedJobs = $resultRejectedJobs->fetch_assoc()['rejected_jobs'];

$sqlAvailableServices = "
SELECT COUNT(*) as available_services FROM available_services
";
$resultAvailableServices = $conn->query($sqlAvailableServices);
$availableServices = $resultAvailableServices->fetch_assoc()['available_services'];

$sqlUnavailableServices = "
SELECT COUNT(*) as unavailable_services FROM unavailable_services
";
$resultUnavailableServices = $conn->query($sqlUnavailableServices);
$unavailableServices = $resultUnavailableServices->fetch_assoc()['unavailable_services'];

// Fetch gender distribution data
$sqlGender = "
SELECT gender, COUNT(*) as count
FROM patient
GROUP BY gender
";
$resultGender = $conn->query($sqlGender);

$genderData = [];
while ($row = $resultGender->fetch_assoc()) {
    $genderData[] = $row;
}

// Prepare data for Gender Pie Chart
$genderLabels = [];
$genderCounts = [];
$colors = ['#007bff', '#28a745', '#ffc107', '#dc3545']; // Add more colors if needed

foreach ($genderData as $index => $row) {
    $genderLabels[] = ucfirst($row['gender']);
    $genderCounts[] = (int)$row['count'];
}

// Fetch job applications per month data
$sqlJobApplications = "
SELECT MONTHNAME(date) AS month, COUNT(*) as count
FROM jobform
GROUP BY MONTH(date)
";
$resultJobApplications = $conn->query($sqlJobApplications);

$jobApplicationsLabels = [];
$jobApplicationsData = [];

while ($row = $resultJobApplications->fetch_assoc()) {
    $jobApplicationsLabels[] = $row['month'];
    $jobApplicationsData[] = (int)$row['count'];
}

// Close the connection
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Health At Home - Index</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h4>Dashboard</h4>
        <a href="#">Overview</a>
        <a href="job-dashboard.php">Job Statistics</a>
        <a href="service-dashboard.php">Service Requests</a>
        <a href="admin_job_view.php">Jobs</a>
        <a href="Add_service.php">Services</a>
        
    </div>

    <!-- Main Content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- Dashboard Cards -->
                <div class="col-md-4">
                    <div class="card bg-danger text-white">
                        <div class="card-body">
                            <h5 class="card-title">Total Applications and Requests</h5>
                            <p class="card-text"><?php echo $totalApplicationsAndRequests; ?></p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="card bg-success text-white">
                        <div class="card-body">
                          <a href="service-dashboard.php">
                            <h5 class="card-title">Total Service Requests</h5>
                            <p class="card-text"><?php echo $totalServiceRequests; ?></p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <a href="job-dashboard.php">
                          <h5 class="card-title">Total Job Applications</h5>
                          <p class="card-text"><?php echo $totalJobApplications; ?></p>
                      </a>
                  </div>
              </div>
          </div>
      </div>
      <div class="row">
    <!-- Dashboard Cards -->
       <div class="col-md-4">
        <div class="card bg-success text-white">
            <div class="card-body">
                <a href="accepted_jobs.php">
                    <h5 class="card-title">Accepted Applications</h5>
                    <p class="card-text"><?php echo $acceptedJobs; ?></p>
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <a href="rejected_jobs.php">
                    <h5 class="card-title">Rejected Applications</h5>
                    <p class="card-text"><?php echo $rejectedJobs; ?></p>
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-success text-white">
            <div class="card-body">
                <a href="available_service.php">
                    <h5 class="card-title">Available Services</h5>
                    <p class="card-text"><?php echo $availableServices; ?></p>
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <a href="unavailable_service.php">
                    <h5 class="card-title">Unavailable Services</h5>
                    <p class="card-text"><?php echo $unavailableServices; ?></p>
                </a>
            </div>
        </div>
    </div>
</div>

      <div class="row">
        <div class="col-md-8">
            <!-- Bar Chart for Job Applications per Month -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Job Applications per Month</h5>
                    <div class="chart-container">
                        <canvas id="jobApplicationsBarChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <!-- Pie Chart for Gender Distribution -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Patient Gender (Registered)</h5>
                    <div class="chart-container">
                        <canvas id="genderPieChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
<script>
    // Pie Chart for Gender Distribution
    var genderCtx = document.getElementById('genderPieChart').getContext('2d');
    var genderPieChart = new Chart(genderCtx, {
        type: 'pie',
        data: {
            labels: <?php echo json_encode($genderLabels); ?>,
            datasets: [{
                label: 'Gender Distribution',
                data: <?php echo json_encode($genderCounts); ?>,
                backgroundColor: <?php echo json_encode($colors); ?>,
            }]
        }
    });

    // Bar Chart for Job Applications per Month
    var jobApplicationsCtx = document.getElementById('jobApplicationsBarChart').getContext('2d');
    var jobApplicationsBarChart = new Chart(jobApplicationsCtx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($jobApplicationsLabels); ?>,
            datasets: [{
                label: 'Job Applications',
                data: <?php echo json_encode($jobApplicationsData); ?>,
                backgroundColor: '#007bff',
                borderColor: '#0056b3',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        stepSize: 1,
                        max: 10
                    }
                }]
            }
        }
    });
</script>
</body>
</html>
