<?php
include 'header.php' ;
include 'login.inc.php';
?>
<div class="wrapper">

    <?php
    if (isset($_SESSION['u_id'])) {
        echo "<form action='logout.inc.php' method='post'><button type='submit' name='submit'>Logout</button>";
    } else {
        echo '<div class="fields"><form method="post" class="login-form"><h2>SIGN IN</h2>
        <input type="text" name="uname" placeholder="Username/Email">
        <input type="password" name="password" placeholder="password">
        <button type="submit" name="submit">Log In</button>
        <span class="signup"><a href="signup.php">Dont have an account? Sign Up! (sample password: a/a)</a></span>
    </form></div>';
    }
    ?>
    



    <script src="jquery-3.3.1.min.js"></script>


</div>
</body>
</html>