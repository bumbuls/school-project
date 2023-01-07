<?php 
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
   <link rel="stylesheet" href="../css/style.css">
   <link rel="stylesheet" href="../css/form.css">
</head>
<body class="back">
    
    <?php include "../includes/header.php"; ?>

    <section class="home">
        <div class="container">
            <div class="forms">
                <div class="form login">
                    <span class="title">Add Quiz</span>
                    <!--ja formai ir kļūda izpildīsies kļūdas ziņojums  -->
                    <?php if(isset($_GET['error'])) { ?>
                        <p class="error"><?php echo $_GET['error']; ?></p>
                    <?php } ?>
                    <?php if (isset($_GET['success'])) { ?>
                        <p class="success"><?php echo $_GET['success']; ?></p>
                    <?php } ?>
                    <form action="../process/add-quiz-process.php" method="post">
                        <div class="input-field">
                            <!-- ja no add-quiz-process q_name ir kas ievadīts -->
                            <?php if(isset($_GET['q_name'])) { ?>
                            <input type="text" name="q_name" value="<?php echo $_GET['q_name']; ?>" placeholder="Enter quiz name">
                            <i class="uil uil-notes icon"></i>
                            <?php } else { ?>
                                <input type="text" name="q_name" placeholder="Enter quiz name">
                                <i class="uil uil-notes icon"></i>
                            <?php } ?>
                        </div>
                        <div class="input-field">
                            <?php if(isset($_GET['q_time'])) { ?>
                            <input type="text" name="q_time" value="<?php echo $_GET['q_time']; ?>" placeholder="Enter time in minutes">
                            <i class="uil uil-clock icon"></i>
                            <?php } else { ?>
                                <input type="text" name="q_time" placeholder="Enter time in minutes">
                                <i class="uil uil-clock icon"></i>
                            <?php } ?>
                        </div>
                        <div class="input-field button">
                            <input type="submit" name="add_quiz" value="Save Quiz">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


</body>
</html>
<?php 
} else {
    header("Location: ../login.php");
    exit();
}
?>
