<?php
session_start();
include "../config/database.php";
if(isset($_POST['q_name']) && isset($_POST['q_time'])) {

    function sql($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $q_name = sql($_POST['q_name']);
    $q_time = sql($_POST['q_time']);

    if(empty($q_name)) {
        header("Location: ../auth/add-quiz.php?error=Quiz name is required");
        exit();
    } else if (empty($q_time)) {
        header("Location: ../auth/add-quiz.php?error=Quiz time is required");
        exit();
    } else {
        // izsauc db quiz 
        $sql = "SELECT * FROM quiz WHERE q_name='$q_name'";
        $result = mysqli_query($connection,$sql);
        // pārbauda vai var ielikt jaunu ierakstu
        if(mysqli_num_rows($result) > 0) {
            header("Location: ../auth/add-quiz?error=Quiz name exists!");
            exit();
        } else {
            $insert = "INSERT INTO quiz(q_name,q_time) VALUES('$q_name','$q_time')";
            $insert_result = mysqli_query($connection,$insert);
            // ja db nav tāda ieraksta tad success
            if($insert_result) {
                header("Location: ../auth/add-quiz.php?success=New quiz has been created successfully");
                exit();
            } else {
                header("Location: ../auth/add-quiz/php?error=unknown error");
                exit();
            }
        }
    }
} else {
    header("Location: ../auth/add-quiz.php");
}
?>