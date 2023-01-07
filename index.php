<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Quiz App</title>
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
            <span class="title">Your name</span>

            <form action="quiz-list.php" method="post">
                <div class="input-field">
                    <input type="text" name="player_name" placeholder="Enter your name" required>
                    <i class="uil uil-user icon"></i>
                </div>
                <div class="input-field button">
                    <input type="submit" value="Next">
                </div>
            </form>
        </div>
    </div>
</div>
<script src="js/login.js"></script>
</body>
</html>