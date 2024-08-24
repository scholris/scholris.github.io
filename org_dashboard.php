<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'organization') {
    header('Location: login.php');
    exit();
}

$organization_id = $_SESSION['user_id'];

// Handle CRUD operations
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_scholarship'])) {
        // Add Scholarship
        $name = $_POST['name'];
        $amount = $_POST['amount'];
        $eligibility_criteria = $_POST['eligibility_criteria'];
        $min_gpa = $_POST['min_gpa'];
        $deadline = $_POST['deadline'];

        $sql = "INSERT INTO scholarships (org_id, name, amount, eligibility_criteria, min_gpa, deadline) VALUES (:organization_id, :name, :amount, :eligibility_criteria, :min_gpa, :deadline)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':organization_id' => $organization_id,
            ':name' => $name,
            ':amount' => $amount,
            ':eligibility_criteria' => $eligibility_criteria,
            ':min_gpa' => $min_gpa,
            ':deadline' => $deadline,
        ]);
    } elseif (isset($_POST['update_scholarship'])) {
        // Update Scholarship
        $id = $_POST['id'];
        $name = $_POST['name'];
        $amount = $_POST['amount'];
        $eligibility_criteria = $_POST['eligibility_criteria'];
        $min_gpa = $_POST['min_gpa'];
        $deadline = $_POST['deadline'];

        $sql = "UPDATE scholarships SET name = :name, amount = :amount, eligibility_criteria = :eligibility_criteria, min_gpa = :min_gpa, deadline = :deadline WHERE id = :id AND org_id = :organization_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':id' => $id,
            ':organization_id' => $organization_id,
            ':name' => $name,
            ':amount' => $amount,
            ':eligibility_criteria' => $eligibility_criteria,
            ':min_gpa' => $min_gpa,
            ':deadline' => $deadline,
        ]);
    } elseif (isset($_POST['delete_scholarship'])) {
        // Delete Scholarship
        $id = $_POST['id'];

        $sql = "DELETE FROM scholarships WHERE id = :id AND org_id = :organization_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':id' => $id,
            ':organization_id' => $organization_id,
        ]);
    } elseif (isset($_POST['update_application_status'])) {
        // Approve/Reject Application
        $application_id = $_POST['application_id'];
        $status = $_POST['status'];

        $sql = "UPDATE applications SET status = :status WHERE id = :application_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':application_id' => $application_id,
            ':status' => $status
        ]);
    }
}

// Fetch scholarships
$sql = "SELECT * FROM scholarships WHERE org_id = :organization_id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':organization_id' => $organization_id]);
$scholarships = $stmt->fetchAll();

// Fetch applications
$sql = "SELECT a.*, s.full_name, s.email FROM applications a JOIN students s ON a.student_id = s.id WHERE a.scholarship_id IN (SELECT id FROM scholarships WHERE org_id = :organization_id)";
$stmt = $pdo->prepare($sql);
$stmt->execute([':organization_id' => $organization_id]);
$applications = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="Stylesheets/bootstrap.min.css" />
    <title>Organization Dashboard</title>
</head>

