<?php
session_start();
include 'config.php';

// Check if user is logged in and is a student
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'student') {
    header('Location: login.php');
    exit();
}

$student_id = $_SESSION['user_id'];

// Fetch available scholarships
$sql = "SELECT * FROM scholarships";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$scholarships = $stmt->fetchAll();

// Fetch student applications
$sql = "SELECT a.*, s.name FROM applications a JOIN scholarships s ON a.scholarship_id = s.id WHERE a.student_id = :student_id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':student_id' => $student_id]);
$applications = $stmt->fetchAll();

// Handle scholarship applications
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['apply_scholarship'])) {
        $scholarship_id = $_POST['scholarship_id'];
        
        // Check if the student has already applied
        $sql = "SELECT * FROM applications WHERE student_id = :student_id AND scholarship_id = :scholarship_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':student_id' => $student_id,
            ':scholarship_id' => $scholarship_id
        ]);
        $application = $stmt->fetch();
        
        if (!$application) {
            $sql = "INSERT INTO applications (student_id, scholarship_id, status) VALUES (:student_id, :scholarship_id, 'pending')";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':student_id' => $student_id,
                ':scholarship_id' => $scholarship_id
            ]);
            $message = "Application submitted successfully!";
        } else {
            $message = "You have already applied for this scholarship.";
        }
    }
}

// Handle logout
if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="Stylesheets/bootstrap.min.css" />
    <title>Student Dashboard</title>
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Student Dashboard</h1>

        <?php if (isset($message)): ?>
            <div class="alert alert-info"><?php echo htmlspecialchars($message); ?></div>
        <?php endif; ?>

        <!-- Logout Button -->
        <form method="POST" class="mb-4">
        <a href="index.php" class="btn btn-secondary">Back to Home</a>
            <button type="submit" class="btn btn-danger" name="logout">Logout</button>
        </form>

        <!-- Available Scholarships -->
        <h2 class="mt-4">Available Scholarships</h2>
        <div class="row">
            <?php foreach ($scholarships as $scholarship): ?>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($scholarship['name']); ?></h5>
                            <p class="card-text"><strong>Amount:</strong> $<?php echo number_format($scholarship['amount'], 2); ?></p>
                            <p class="card-text"><strong>Eligibility Criteria:</strong> <?php echo htmlspecialchars($scholarship['eligibility_criteria']); ?></p>
                            <p class="card-text"><strong>Minimum GPA:</strong> <?php echo htmlspecialchars($scholarship['min_gpa']); ?></p>
                            <p class="card-text"><strong>Deadline:</strong> <?php echo htmlspecialchars($scholarship['deadline']); ?></p>
                            
                            <form method="POST">
                                <input type="hidden" name="scholarship_id" value="<?php echo htmlspecialchars($scholarship['id']); ?>" />
                                <button type="submit" class="btn btn-primary" name="apply_scholarship">Apply</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Application Status -->
        <h2 class="mt-4">My Applications</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Scholarship Name</th>
                    <th>Application Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($applications as $application): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($application['name']); ?></td>
                        <td><?php echo htmlspecialchars($application['application_date']); ?></td>
                        <td><?php echo htmlspecialchars($application['status']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
