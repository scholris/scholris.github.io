<?php
session_start();
include 'config.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page with redirect parameter
    header('Location: login.php?redirect=' . urlencode('view_details.php?scholarship_id=' . $_GET['scholarship_id']));
    exit();
}

// Get scholarship ID from query string
$scholarship_id = $_GET['scholarship_id'];

// Fetch scholarship details from the database
$sql = "SELECT * FROM scholarships WHERE id = :scholarship_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['scholarship_id' => $scholarship_id]);
$scholarship = $stmt->fetch();

if (!$scholarship) {
    echo "Scholarship not found.";
    exit();
}
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
  <title>Scholarship Details - Scholris</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg fixed-top">
    <!-- Navigation Bar Content -->
  </nav>

  <section class="container">
    <h1><?php echo htmlspecialchars($scholarship['name']); ?></h1>
    <p><strong>Open From:</strong> <?php echo htmlspecialchars($scholarship['start_date']); ?></p>
    <p><strong>Until:</strong> <?php echo htmlspecialchars($scholarship['deadline']); ?></p>
    <p><strong>Amount:</strong> <?php echo htmlspecialchars($scholarship['amount']); ?></p>
    <p><strong>Eligibility:</strong> <?php echo htmlspecialchars($scholarship['eligibility_criteria']); ?></p>
    <!-- Add more details as needed -->
  </section>

  <footer>
    <!-- Footer Content -->
  </footer>
</body>
</html>
