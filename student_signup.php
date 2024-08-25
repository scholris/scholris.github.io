<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collecting data from the form
    $full_name = $_POST['fname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $permanent_address = $_POST['paddress'];
    $temporary_address = $_POST['taddress'];
    $document_type = $_POST['doctype'];
    $document_number = $_POST['docno'];
    $document_upload = $_FILES['docup']['name'];
    $gpa = $_POST['gpa'];
    $marksheet_upload = $_FILES['marksheet-upload']['name'];
    $personal_statement = $_FILES['personal-statement']['name'];
    $supporting_documents = $_FILES['supporting-documents']['name'];
    $military_personal = isset($_POST['military-personal']) ? 1 : 0;
    $government_school = isset($_POST['government-school']) ? 1 : 0;

    // Handling file uploads
    move_uploaded_file($_FILES['docup']['tmp_name'], "uploads/$document_upload");
    move_uploaded_file($_FILES['marksheet-upload']['tmp_name'], "uploads/$marksheet_upload");
    move_uploaded_file($_FILES['personal-statement']['tmp_name'], "uploads/$personal_statement");
    move_uploaded_file($_FILES['supporting-documents']['tmp_name'], "uploads/$supporting_documents");

    // Prepare SQL statement
    $sql = "INSERT INTO students (full_name, email, phone, password, dob, gender, permanent_address, temporary_address, document_type, document_number, document_upload, gpa, marksheet_upload, personal_statement, supporting_documents, military_personal, government_school)
            VALUES (:full_name, :email, :phone, :password, :dob, :gender, :permanent_address, :temporary_address, :document_type, :document_number, :document_upload, :gpa, :marksheet_upload, :personal_statement, :supporting_documents, :military_personal, :government_school)";

    $stmt = $pdo->prepare($sql);
    
    // Execute the query
    if ($stmt->execute([
        ':full_name' => $full_name,
        ':email' => $email,
        ':phone' => $phone,
        ':password' => $password,
        ':dob' => $dob,
        ':gender' => $gender,
        ':permanent_address' => $permanent_address,
        ':temporary_address' => $temporary_address,
        ':document_type' => $document_type,
        ':document_number' => $document_number,
        ':document_upload' => $document_upload,
        ':gpa' => $gpa,
        ':marksheet_upload' => $marksheet_upload,
        ':personal_statement' => $personal_statement,
        ':supporting_documents' => $supporting_documents,
        ':military_personal' => $military_personal,
        ':government_school' => $government_school,
    ])) {
        // Redirect to login page upon successful registration
        header('Location: login.php');
        exit();
    } else {
        // Output error if the query fails
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
    <title>Scholris | Signup as Student</title>
</head>
<body style="background-color: #f3f3f3; color: var(--primary-color)">
    <section class="container">
        <div class="d-flex justify-content-center align-items-center">
            <div class="signup-wrapper poppins-medium">
                <a class="d-flex justify-content-center align-items-center" href="/">
                    <img src="Images/scholris-dark.png" class="navbar-logo" alt="Scholris" height="50" width="200" />
                </a>
                <h4 class="d-flex justify-content-center align-items-center mt-2 mb-5">SignUp</h4>

                <!-- Ensure the form submits to the correct PHP file -->
                <form action="student_signup.php" method="POST" enctype="multipart/form-data">
                    <div class="row g-5">
                        <div class="col-lg-6 col-sm-12">
                            <h5 class="mb-3">Basic Info</h5>
                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="name" name="fname" placeholder="Full Name" required />
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
                                <label for="dob" class="form-label">Date of Birth</label>
                                <input type="date" class="form-control" id="dob" name="dob" placeholder="Date of Birth" required />
                            </div>
                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <select class="form-select" id="gender" name="gender" required>
                                    <option value="" disabled selected>Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="others">Others</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="permanent-address" class="form-label">Permanent Address</label>
                                <input type="text" class="form-control" id="permanent-address" name="paddress" placeholder="Permanent Address" required />
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="same-address" />
                                <label class="form-check-label" for="same-address">Temporary address same as permanent address?</label>
                            </div>
                            <div class="mb-3">
                                <label for="temporary-address" class="form-label">Temporary Address</label>
                                <input type="text" class="form-control" id="temporary-address" name="taddress" placeholder="Temporary Address" required />
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <h5 class="mb-3">Legals</h5>
                            <div class="mb-3">
                                <label for="document-type" class="form-label">Type of Document</label>
                                <select class="form-select" id="document-type" name="doctype" required>
                                    <option value="" disabled selected>Select Document Type</option>
                                    <option value="citizen">Citizenship</option>
                                    <option value="birth-certificate">Birth Certificate</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="document-number" class="form-label">Document Number</label>
                                <input type="text" class="form-control" id="document-number" name="docno" placeholder="Document Number" required />
                            </div>
                            <div class="mb-3">
                                <label for="document-upload" class="form-label">Document Upload</label>
                                <input type="file" class="form-control" id="document-upload" name="docup"  accept=".pdf,.doc,.docx,.jpg,.jpeg,.png" required />
                            </div>
                            <h5 class="mt-5 mb-3">Academics</h5>
                            <div class="mb-3">
                                <label for="gpa" class="form-label">GPA</label>
                                <input type="text" class="form-control" id="gpa" name="gpa" placeholder="GPA" required />
                            </div>
                            <div class="mb-3">
                                <label for="marksheet-upload" class="form-label">Marksheet Upload</label>
                                <input type="file" class="form-control" id="marksheet-upload" name="marksheet-upload" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png" required />
                            </div>
                            <div class="mb-3">
                                <label for="personal-statement" class="form-label">Personal Statement</label>
                                <input type="file" class="form-control" id="personal-statement" name="personal-statement" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png" required />
                            </div>
                            <div class="mb-3">
                                <label for="supporting-documents" class="form-label">Supporting Documents</label>
                                <input type="file" class="form-control" id="supporting-documents" name="supporting-documents" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png" required />
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="military-personal" name="military-personal" />
                                <label class="form-check-label" for="military-personal">Any of your family member is in military personal?</label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="government-school" name="government-school" />
                                <label class="form-check-label" for="government-school">Did you attend government school?</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-center mt-4">
                        <input type="submit" class="primary-btn-filled w-50 px-5" value="SignUp" />
                    </div>
                </form>
                <p class="d-flex justify-content-center align-items-center">Already have an account? <a href="login.php"> Login</a></p>
                <p class="d-flex justify-content-center align-items-center">Are you an organization? <a href="org_signup.php"> Login</a></p>
            </div>
        </div>
    </section>
</body>
</html>
