<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

      <title>Title</title>
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,700" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="reciperStyle.css">
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
            echo "<li><a href='login.php'>Log Out</a></li>";
        } else {
            echo "<li><a href=\"login.php\">Log in</a></li>";
        }
        ?>
    </ul>
</nav>
<?php
    if (isset($_SESSION['u_id'])) {
        echo 'You are logged in as ' . $_SESSION['u_uname'];
    }
?>
<div class="center">

    <input type="text" placeholder="CLICK HERE TO EDIT TITLE" id="title">
    <table class="recipeTable" id="table">
        <tbody>
        <tr>
            <th class="col">Step</th>
            <th class="col">Ingredients</th>
            <th class="col">Method</th>
            <th class="col"><button id="edit">Edit</button><button id="delete">Delete</button></th>
        </tr>

    </table>

    <div class="recipeInput" id="fields"></div>
    <?php
    if (!isset($_SESSION['u_id'])) {
        echo 'You Have To Be Logged In To Save Recipe';
    }

    ?>
<a href="recipes.php"><button id='btn'>Save the recipe</button></a>


</div>
<script src="jquery-3.3.1.min.js"></script>

<script src="app.js?v=2345678"></script>

</body>
</html>