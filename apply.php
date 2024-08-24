<?php
session_start();
include 'config.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page with redirect parameter
    header('Location: login.php?redirect=' . urlencode('apply.php?scholarship_id=' . $_GET['scholarship_id']));
    exit();
}

// Get scholarship ID from query string
$scholarship_id = $_GET['scholarship_id'];
$user_id = $_SESSION['user_id'];

// Check if the application already exists
$sql = "SELECT * FROM applications WHERE scholarship_id = :scholarship_id AND student_id = :student_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['scholarship_id' => $scholarship_id, 'student_id' => $user_id]);

if ($stmt->rowCount() > 0) {
    echo "You have already applied for this scholarship.";
} else {
    // Insert new application
    $sql = "INSERT INTO applications (scholarship_id, student_id, status) VALUES (:scholarship_id, :student_id, 'Pending')";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['scholarship_id' => $scholarship_id, 'student_id' => $user_id]);
    echo "Application submitted successfully!";
}
?>
