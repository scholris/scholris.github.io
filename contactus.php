<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="Images/favicon.svg" type="image/x-icon" />
  <link rel="stylesheet" href="Stylesheets/variables.css" />
  <link rel="stylesheet" href="Stylesheets/style.css" />
  <link rel="stylesheet" href="Stylesheets/custom-classes.css" />
  <link rel="stylesheet" href="Stylesheets/bootstrap.min.css" />
  <link rel="stylesheet" href="Stylesheets/contactus.css" />
  <title>Contact Us</title>
</head>

<body style="background-color: #f3f3f3;">
  <!--navbar starts-->
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
          <li class="nav-item"><a href="aboutus.php" class="nav-link">About Us</a></li>
          <li class="nav-item">
            <a href="#" class="nav-link">Contact Us</a>
          </li>
          <li class="nav-item">
            <a href="login.php" class="nav-link navbar-btn">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!--navbar ends-->

  <div class="container mt-5 pt-5">
    <!--row starts-->
    <div class="row">
      <!--left column-->
      <div class="col-12 col-md-6 left-column">
        <h1 class="left-column-text-top">Contact Us</h1>
        <p class="left-column-after-heading mt-3">Email, call, or complete the form to learn how<br>
          Scholris can help you out.</p>
        <div class="contact-info">
          <h4 class="contact-details">Email Address</h4>
          <a href="mailto:info.scholris@gmail.com" class="text-decoration-none">info.scholris@gmail.com</a>
          <h4 class="contact-details">Address</h4>
          <a href="https://maps.app.goo.gl/Ximihfc8gaPmtmCV7" class="text-decoration-none">Kathmandu, Nepal</a>
          <h4 class="contact-details">Phone Number</h4>
          <a href="tel:9779818238323" class="text-decoration-none">9818238323</a>
        </div>
      </div>
      <!--left column ends-->

      <!--right column-->
      <div class="col-12 col-md-6 right-column">
        <div class="right-column-text">
          <h1 class="right-column-top">Get in touch</h1>
          <p class="right-column-after-heading mb-3 mt-3">You can reach us anytime</p>
          <form>
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Name" required />
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Email" required />
            </div>
            <div class="mb-3">
              <label for="contact" class="form-label">Contact No.</label>
              <input type="text" class="form-control" id="contact" name="contact" placeholder="Contact No." required />
            </div>
            <div class="mb-3">
              <label for="contact" class="form-label">Contact No.</label>
              <input type="text" class="form-control" id="address" name="address" placeholder="Address" required />
            </div>
            <div class="mb-3">
              <label for="message" class="form-label">Message</label>
              <textarea class="form-control" id="message" name="message" placeholder="Message" rows="5"
                required></textarea>
            </div>
            <div class="text-center">
              <button type="submit" class="primary-btn-filled w-100">Send Message</button>
            </div>
          </form>
        </div>
      </div>
      <!--right column ends-->
    </div>
    <!--row ends-->
  </div>
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
  <script src="Scripts/bootstrap.bundle.min.js"></script>
</body>
<script src="Scripts/navbar.js"></script>

</html>