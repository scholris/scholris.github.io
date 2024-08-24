<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $organization_name = $_POST['fname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $permanent_address = $_POST['paddress'];

    // Prepare SQL statement
    $sql = "INSERT INTO organizations (organization_name, email, phone, password, permanent_address)
            VALUES (:organization_name, :email, :phone, :password, :permanent_address)";
    
    $stmt = $pdo->prepare($sql);
    
    // Execute the query
    if ($stmt->execute([
        ':organization_name' => $organization_name,
        ':email' => $email,
        ':phone' => $phone,
        ':password' => $password,
        ':permanent_address' => $permanent_address,
    ])) {
        // Redirect to login page upon successful registration
        header('Location: login.php');
        exit();
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="Images/favicon.svg" type="image/x-icon" />
  <link rel="stylesheet" href="Stylesheets/variables.css" />
  <link rel="stylesheet" href="Stylesheets/signups.css" />
  <link rel="stylesheet" href="Stylesheets/custom-classes.css" />
  <link rel="stylesheet" href="Stylesheets/bootstrap.min.css" />
  <title>Scholris | Signup as Organization</title>
</head>

<body style="background-color: #f3f3f3; color: var(--primary-color)">
  <section class="container">
    <div class="d-flex justify-content-center align-items-center">
      <div class="signup-wrapper poppins-medium">
        <a class="d-flex justify-content-center align-items-center" href="/">
          <img src="Images/scholris-dark.png" class="navbar-logo" alt="Scholris" height="50" width="200" />
        </a>
        <h4 class="d-flex justify-content-center align-items-center mt-2 mb-2">
          SignUp
        </h4>
        <form method="POST" action="org_signup.php">
          <div class="row">
            <div class="col-lg-12 col-sm-12">
              <div class="mb-3">
                <label for="name" class="form-label">Organization Name</label>
                <input type="text" class="form-control" id="name" name="fname" placeholder="Organization Name" required />
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required />
              </div>
              <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="number" class="form-control" id="phone" name="phone" placeholder="Phone Number" required />
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required />
              </div>
              <div class="mb-3">
                <label for="confirm-password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirm-password" name="cpassword" placeholder="Confirm Password" required />
              </div>
              <div class="mb-3">
                <label for="permanent-address" class="form-label">Permanent Address</label>
                <input type="text" class="form-control" id="permanent-address" name="paddress" placeholder="Permanent Address" required />
              </div>
            </div>
            <div class="form-check my-4 d-flex justify-content-center align-items-center">
              <input class="form-check-input mx-2" type="checkbox" id="tnc" name="tnc" required />
              <label class="form-check-label" for="tnc">I agree with the terms & conditions.</label>
            </div>
            <div class="signup">
              <div class="text-center">
                <button type="submit" class="primary-btn-filled w-50">
                  Sign Up
                </button>
              </div>
              <div class="text-center">
                Already a User? <a href="login.php">Login</a>
              </div>
              <div class="text-center">
                Are you a student? <a href="student_signup.php">Register</a>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
</body>

</html>
