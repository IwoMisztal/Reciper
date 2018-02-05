<?php

if (isset($_POST['submit'])) {
    include 'db.php';
    $uname = mysqli_real_escape_string($_db, $_POST['uname']);
    $password = mysqli_real_escape_string($_db, $_POST['password']);

    if (empty($uname) || empty($password)) {
        echo 'Empty form!';
    } else {
        $sql = "SELECT * FROM users WHERE user_uname='$uname' OR user_email='$uname'";
        $result = mysqli_query($_db, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($resultCheck < 1) {
            // header("Location: login.php?login=error");
            //exit();

        } else {
            $row = mysqli_fetch_assoc(($result));
            if ($row) {

                $hashedPasswordCheck = password_verify($password, $row['user_password']);
                if ($hashedPasswordCheck == false) {

                    //header("Location: login.php?password=wrong");
                    // exit();

                } elseif ($hashedPasswordCheck == true) {
                    $_SESSION['u_id'] = $row['user_id'];
                    $_SESSION['u_first'] = $row['user_first'];
                    $_SESSION['u_last'] = $row['user_last'];
                    $_SESSION['u_email'] = $row['user_email'];
                    $_SESSION['u_uname'] = $row['user_uname'];
                    $_SESSION['title'] = $row['title'];
                    $_SESSION['ingredients'] = $row['ingredients'];
                    $_SESSION['method'] = $row['method'];
                    $_SESSION['loggedIn'] = true;
                    header ('location: reciper.php');
                    exit();
                }
            }

        }

    }
}