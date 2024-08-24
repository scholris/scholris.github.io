<?php
session_start();
include 'config.php'; // Include your database connection

// Check if the user is logged in
$isLoggedIn = isset($_SESSION['user_id']);

// Fetch scholarships from the database
$sql = "SELECT * FROM scholarships";
$stmt = $pdo->query($sql);
$scholarships = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="Images/favicon.svg" type="image/x-icon" />
  <link rel="stylesheet" href="Stylesheets/variables.css" />
  <link rel="stylesheet" href="Stylesheets/style.css" />
  <link rel="stylesheet" href="Stylesheets/custom-classes.css" />
  <link rel="stylesheet" href="Stylesheets/bootstrap.min.css" />
  <title>Scholris - EduAidBuddy</title>
</head>

<body style="background-color: #f3f3f3;">
  <!-- navbar starts -->
  <nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
      <a class="navbar-brand" href="/">
        <img src="Images/scholris-dark.png" class="navbar-logo" alt="Scholris" height="30" width="130" />
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a href="#" class="nav-link">Home</a></li>
          <li class="nav-item">
            <a href="#scholarships" class="nav-link">Scholarships</a>
          </li>
          <li class="nav-item"><a href="aboutus.php" class="nav-link">About Us</a></li>
          <li class="nav-item">
            <a href="contactus.php" class="nav-link">Contact Us</a></li>
          <li class="nav-item">
            <a href="login.php" class="nav-link navbar-btn">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- navbar ends -->
  <!-- hero section starts -->
  <section class="container hero-section">
    <div class="row">
      <div class="col-sm-12 col-md-6 hero-text-left">
        <h2 class="hero-text-left-up">
          Easily Discover, Apply & Manage Scholarships.
        </h2>
        <h2 class="hero-text-left-down">
          Start your journey to educational excellence today!
        </h2>
        <div class="text-over-buttons">Proceed as?</div>
        <div class="hero-buttons">
          <a href="student_signup.php" class="primary-btn-filled"> Student </a>
          <a href="org_signup.php" class="primary-btn-skeleton"> Organization </a>
        </div>
      </div>
      <div class="col-sm-12 col-md-6">
        <img src="Images/hero-img.png" class="img-fluid" alt="hero-img" />
      </div>
    </div>
  </section>
  <!-- hero section ends  -->
  <!-- scholarship listings starts -->
  <section class="container" id="scholarships">
    <h3 class="d-flex justify-content-center align-items-center listed-scholarships">
      Listed Scholarships
    </h3>

    <div class="home-scholarship-listings">
      <?php foreach ($scholarships as $scholarship): ?>
        <div class="scholarship-card">
          <div class="row">
            <div class="col-lg-10 card-left">
              <h5 class="card-header"><?php echo htmlspecialchars($scholarship['name']); ?></h5>
              <?php if (!empty($scholarship['deadline'])): ?>
                <div class="card-content">Until: <?php echo htmlspecialchars($scholarship['deadline']); ?></div>
              <?php endif; ?>
              <?php if (!empty($scholarship['amount'])): ?>
                <div class="card-content">
                  Scholarship Amount: <?php echo htmlspecialchars($scholarship['amount']); ?>
                </div>
              <?php endif; ?>
              <?php if (!empty($scholarship['eligibility_criteria'])): ?>
                <div class="card-content">
                  For: <?php echo htmlspecialchars($scholarship['eligibility_criteria']); ?>
                </div>
              <?php endif; ?>
            </div>
            <div class="col-lg-2 card-right">
              <?php if ($isLoggedIn): ?>
                <a href="apply.php?scholarship_id=<?php echo htmlspecialchars($scholarship['id']); ?>" class="card-btn-filled">Apply now</a>
                <a href="view_details.php?scholarship_id=<?php echo htmlspecialchars($scholarship['id']); ?>" class="card-btn-skeleton">View Details</a>
              <?php else: ?>
                <a href="login.php?redirect=apply.php?scholarship_id=<?php echo urlencode($scholarship['id']); ?>" class="card-btn-filled">Apply now</a>
                <a href="login.php?redirect=view_details.php?scholarship_id=<?php echo urlencode($scholarship['id']); ?>" class="card-btn-skeleton">View Details</a>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </section>
  <!-- scholarship listings ends -->

  <!-- footer starts -->
  <footer class="cc-footer">
    <div class="container">
      <div class="footer-wrapper">
        <div class="row">
          <div class="col-sm-12 col-md-3 footer-section">
            <img src="Images/scholris-light.png" class="navbar-logo" alt="Scholris" height="30" width="130" />
            <div class="footer-head">Genesis Inc.</div>
            <div class="footer-body">
              Schorlris is the ultimate platform for seamless scholarship
              management.
            </div>
          </div>
          <div class="col-sm-12 col-md-3">
            <div class="footer-head">Quick Links</div>
            <div class="footer-body"><a href="index.php">Home</a></div>
            <div class="footer-body"><a href="#scholarships">Scholarships</a></div>
            <div class="footer-body"><a href="aboutus.php">About Us</a></div>
            <div class="footer-body"><a href="contactus.php">Contact Us</a></div>
          </div>
          <div class="col-sm-12 col-md-3">
            <div class="footer-head">Help</div>
            <div class="footer-body"><a href="#">How to use?</a></div>
            <div class="footer-body"><a href="#">Privacy Policy</a></div>
            <div class="footer-body"><a href="#">FAQ</a></div>
          </div>
          <div class="col-sm-12 col-md-3">
            <div class="footer-head">Contacts</div>
            <div class="footer-body"><a href="#" style="text-wrap: nowrap;"><i class="bi bi-geo-alt-fill"></i>
                Kathmandu, Nepal</a></div>
            <div class="footer-body"><a href="#"><i class="bi bi-envelope"></i> info@genesis.com</a></div>

            <div class="footer-socials">
              <div class="footer-social-icon">
                <a href="#"><i class="bi bi-facebook"></i></a>
              </div>
              <div class="footer-social-icon">
                <a href="#"><i class="bi bi-instagram"></i></i></a>
              </div>
              <div class="footer-social-icon">
                <a href="#"><i class="bi bi-twitter-x"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <div class="footer-bottom">
    &copy; 2024 Genesis Inc. All rights reserved.
  </div>
  <!-- footer ends -->
</body>
<script src="Scripts/navbar.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>
