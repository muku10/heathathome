<?php
include 'db.php'; // Database connection
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Health At Home - Job Listings</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
</head>
<body>

  <!-- Job Section -->
  <section class="home-job">
    <div class="container">
      <div class=" pt-0">
        <h2 class="text-center">Explore Categories</h2>
      </div>
      <div class="row">
        
        <?php
        $sql = "SELECT * FROM jobs LIMIT 12"; // Fetch first 12 jobs
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class=" col-md-4 col-6 mb-4">
                        <div class="card text-center">
                          <div class="card-body">
                            <h4 class="card-title">' . htmlspecialchars($row['title']) . '</h4>
                            <p class="card-text">Openings: ' . htmlspecialchars($row['openings']) . '</p>
                          </div>
                        </div>
                      </div>';
            }
        } else {
            echo '<div class="col-12 text-center"><p>No job listings available.</p></div>';
        }
        ?>

      </div>
      <!-- <div class="row">
        <div class="col-12 text-center my-4 pb-5">
          <a href="job-vacancy.php" class="btn view-more-btn">View More</a>
        </div>
      </div> -->
    </div>
  </section>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
