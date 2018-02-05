<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <title>Title</title>
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,700" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="recipesStyle.css">

</head>

<body>

<nav>
    <ul>
        <li>Home</li>
        <li><a href="reciper.php">Upload recipe</a></li>

        <?php
        if (isset($_SESSION['loggedIn'])) {
            echo "<li><a href=\"recipes.php\">Your Recipes</a></li>";
            echo "<form action='login.inc.php'><li><a href='login.php'>Log Out</a></li></form>";
        } else {
            echo "<li><a href=\"login.php\">Log in</a></li>";
        }
        ?>
    </ul>
</nav>