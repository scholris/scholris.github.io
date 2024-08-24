<?php
session_start();
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role']; // 'student' or 'organization'

    if ($role == 'student') {
        $sql = "SELECT * FROM students WHERE email = :email";
    } elseif ($role == 'organization') {
        $sql = "SELECT * FROM organizations WHERE email = :email";
    } else {
        $error = "Invalid role selected";
        include 'login_form.php'; // Show the login form with the error
        exit();
    }

    $stmt = $pdo->prepare($sql);
    $stmt->execute([':email' => $email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $role;
        $_SESSION['user_name'] = $role == 'student' ? $user['full_name'] : $user['organization_name'];

        if ($role == 'student') {
            header('Location: student_dashboard.php');
        } else {
            header('Location: org_dashboard.php');
        }
        exit();
    } else {
        $error = "Invalid email or password";
        include 'login_form.php'; // Show the login form with the error
        exit();
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
    <title>Scholris | Login</title>
</head>
<body style="background-color: #f3f3f3; color: var(--primary-color)">
    <section class="container">
        <div class="d-flex justify-content-center align-items-center">
            <div class="signup-wrapper poppins-medium">
                <a class="d-flex justify-content-center align-items-center" href="/">
                    <img src="Images/scholris-dark.png" class="navbar-logo" alt="Scholris" height="40" width="150" />
                </a>
                <form method="POST" action="login.php">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12">
                            <div class="my-2">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required />
                            </div>

                            <div class="mb-2">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required />
                            </div>
                            
                            <div class="mb-2">
                                <label for="role" class="form-label">Role</label>
                                <select class="form-select" id="role" name="role" required>
                                    <option value="" disabled selected>Select Role</option>
                                    <option value="student">Student</option>
                                    <option value="organization">Organization</option>
                                </select>
                            </div>

                            <?php if (isset($error)): ?>
                            <div class="mb-2 text-danger">
                                <?php echo htmlspecialchars($error); ?>
                            </div>
                            <?php endif; ?>
                            
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="#" style="text-decoration: none; color: var(--primary-color)" class="">Forgot Password?</a>
                                <div class="form-check">
                                    <input class="form-check-input mx-2" type="checkbox" id="rememberme" name="rememberme" />
                                    <label class="form-check-label" for="rememberme">Remember me</label>
                                </div>
                            </div>

                            <div class="signup">
                                <div class="text-center">
                                    <button type="submit" class="primary-btn-filled w-50">
                                        Login
                                    </button>
                                </div>

                                <div class="text-center">
                                    New User? <a href="student_signup.php">Register</a>
                                </div>
                                <div class="text-center">
                                    Are you an organization? <a href="org_signup.php">Register</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>
