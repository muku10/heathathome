<?php
include 'db.php'; // Include database connection
include 'navbar.php';
?>

<section class="home_job_listing">
    <div class="container">
        <h2 class="text-center">Featured Jobs</h2>
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="job-cards-container">

                    <?php
                    // Query to fetch jobs
                    $sql = "SELECT id, title, openings, job_type, published_date, link FROM jobs ORDER BY published_date DESC";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="card job-card" onclick="window.location.href=\'' . $row['link'] . '\'">';
                            echo '<div class="card-body">';
                            echo '<div class="row">';
                            echo '<div class="col-md-4"><div class="card-column"><h3 class="spacing-top">' . $row['title'] . '</h3>';
                            echo '<p>No of openings: ' . $row['openings'] . '</p></div></div>';
                            echo '<div class="col-md-4"><div class="card-column"><h5 class="spacing-top">Type: ' . $row['job_type'] . '</h5>';
                            echo '<p>Published: ' . $row['published_date'] . '</p></div></div>';
                            echo '<div class="col-md-4"><div class="card-column"><a href="job-form.php" class="btn btn-apply">Apply Now</a></div></div>';
                            echo '</div></div></div>';
                        }
                    } else {
                        echo '<p class="text-center text-danger">No jobs available at the moment.</p>';
                    }
                    ?>

                </div>
            </div>

            <!-- Filters (Kept the Same) -->
            <div class="col-lg-4 col-md-12">
                <div class="filter-box mb-4">
                    <h4>Search by Keyword</h4>
                    <form id="search-form">
                        <input type="text" id="search-keyword" name="search-keyword" class="form-control mb-2" placeholder="Enter job title or keyword">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                </div>
         
          

          <!-- Qualification Checklist Box -->
          <div class="filter-box mb-4">
            <h4>Qualification Checklist</h4>
            <form id="qualification-form">
              <div class="form-check">
                <input type="checkbox" id="degree1" name="qualification" value="Bachelor's Degree" class="form-check-input">
                <label for="degree1" class="form-check-label">Bachelor's Degree</label>
              </div>
              <div class="form-check">
                <input type="checkbox" id="degree2" name="qualification" value="Master's Degree" class="form-check-input">
                <label for="degree2" class="form-check-label">Master's Degree</label>
              </div>
              <div class="form-check">
                <input type="checkbox" id="degree3" name="qualification" value="PhD" class="form-check-input">
                <label for="degree3" class="form-check-label">PhD</label>
              </div>
            </form>
          </div>

          <!-- Shift Options Box -->
          <div class="filter-box mb-4">
            <h4>Shift</h4>
            <form id="shift-form">
              <div class="form-check">
                <input type="radio" id="shift1" name="shift" value="Morning" class="form-check-input">
                <label for="shift1" class="form-check-label">Morning</label>
              </div>
              <div class="form-check">
                <input type="radio" id="shift2" name="shift" value="Afternoon" class="form-check-input">
                <label for="shift2" class="form-check-label">Afternoon</label>
              </div>
              <div class="form-check">
                <input type="radio" id="shift3" name="shift" value="Night" class="form-check-input">
                <label for="shift3" class="form-check-label">Night</label>
              </div>
            </form>
          </div>
           <!-- Job Type Checklist Box -->
  <div class="filter-box mb-4">
    <h4>Job Type</h4>
    <form id="job-type-form">
      <div class="form-check">
        <input type="checkbox" id="remote" name="job-type" value="Remote" class="form-check-input">
        <label for="remote" class="form-check-label">Remote</label>
      </div>
      <div class="form-check">
        <input type="checkbox" id="full-time" name="job-type" value="Full-Time" class="form-check-input">
        <label for="full-time" class="form-check-label">Full-Time</label>
      </div>
      <div class="form-check">
        <input type="checkbox" id="part-time" name="job-type" value="Part-Time" class="form-check-input">
        <label for="part-time" class="form-check-label">Part-Time</label>
      </div>
      <div class="form-check">
        <input type="checkbox" id="on-site" name="job-type" value="On-Site" class="form-check-input">
        <label for="on-site" class="form-check-label">On-Site</label>
      </div>
    </form>
  </div>
                <!-- Other filter sections remain unchanged -->
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>



  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
   document.addEventListener("DOMContentLoaded", function() {
  var viewMoreBtn = document.getElementById("view-more-btn");
  var hiddenCards = document.querySelectorAll(".hidden-job-card");
  var isExpanded = false; // Track the current state

  viewMoreBtn.addEventListener("click", function() {
    if (hiddenCards.length > 0) {
      hiddenCards.forEach(function(card) {
        card.classList.toggle("hidden-job-card", isExpanded);
      });

      // Toggle button text based on the current state
      if (isExpanded) {
        viewMoreBtn.textContent = "View More";
      } else {
        viewMoreBtn.textContent = "View Less";
      }

      isExpanded = !isExpanded; // Toggle the state
    }
  });
});


