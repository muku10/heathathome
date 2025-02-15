<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Health At Home - Contact Us</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
</head>
<body>

<?php include 'navbar.php';?>

  <section class="contact-section">
    <div class="container">
      <div class="section-header">
        <h2 class="text-center contact-title">Contact Us</h2>
      </div>
      <div class="row">
        <div class="col-lg-6 col-md-6 col-12 contact-info">
          <h4>Contact Information</h4>
          <p>Address: 123 Health St, Wellness City, HC 12345</p>
          <p>Phone: (123) 456-7890</p>
          <p>Email: contact@healthathome.com</p>
        </div>
        <div class="col-lg-6 col-md-6 col-12 contact-form">
          <h4>Get in Touch</h4>
          <form action="home_contact.php" method="post">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="message">Message</label>
              <textarea name="message" id="message" class="form-control" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary contact-btn mt-4">Send Message</button>
          </form>
        </div>
      </div>
    </div>
  </section>


  <?php include 'footer.php';?>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
