<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Health At Home - Apply for a Job</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
</head>
<body>

<?php include 'navbar.php';?>

  <!-- Form Container -->
  <div class="container my-5">
    <div class="form-wrapper">
      <h2 class="form-title text-center">Apply for a Job</h2>
      <form id="jobForm" action="job_submit.php" method="post" enctype="multipart/form-data" class="job-form my-4">
        <div class="form-group">
          <label for="fullName" class="form-label">Full Name</label>
          <input type="text" class="form-control form-input" id="fullName" name="name" required>
        </div>
        <div class="form-group">
          <label for="email" class="form-label">Email Address</label>
          <input type="email" class="form-control form-input" id="email" name="email" required>
        </div>
        <div class="form-group">
          <label for="phone" class="form-label">Phone Number</label>
          <input type="text" class="form-control form-input" id="phone" name="phone" required>
        </div>
        <div class="form-group">
          <label for="position" class="form-label">Position Applying For</label>
          <select class="form-control form-input" id="position" name="position" required>
            <option value="Nurse">Nurse</option>
            <option value="Therapist">Therapist</option>
            <option value="Lab Technician">Lab Technician</option>
            <option value="Helper">Helper</option>
            <option value="Security Guard">Security Guard</option>
            <option value="Receptionist">Receptionist</option>
          </select>
        </div>
        <div class="form-group">
          <label for="address" class="form-label">Home Address</label>
          <textarea class="form-control form-input" id="address" name="address" rows="3" required></textarea>
        </div>
        <div class="form-group">
          <label for="resume" class="form-label">Upload Resume</label>
          <input type="file" class="form-control-file form-input" id="resume" name="resume" required>
        </div>
        <div class="form-group">
          <label for="message" class="form-label">Additional Information</label>
          <textarea class="form-control form-input" id="message" name="message" rows="4"></textarea>
        </div>
        <div class="form-group">
          <label for="date" class="form-label">Date</label>
          <input type="date" class="form-control form-input" id="date" name="date" required>
        </div>
        <div class="form-footer my-5 pb-3 custom-bg-color">
          <button type="submit" class="btn submit-btn" name="submit">Apply Job</button>
        </div>
      </form>
    </div>
  </div>

  <?php include 'footer.php';?>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  
  <script>
    // Set default date to today's date
    document.addEventListener('DOMContentLoaded', function() {
      var dateField = document.getElementById('date');
      var today = new Date().toISOString().split('T')[0];
      dateField.value = today;
    });
  </script>
</body>
</html>