document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("search-keyword");
    const jobTypeCheckboxes = document.querySelectorAll("#job-type-form input[type='checkbox']");
    const shiftRadios = document.querySelectorAll("#shift-form input[type='radio']");
    const qualificationCheckboxes = document.querySelectorAll("#qualification-form input[type='checkbox']");
    const jobCards = document.querySelectorAll(".job-card");
    const jobCardsContainer = document.querySelector(".job-cards-container");

    // Create "No Jobs Found" message
    let noJobsMessage = document.createElement("div");
    noJobsMessage.textContent = "No job found";
    noJobsMessage.classList.add("no-jobs-message");
    noJobsMessage.style.display = "none";
    noJobsMessage.style.textAlign = "center";
    noJobsMessage.style.fontSize = "1.2em";
    noJobsMessage.style.fontWeight = "bold";
    noJobsMessage.style.color = "red";
    noJobsMessage.style.padding = "15px";
    jobCardsContainer.appendChild(noJobsMessage);

    function filterJobs() {
        const keyword = searchInput.value.toLowerCase().trim();
        const selectedTypes = Array.from(jobTypeCheckboxes)
            .filter(checkbox => checkbox.checked)
            .map(checkbox => checkbox.value.toLowerCase());

        const selectedShift = Array.from(shiftRadios)
            .find(radio => radio.checked)?.value.toLowerCase() || "";

        const selectedQualifications = Array.from(qualificationCheckboxes)
            .filter(checkbox => checkbox.checked)
            .map(checkbox => checkbox.value.toLowerCase());

        let found = false;

        jobCards.forEach(card => {
            const jobTitle = card.querySelector("h3").textContent.toLowerCase();
            const jobType = card.querySelector("h5").textContent.toLowerCase();

            // Find the shift text by looking for "Shift"
            const shiftElement = Array.from(card.querySelectorAll("p")).find(p => p.textContent.includes("Shift"));
            const jobShift = shiftElement ? shiftElement.textContent.toLowerCase() : ""; 

            const jobQualifications = card.querySelector("p:nth-of-type(2)")?.textContent.toLowerCase() || "";

            const matchesKeyword = keyword === "" || jobTitle.includes(keyword);
            const matchesType = selectedTypes.length === 0 || selectedTypes.some(type => jobType.includes(type));
            const matchesShift = selectedShift === "" || jobShift.includes(selectedShift);
            const matchesQualifications = selectedQualifications.length === 0 || selectedQualifications.some(q => jobQualifications.includes(q));

            if (matchesKeyword && matchesType && matchesShift && matchesQualifications) {
                card.style.display = "block";
                found = true;
            } else {
                card.style.display = "none";
            }
        });

        // Show "No job found" message if no jobs match
        noJobsMessage.style.display = found ? "none" : "block";
    }

    // Event Listeners for filtering
    searchInput.addEventListener("keyup", filterJobs);
    jobTypeCheckboxes.forEach(checkbox => checkbox.addEventListener("change", filterJobs));
    shiftRadios.forEach(radio => radio.addEventListener("change", filterJobs));
    qualificationCheckboxes.forEach(checkbox => checkbox.addEventListener("change", filterJobs));

    // Run filter once on page load (to handle cases where filters are pre-checked)
    filterJobs();
});

</script>



  
</body>
</html>
