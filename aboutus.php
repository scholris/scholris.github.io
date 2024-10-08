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
  <link rel="stylesheet" href="Stylesheets/aboutus.css" />
  <title>Scholris - EduAidBuddy</title>
</head>

<body style="background-color: #f3f3f3; display: flex; flex-direction: column; min-height: 100vh;">
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
          <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
          <li class="nav-item">
            <a href="index.php" class="nav-link">Scholarships</a>
          </li>
          <li class="nav-item"><a href="#" class="nav-link">About Us</a></li>
          <li class="nav-item">
            <a href="contactus.php" class="nav-link">Contact Us</a>
          </li>
          <li class="nav-item">
            <a href="login.php" class="nav-link navbar-btn">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- navbar ends -->

  <!-- hero section starts -->
  <section class="container about-us-wrapper mt-5">
    <div class="d-flex justify-content-center align-items-center flex-column">
      <p class="about-us-main-text">
        Platform dedicated to connecting students with valuable scholarship opportunities..
      </p>
      <p class="about-us-sub-text">
        At Scholris, we believe that access to education should be as universal as the desire to learn. Our mission is
        to simplify the journey to educational success by connecting students with the scholarships they deserve.
        Whether you're a student looking to fund your dreams or an organization eager to empower the next generation,
        Scholris provides the tools you need to easily discover, apply for, and manage scholarships.
      </p>
      <p class="about-us-sub-text">
        Scholris was build by Bimochan Poudel, Biplaw Tiwari & Trisha Shrestha as a part of their 5th semester web technoloy project while studying 
        BSc.CSIT in Prime College (TU), Kathmandu.
      </p>
      <div class="d-flex justify-content-center align-items-center">
        <img src="Images/6.png" class="img-fluid about-us-img" alt="About us image">
      </div>
    </div>
  </section>
  <!-- hero section ends -->

  <!-- footer starts -->
  <footer class="cc-footer mt-auto">
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
            <div class="footer-body"><a href="index.php">Scholarships</a></div>
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
            <div class="footer-body"><a href="#"><i class="bi bi-geo-alt-fill"></i>
                Kathmandu, Nepal</a></div>
            <div class="footer-body"><a href="#"><i class="bi bi-envelope"></i> info@genesis.com</a></div>
            <div class="footer-socials">
              <div class="footer-social-icon">
                <a href="#"><i class="bi bi-facebook"></i></a>
              </div>
              <div class="footer-social-icon">
                <a href="#"><i class="bi bi-instagram"></i></a>
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
<script src="Scripts/bootstrap.bundle.min.js"></script>
<script src="Scripts/navbar.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->

</html>