<?php
session_start();
include "../config/database.php";
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
    $sql = "SELECT * FROM quiz";
    $result = mysqli_query($connection, $sql);
    $result2 = mysqli_query($connection, $sql);
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Add Question</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
   <link rel="stylesheet" href="../css/style.css">
   <link rel="stylesheet" href="../css/form.css">

</head>
<body class="back">
   
<?php include "../includes/header.php"; ?>

<section class="home">
    <div>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error" id="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <?php if (isset($_GET['success'])) { ?>
            <p class="success" id="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>
    </div>
    <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title">Add Question</span>
                <span>Select answer</span>
                <form action="../process/add-question-process.php" method="post">
                    <div class="input-field">
                        <select name="qq_id" required>
                            <option value="">Choose Quiz...</option>
                            <?php while ($row = mysqli_fetch_array($result)){?>
                            <option value="<?php echo $row['q_id']; ?>"><?php echo $row['q_name']; ?></option>
                            <?php } ?>
                        </select>
                        <i class="uil uil-notes icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" name="qq_name" placeholder="Question name" required>
                        <i class="uil uil-notes icon"></i>
                        <input type="hidden" name="qq_type" value="1">
                    </div>
                    <h4 style="margin-top: 10px;font-size: 15px;">Options</h4>
                    <div class="input-field margin-top">
                        <input type="text" name="ans_one" placeholder="Option 1" required>
                        <input type="radio" name="correct_answer" value="1" class="checkbox" required>
                    </div>
                    <div class="input-field margin-top">
                        <input type="text" name="ans_two" placeholder="Option 2" required>
                        <input type="radio" name="correct_answer" value="2" class="checkbox" required>
                    </div>
                    <div class="input-field margin-top">
                        <input type="text" name="ans_three" placeholder="Option 3" required>
                        <input type="radio" name="correct_answer" value="3" class="checkbox"required>
                    </div>
                    <div class="input-field margin-top">
                        <input type="text" name="ans_four" placeholder="Option 4" required>
                        <input type="radio" name="correct_answer" value="4" class="checkbox"required >
                    </div>
                    <div class="input-field button">
                        <input type="submit" name="select-type" value="Add Question">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title">Add Question</span>
                <span>Type answer</span>
                <form action="../process/add-question-process.php" method="post">
                    <div class="input-field">
                        <select name="qq_id">
                            <option value="">Choose Quiz...</option>
                            <?php while ($row = mysqli_fetch_array($result2)){?>
                                <option value="<?php echo $row['q_id']; ?>"><?php echo $row['q_name']; ?></option>
                            <?php } ?>
                        </select>
                        <i class="uil uil-notes icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" name="qq_name" placeholder="Question name" required>
                        <i class="uil uil-notes icon"></i>
                        <input type="hidden" name="qq_type_ta" value="2">
                    </div>
                    <div class="input-field">
                        <input type="text" name="answer" placeholder="Answer" required>
                        <i class="uil uil-notes icon"></i>
                    </div>
                    <div class="input-field button">
                        <input type="submit" name="answer-type" value="Add Question">
                    </div>
                </form>
            </div>
        </div>
    </div>

</section>
</body>
</html>
<?php
}else{
    header("Location: ../login.php");
    exit();
}
?>