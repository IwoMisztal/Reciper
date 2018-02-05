<?php

if (isset($_POST['submit'])) {
    session_start();
    session_unset();
    session_destroy();
    header("Location: login.php");
}
/**
 * Created by PhpStorm.
 * User: iwo
 * Date: 29.01.2018
 * Time: 11:57
 */