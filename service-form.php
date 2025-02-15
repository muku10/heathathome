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

<?php include 'navbar.php';?>

  <!-- Form Container -->
  <div class="container my-5">
    <div class="form-wrapper">
      <h2 class="form-title text-center">Request Our Services</h2>
      <form id="serviceForm" action="submit_form.php" method="post" class="service-form my-4" onsubmit="return validateForm()">
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
          <label for="service" class="form-label">Select Service</label>
          <select class="form-control form-input" id="service" name="service" required>
            <option value="Doctor on Call">Doctor on Call</option>
            <option value="Registered Nurse">Registered Nurse</option>
            <option value="Vaccination">Vaccination</option>
            <option value="Physical Therapy">Physical Therapy</option>
            <option value="Medication Management">Medication Management</option>
            <option value="Post Surgery Care">Post Surgery Care</option>
            <option value="Elderly Care">Elderly Care</option>
          </select>
        </div>
        <div class="form-group">
          <label for="address" class="form-label">Home Address</label>
          <textarea class="form-control form-input" id="address" name="address" rows="3" required></textarea>
        </div>
        <div class="form-group">
          <label for="message" class="form-label">Additional Information</label>
          <textarea class="form-control form-input" id="message" name="message" rows="4"></textarea>
        </div>
        <div class="form-footer my-5 pb-3 custom-bg-color">
          <button type="submit" class="btn submit-btn" name="submit">Submit Request</button>
        </div>
      </form>
    </div>
  </div>

  <?php include 'footer.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  
  <script>
    function validateForm() {
      var fullName = document.getElementById('fullName').value;
      var email = document.getElementById('email').value;
      var phone = document.getElementById('phone').value;
      var service = document.getElementById('service').value;
      var address = document.getElementById('address').value;

      if (fullName == "" || email == "" || phone == "" || service == "" || address == "") {
        alert("Please fill out all required fields.");
        return false;
      }

      return true;
    }
  </script>
</body>
</html>
