<!--This part of the code verifies if the persons information more specifically
their email does not match up with anyone elses in our database. If it does the 
user is told that the email is taken. If not taken, the user's information is stored
and their password is hashed for security reasons. -->
<?php
    require_once "db_connection.php";
    $first_name = $last_name = $email = $password = "";
    $registration_success = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $first_name = trim($_POST["first_name"]);
        $last_name = trim($_POST["last_name"]);
        $email = trim($_POST["email"]);
        $password = $_POST["password"];
        $check_email = "SELECT id FROM users WHERE email = ?";
        if ($stmt = $conn->prepare($check_email)) {
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->store_result();
            if ($stmt->num_rows > 0) {
                $email_error = "This email is already taken.";
            } 
            else {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO users (fname, lname, email, password) VALUES (?, ?, ?, ?)";
                if ($stmt2 = $conn->prepare($sql)) {
                    $stmt2->bind_param("ssss", $first_name, $last_name, $email, $hashed_password);
                    if ($stmt2->execute()) {
                        $registration_success = true;
                    }
                    $stmt2->close();
                }
            }
            $stmt->close();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Timeless Boutiques</title>
    <link rel="icon" type="image/png" href="images/logo.png">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="register-container">
        <?php if ($registration_success): ?>
            <div class="success-message">
                Your account has been created successfully! You can now <a href="login.php">log in</a>.
            </div>
        <?php else: ?>
            <h1 class="page-title">Create an Account</h1>
            <p class="page-subtitle">Please fill this form to create an account.</p>
            
            <?php if (isset($email_error)): ?>
                <div class="alert"><?php echo $email_error; ?></div>
            <?php endif; ?>
            <!--THid form is created so that users are able to register an account -->
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <table class="form-table">
                    <tr>
                        <td>First Name</td>
                        <td>
                            <input type="text" name="first_name" class="form-input" value="<?php echo $first_name; ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Last Name</td>
                        <td>
                            <input type="text" name="last_name" class="form-input" value="<?php echo $last_name; ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>
                            <input type="email" name="email" class="form-input" value="<?php echo $email; ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>
                            <input type="password" name="password" class="form-input" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Confirm Password</td>
                        <td>
                            <input type="password" name="confirm_password" class="form-input" required>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" class="submit-btn" value="Submit">
                        </td>
                    </tr>
                </table>
                <div class="login-link">
                    Already have an account? <a href="login.php">Login here</a>
                </div>
            </form>
        <?php endif; ?>
    </div>
     <!--This line includes the footer php file at the bottom of our webpage 
        for redundancy-->
    <?php include 'footer.php'; ?>
</body>
</html>