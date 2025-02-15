<?php
include 'config.php'; // Database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Health At Home - Job Listings</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<section class="home_job_listing my-5">
    <div class="container">
      <h2 class="text-center my-4">Featured Jobs</h2>
      
      <!-- Buttons to toggle between job sections -->
      <div class="text-center mb-4">
        <button id="showRecent" class="btn btn-recent mx-2 d-inline-block">Show Recent Jobs</button>
        <button id="showUpdated" class="btn btn-update mx-2 d-inline-block">Show Updated Jobs</button>
      </div>

      <!-- Recent Jobs Section -->
      <div id="recentJobs" class="py-5">
        <h3 class="text-center">Recent Jobs</h3>

        <?php
        $recent_sql = "SELECT * FROM jobs ORDER BY published_date DESC LIMIT 5";
        $recent_result = $conn->query($recent_sql);

        if ($recent_result->num_rows > 0) {
            while ($row = $recent_result->fetch_assoc()) {
                echo '<div class="card job-card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-4">
                              <h3>' . htmlspecialchars($row['title']) . '</h3>
                              <p>No of openings: ' . htmlspecialchars($row['openings']) . '</p>
                            </div>
                            <div class="col-md-4">
                              <h5>Type: ' . htmlspecialchars($row['job_type']) . '</h5>
                              <p>Published: ' . htmlspecialchars($row['published_date']) . '</p>
                            </div>
                            <div class="col-md-4 text-right">
                              <a href="job-form.php?id=' . $row['id'] . '" class="btn btn-apply">Apply Now</a>
                            </div>
                          </div>
                        </div>
                      </div>';
            }
        } else {
            echo '<p class="text-center">No recent jobs available.</p>';
        }
        ?>
      </div>      

      <!-- Updated Jobs Section -->
      <div id="updatedJobs" class="py-5" style="display: none;">
        <h3 class="text-center">Updated Jobs</h3>

        <?php
        $updated_sql = "SELECT * FROM jobs WHERE updated_date IS NOT NULL ORDER BY updated_date DESC LIMIT 5";
        $updated_result = $conn->query($updated_sql);

        if ($updated_result->num_rows > 0) {
            while ($row = $updated_result->fetch_assoc()) {
                echo '<div class="card job-card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-4">
                              <h3>' . htmlspecialchars($row['title']) . '</h3>
                              <p>No of openings: ' . htmlspecialchars($row['openings']) . '</p>
                            </div>
                            <div class="col-md-4">
                              <h5>Type: ' . htmlspecialchars($row['job_type']) . '</h5>
                              <p>Updated: ' . htmlspecialchars($row['updated_date']) . '</p>
                            </div>
                            <div class="col-md-4 text-right">
                              <a href="job-form.php?id=' . $row['id'] . '" class="btn btn-apply">Apply Now</a>
                            </div>
                          </div>
                        </div>
                      </div>';
            }
        } else {
            echo '<p class="text-center">No updated jobs available.</p>';
        }
        ?>
      </div>

    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
  <script>
    // Toggle functionality for job sections
    document.getElementById('showRecent').addEventListener('click', function() {
      document.getElementById('recentJobs').style.display = 'block';
      document.getElementById('updatedJobs').style.display = 'none';
    });

    document.getElementById('showUpdated').addEventListener('click', function() {
      document.getElementById('updatedJobs').style.display = 'block';
      document.getElementById('recentJobs').style.display = 'none';
    });
  </script>
</body>
</html>
