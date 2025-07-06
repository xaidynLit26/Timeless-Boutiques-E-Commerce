<!--This verfies if a user is logged in already. If the user is logged in -
it sends them back to the index page. However, if they are not the email -that is enetered is checked 
within our database if it exists. If it does not or the password is incorrect, 
an error message is sent to the user to tell them one of their 
credientials is inncorrect.-->
<?php
    session_start();
    require_once "db_connection.php";
    if (login()) {
        header("location: index.php");
        exit;
    }
    $email = $password = "";
    $login_error = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = trim($_POST["email"]);
        $password = trim($_POST["password"]);
        $sql = "SELECT id, fname, lname, email, password FROM users WHERE email = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("s", $email);
            if ($stmt->execute()) {
                $stmt->store_result();
                if ($stmt->num_rows == 1) {
                    $stmt->bind_result($id, $first_name, $last_name, $db_email, $hashed_password);
                    if ($stmt->fetch()) {
                        if (password_verify($password, $hashed_password)) {
                            $_SESSION["login"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;
                            $_SESSION["first_name"] = $first_name;
                            $_SESSION["last_name"] = $last_name;
                            header("location: index.php");
                            exit;
                        } 
                        else {
                            $login_error = "Invalid email or password.";
                        }
                    }
                } 
                else {
                    $login_error = "Invalid email or password.";
                }
            } 
            else {
                $login_error = "Something went wrong. Please try again later.";
            }
            $stmt->close();
        }
    }
?><!--end of code that does this verification process-->

<!--This code provides the user with a form that allows them to be able to 
log in to their account. The values from here are submitted to be verified. 
if something is wrong the error message from the verification process is displayed.
If the user is not registered for an account there is a link provided 
that send the user to that specified page in order for them to create an account 
with our company.-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Timeless Boutiques</title>
    <link rel="icon" type="image/png" href="images/logo.png">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="login-container">
        <h1 class="page-title">Login to Your Account</h1>
        <p class="page-subtitle">Please enter your credentials to login.</p>
        <?php if (!empty($login_error)): ?>
            <div class="alert"><?php echo $login_error; ?></div>
        <?php endif; ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <table class="form-table">
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
                    <td></td>
                    <td>
                        <input type="submit" class="submit-btn" value="Login">
                    </td>
                </tr>
            </table>
            <!--Link to register for an account if one is not created already-->
            <div class="register-link">
                Don't have an account? <a href="register.php">Sign up now</a>
            </div>
        </form>
    </div>  <!--This line includes the footer php file at the bottom of our webpage 
        for redundancy-->
    <?php include 'footer.php'; ?>
</body>
</html>
 
