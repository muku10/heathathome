<?php
include 'db.php'; // Include the database connection

// Query to fetch three random services from the database
$sql = "SELECT * FROM services ORDER BY RAND() LIMIT 3";
$result = mysqli_query($conn, $sql);
?>

<section class="home-service my-5">
    <div class="container">
        <h2 class="text-center">Our Services</h2>
        
        <!-- First Row of Services -->
        <div class="row py-5">
            <?php
            // Check if there are services in the database
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="col-lg-4 col-md-6 col-12 mb-4 d-flex">
                        <a href="service.php" class="text-decoration-none">
                            <div class="card flex-fill shadow-sm border-light clickable-card">
                                <img class="card-img-top" src="<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>">
                                <div class="card-body d-flex flex-column">
                                    <h4 class="card-title"><?php echo $row['title']; ?></h4>
                                    <p class="card-text flex-grow-1"><?php echo $row['description']; ?></p>
                                    <a href="service-form.php" class="btn custom-btn mt-auto">Request service</a>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php
                }
            } else {
                echo "<p class='text-center'>No services available at the moment.</p>";
            }
            ?>
        </div>

        <!-- See More Services Button -->
        <div class="flex items-center justify-center h-screen"
        style="
    margin-left: 382px;
    margin-right: 382px;">
            <a href="service.php" class="btn custom-btn mt-auto flex-2 px-6 py-3 bg-blue-500 text-white rounded-lg">See More Services</a>
        </div>
        
    </div>
</section>

<?php
// Close the database connection
mysqli_close($conn);
?>
