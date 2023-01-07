<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
    header("Location: auth/dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Quiz App</title>
    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="css/nav.css">

    <!--<title>Login & Registration Form</title>-->
</head>
<body class="login-body">

<div class="container">
    <div class="forms">
        <div class="form login">
            <span class="title">Login</span>
            <?php if (isset($_SESSION['error'])) { ?>
                <p class="error" id="error"><?php echo $_SESSION['error']; ?></p>
            <?php } ?>
            <form action="process/login-process.php" method="post">
                <div class="input-field">
                    <input type="text" name="username"  placeholder="Enter your username" autocomplete="off">
                    <i class="uil uil-user icon"></i>
                </div>
                <div class="input-field">
                    <input type="password" name="password" class="password" placeholder="Enter your password">
                    <i class="uil uil-lock icon"></i>
                    <i class="uil uil-eye-slash showHidePw"></i>
                </div>
                <div class="input-field button">
                    <input type="submit" name="login" value="Login">
                </div>
            </form>

            <div class="login-signup">
                    <span class="text">Not a member?
                        <a href="register.php" class="text signup-link">Signup Now</a>
                    </span>
            </div>
        </div>
    </div>
</div>
</body>
</html>
