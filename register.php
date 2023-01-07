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
        <!-- Registration Form -->
        <div class="form signup">
            <span class="title">Registration</span>
            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>

            <?php if (isset($_GET['success'])) { ?>
                <p class="success" id="success"><?php echo $_GET['success']; ?></p>
            <?php } ?>

            <form action="process/signup-process.php" method="post">
                <div class="input-field">
                    <?php if (isset($_GET['name'])) { ?>
                    <input type="text" name="name" placeholder="Enter your name" value="<?php echo $_GET['name']; ?>" autocomplete="off">
                    <i class="uil uil-user icon"></i>
                    <?php }else{ ?>
                        <input type="text" name="name" placeholder="Enter your name"  autocomplete="off">
                        <i class="uil uil-user icon"></i>
                    <?php }?>
                </div>
                <div class="input-field">
                    <?php if (isset($_GET['name'])) { ?>
                    <input type="text" name="username" value="<?php echo $_GET['username']; ?>" placeholder="Enter your username">
                    <i class="uil uil-user icon"></i>
                    <?php }else{ ?>
                        <input type="text" name="username" placeholder="Enter your username">
                        <i class="uil uil-user icon"></i>
                    <?php }?>
                </div>
                <div class="input-field">
                    <input type="password" name="password" class="password" placeholder="Create a password">
                    <i class="uil uil-lock icon"></i>
                </div>
                <div class="input-field">
                    <input type="password" class="password" name="c_password" placeholder="Confirm a password">
                    <i class="uil uil-lock icon"></i>
                    <i class="uil uil-eye-slash showHidePw"></i>
                </div>

                <div class="input-field button">
                    <input type="submit" name="signup" value="Register">
                </div>
            </form>

            <div class="login-signup">
                <span class="text">Already a member?
                    <a href="login.php" class="text login-link">Login Now</a>
                </span>
            </div>
        </div>
    </div>
</div>
</body>
</html>