<body>

    <div class="container">
        <h1 class="mt-4">Organization Dashboard</h1>

        <!-- Add Scholarship Form -->
        <h2 class="mt-4">Add Scholarship</h2>
        <form method="POST">
            <input type="hidden" name="add_scholarship" value="1" />
            <div class="mb-3">
                <label for="name">Scholarship Name:</label>
                <input type="text" id="name" name="name" class="form-control" required />
            </div>
            <div class="mb-3">
                <label for="amount">Amount:</label>
                <input type="number" id="amount" name="amount" class="form-control" step="0.01" required />
            </div>
            <div class="mb-3">
                <label for="eligibility_criteria">Eligibility Criteria:</label>
                <textarea id="eligibility_criteria" name="eligibility_criteria" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label for="min_gpa">Minimum GPA:</label>
                <input type="number" id="min_gpa" name="min_gpa" class="form-control" step="0.01" required />
            </div>
            <div class="mb-3">
                <label for="deadline">Deadline:</label>
                <input type="date" id="deadline" name="deadline" class="form-control" required />
            </div>
            <button type="submit" class="btn btn-primary">Add Scholarship</button>
        </form>

        <!-- Manage Scholarships -->
        <h2 class="mt-4">Manage Scholarships</h2>
        <?php foreach ($scholarships as $scholarship): ?>
            <form method="POST" class="mb-3">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($scholarship['id']); ?>" />
                <div class="mb-3">
                    <label for="name_<?php echo htmlspecialchars($scholarship['id']); ?>">Scholarship Name:</label>
                    <input type="text" id="name_<?php echo htmlspecialchars($scholarship['id']); ?>" name="name" class="form-control" value="<?php echo htmlspecialchars($scholarship['name']); ?>" required />
                </div>
                <div class="mb-3">
                    <label for="amount_<?php echo htmlspecialchars($scholarship['id']); ?>">Amount:</label>
                    <input type="number" id="amount_<?php echo htmlspecialchars($scholarship['id']); ?>" name="amount" class="form-control" step="0.01" value="<?php echo htmlspecialchars($scholarship['amount']); ?>" required />
                </div>
                <div class="mb-3">
                    <label for="eligibility_criteria_<?php echo htmlspecialchars($scholarship['id']); ?>">Eligibility Criteria:</label>
                    <textarea id="eligibility_criteria_<?php echo htmlspecialchars($scholarship['id']); ?>" name="eligibility_criteria" class="form-control" required><?php echo htmlspecialchars($scholarship['eligibility_criteria']); ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="min_gpa_<?php echo htmlspecialchars($scholarship['id']); ?>">Minimum GPA:</label>
                    <input type="number" id="min_gpa_<?php echo htmlspecialchars($scholarship['id']); ?>" name="min_gpa" class="form-control" step="0.01" value="<?php echo htmlspecialchars($scholarship['min_gpa']); ?>" required />
                </div>
                <div class="mb-3">
                    <label for="deadline_<?php echo htmlspecialchars($scholarship['id']); ?>">Deadline:</label>
                    <input type="date" id="deadline_<?php echo htmlspecialchars($scholarship['id']); ?>" name="deadline" class="form-control" value="<?php echo htmlspecialchars($scholarship['deadline']); ?>" required />
                </div>
                <button type="submit" class="btn btn-primary" name="update_scholarship">Update</button>
                <button type="submit" class="btn btn-danger" name="delete_scholarship">Delete</button>
            </form>
        <?php endforeach; ?>

        <!-- Manage Applications -->
        <h2 class="mt-4">Manage Applications</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Email</th>
                    <th>Scholarship ID</th>
                    <th>Application Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($applications as $application): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($application['full_name']); ?></td>
                        <td><?php echo htmlspecialchars($application['email']); ?></td>
                        <td><?php echo htmlspecialchars($application['scholarship_id']); ?></td>
                        <td><?php echo htmlspecialchars($application['application_date']); ?></td>
                        <td><?php echo htmlspecialchars($application['status']); ?></td>
                        <td>
                            <form method="POST">
                                <input type="hidden" name="application_id" value="<?php echo htmlspecialchars($application['id']); ?>" />
                                <select name="status" class="form-select">
                                    <option value="pending" <?php echo $application['status'] === 'pending' ? 'selected' : ''; ?>>Pending</option>
                                    <option value="approved" <?php echo $application['status'] === 'approved' ? 'selected' : ''; ?>>Approved</option>
                                    <option value="rejected" <?php echo $application['status'] === 'rejected' ? 'selected' : ''; ?>>Rejected</option>
                                </select>
                                <button type="submit" class="btn btn-primary mt-2" name="update_application_status">Update Status</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>