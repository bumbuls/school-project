<?php
session_start();
include "../config/database.php";
// select answer
if (isset($_POST['select-type'])) {
    function sql($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


    $qq_id = sql($_POST['qq_id']);
    $qq_name = sql($_POST['qq_name']);
    $qq_option1 = sql($_POST['ans_one']);
    $qq_option2 = sql($_POST['ans_two']);
    $qq_option3 = sql($_POST['ans_three']);
    $qq_option4 = sql($_POST['ans_four']);

    $qq_ca = sql($_POST['correct_answer']);
    $qq_type = sql($_POST['qq_type']);

    $qno = 1;
    $query = "SELECT qno FROM question where qq_q_id='".$qq_id."' ORDER BY qq_id DESC";
    $run = mysqli_query($connection,$query);
    $result20 = mysqli_fetch_array($run);

    if(mysqli_num_rows($run) > 0){
        $qno = $result20['qno']+1;
    }else{
        $qno = 1;
    }

        $sql = "INSERT INTO question(qq_q_id,qno, qq_name, qq_option_1,qq_option_2,qq_option_3,qq_option_4,qq_answer,qq_type) VALUES('$qq_id','$qno', '$qq_name','$qq_option1','$qq_option2','$qq_option3','$qq_option4','$qq_ca','$qq_type')";
        $result = mysqli_query($connection, $sql);
        if ($result) {
            $query = "UPDATE quiz SET q_tnq = q_tnq + 1 WHERE q_id  = '$qq_id'";
            mysqli_query($connection, $query);
            header("Location: ../auth/add-questions.php?success=New question has been created");
            exit();
        }else {
            header("Location: ../auth/add-questions.php?error=unknown error occurred");
            exit();
        }
// type answer
}else if (isset($_POST['answer-type'])) {
    function sql($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $qq_id = sql($_POST['qq_id']);
    $qq_name = sql($_POST['qq_name']);
    $answer = sql($_POST['answer']);
    $qq_type = sql($_POST['qq_type_ta']);

    $qno = 1;
    $query = "SELECT qno FROM question where qq_q_id='".$qq_id."' ORDER BY qq_id DESC LIMIT 1";
    $run = mysqli_query($connection,$query);
    $result20 = mysqli_fetch_array($run);

    if(mysqli_num_rows($run) > 0){
        $qno = $result20['qno']+1;
    }else{
        $qno = 1;
    }

    $sql = "INSERT INTO question(qq_q_id,qno, qq_name, qq_option_1,qq_option_2,qq_option_3,qq_option_4,qq_answer,qq_type) VALUES('$qq_id','$qno', '$qq_name','','','','','$answer','$qq_type')";
    $result = mysqli_query($connection, $sql);
    if ($result) {
        $query = "UPDATE quiz SET q_tnq = q_tnq + 1 WHERE q_id  = '$qq_id'";
        mysqli_query($connection, $query);
        header("Location: ../auth/add-questions.php?success=New question has been created");
        exit();
    }else {
        header("Location: ../auth/add-questions.php?error=unknown error occurred");
        exit();
    }

}else{
    header("Location: ../auth/add-questions.php");
    exit();
}