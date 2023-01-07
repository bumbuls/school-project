<?php
session_start();
include "../config/database.php";

if (isset($_POST['username']) && isset($_POST['password'])
    && isset($_POST['name']) && isset($_POST['c_password'])) {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['username']);
    $pass = validate($_POST['password']);

    $re_pass = validate($_POST['c_password']);
    $name = validate($_POST['name']);

    $user_data = 'username='. $uname. '&name='. $name;


    if (empty($name)) {
        header("Location: ../register.php?error=Name is required&$user_data");
        exit();
    }else if (empty($uname)) {
        header("Location: ../register.php?error=User Name is required&$user_data");
        exit();
    }else if(empty($pass)){
        header("Location: ../register.php?error=Password is required&$user_data");
        exit();
    }
    else if(empty($re_pass)){
        header("Location: ../register.php?error=Confirm Password is required&$user_data");
        exit();
    }

    else if($pass !== $re_pass){
        header("Location: ../register.php?error=The Confirm password  does not match&$user_data");
        exit();
    }

    else{

        // hashing the password
        $pass = md5($pass);

        $sql = "SELECT * FROM tbl_user WHERE username='$uname' ";
        $result = mysqli_query($connection, $sql);

        if (mysqli_num_rows($result) > 0) {
            header("Location: ../register.php?error=The username is taken! try another&$user_data");
            exit();
        }else {
            $sql2 = "INSERT INTO tbl_user(name, username, password) VALUES('$name', '$uname', '$pass')";
            $result2 = mysqli_query($connection, $sql2);
            if ($result2) {
                header("Location: ../register.php?success=Your account has been created successfully");
                exit();
            }else {
                header("Location: ../register.php?error=unknown error occurred&$user_data");
                exit();
            }
        }
    }

}else{
    header("Location: ../register.php");
    exit();
}