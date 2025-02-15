<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Health At Home - Information Form</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
</head>
<body>
<?php include 'navbar.php';?>

<!-- Form Container -->
<div class="form-container">
    <h2 class="form-heading">Information Form</h2>

    <form action="submit-info.php" method="post" enctype="multipart/form-data">
        <!-- Personal Details Section -->
        <section class="form-section personal-details">
            <fieldset class="form-fieldset">
                <legend class="form-legend">Personal Details</legend>
                <label for="name" class="form-label">Full Name:</label>
                <input class="form-input text-input" type="text" id="name" name="fullname" required><br><br>

                <label for="birth" class="form-label">Date of Birth:</label>
                <input class="form-input date-input" type="date" id="birth" name="birth" required><br><br>

                <label for="gender" class="form-label">Gender:</label>
                <select class="form-input select-input" id="gender" name="gender" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select><br><br>

                <label for="address" class="form-label">Address:</label>
                <input class="form-input text-input" type="text" id="address" name="address" required><br><br>

                <label for="phone" class="form-label">Phone Number:</label>
                <input class="form-input tel-input" type="tel" id="phone" name="phone" required><br><br>

                <label for="email" class="form-label">Email Address:</label>
                <input class="form-input email-input" type="email" id="email" name="email" required><br><br>

                <label for="username" class="form-label">Username:</label>
                <input class="form-input text-input" type="text" id="username" name="username" required><br><br>

                <label for="summary" class="form-label">Describe Yourself:</label>
                <textarea class="form-input summary-textarea" id="summary" name="summary" rows="4" cols="50"></textarea><br><br>
            </fieldset>
        </section>

        <!-- Emergency Contact Information Section -->
        <section class="form-section emergency-contact">
            <fieldset class="form-fieldset">
                <legend class="form-legend">Emergency Contact</legend>
                <label for="contact_name" class="form-label">Contact Name:</label>
                <input class="form-input text-input" type="text" id="contact_name" name="contact_name" required><br><br>

                <label for="relationship" class="form-label">Relationship:</label>
                <input class="form-input text-input" type="text" id="relationship" name="relationship" required><br><br>

                <label for="contact_phone" class="form-label">Contact Phone Number:</label>
                <input class="form-input tel-input" type="tel" id="contact_phone" name="contact_phone" required><br><br>
            </fieldset>
        </section>

        <!-- File Upload Section -->
        <section class="form-section file-upload">
            <fieldset class="form-fieldset">
                <legend class="form-legend">Upload Documents</legend>
                <label for="cv" class="form-label">Upload CV:</label>
                <input class="form-input file-input" type="file" id="cv" name="cv"><br><br>

                <label for="cover_letter" class="form-label">Upload Cover Letter:</label>
                <input class="form-input file-input" type="file" id="cover_letter" name="cover_letter"><br><br>
            </fieldset>
        </section>

        <!-- Submit Button -->
        <section class="form-section submit-button">
            <button class="submit-btn" type="submit" name="submitted">Submit</button>
        </section>
    </form>
</div>

<?php include 'footer.php'; ?>
</body>
</html>
