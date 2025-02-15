<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Health At Home - Our Services</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100..700&display=swap" rel="stylesheet">
</head>
<body>

<?php include 'navbar.php'; ?>
<?php include 'db.php'; ?>

<section class="home-service">
    <div class="container">
        <h2 class="text-center">Our Services</h2>
        
        <div class="row py-5">
            <?php
            $sql = "SELECT * FROM services";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="col-lg-4 col-md-6 col-12 mb-4 d-flex">
                        <a href="<?php echo $row['link']; ?>" class="text-decoration-none">
                            <div class="card flex-fill shadow-sm border-light clickable-card">
                                <img class="card-img-top" src="<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>">
                                <div class="card-body d-flex flex-column">
                                    <h4 class="card-title"><?php echo $row['title']; ?></h4>
                                    <p class="card-text flex-grow-1"><?php echo $row['description']; ?></p>
                                    <a href="<?php echo $row['link']; ?>" class="btn custom-btn mt-auto">Request Service</a>
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

        <!-- View More Button -->
        <!-- <div class="row">
            <div class="col-12 text-center my-4">
                <a href="services.php" class="btn apply-btn">View More</a>
            </div>
        </div> -->
    </div>
</section>

<?php include 'footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
