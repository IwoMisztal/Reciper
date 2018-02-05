<?php

    if (isset($_POST['submit'])) {
        include_once 'db.php';

        $first = mysqli_real_escape_string($_db, $_POST['first']);
        $last = mysqli_real_escape_string($_db, $_POST['last']);
        $email = mysqli_real_escape_string($_db, $_POST['email']);
        $uname = mysqli_real_escape_string($_db, $_POST['uname']);
        $password = mysqli_real_escape_string($_db, $_POST['password']);

        //Error Handler
        if (empty($first) || empty($last) || empty($email) || empty($uname) || empty($password)) {
            echo 'empty fields';
            //header('Location: signup.php?signup=empty');
          //  exit();
        } else {
            if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
                echo 'You cannot enter special characters';
                header('Location: signup.php?signup=invalid');
                exit();
            } else {
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {

                    //header('Location: signup.php?signup=email');
                    //exit();
                    echo 'wrong email';
                } else {
                    $sql = "SELECT * FROM users WHERE user_uname='$uname'";
                    $result = mysqli_query($_db, $sql);
                    $resultCheck = mysqli_num_rows($result);

                    if ($resultCheck > 0) {
                        echo 'username taken';
                       header('Location: signup.php?signup=usertaken');
                        exit();
                    } else {
                        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                        $sql = "INSERT INTO users (user_first, user_last, user_email, user_uname, user_password)   VALUES ('$first', '$last', '$email', '$uname', '$hashedPassword');";
                        $result = mysqli_query($_db, $sql);

                        echo $result['user_uname'] . 'success';
                        header('Location: login.php');
                    }
                }
            }
        }

    } else {
       //header('Location: signup.php');
       //exit();
    }