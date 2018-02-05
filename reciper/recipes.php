<?php

include 'header.php';
include 'db.php';
$activeUser = $_SESSION['u_id'];
$sql = "SELECT * FROM recipes WHERE owner='$activeUser';";
$result = mysqli_query($_db, $sql);
$quantity = mysqli_num_rows($result);
var_dump($quantity);
?>


<div class="recipesWrapper">
    <div class="heading">
    <h2>Your Recipes:</h2>
    <?php

    ?>
    </div>
    <table>


            <?php
            for ($j = 0; $j<$quantity; $j++) {
                $row = mysqli_fetch_assoc($result);
                $_SESSION['title'] = $row['title'];
                $ingredients = JSON_decode($row['ingredients'], true);
                $method = JSON_decode($row['method'], true);
                $title = JSON_decode($_SESSION['title'], true);
                echo '<h3>' . $title['title'] . '</h3>';
            echo "<table class=\"recipeTable\" id=\"table\"><tbody> <tr> <th class='col'>Step</th><th class='col'>Ingredients</th> <th class='col'>Method</th></tr>";

                for ($i = 0; $i < count($ingredients); $i++) {
                    echo "<tr><td>" . ($i + 1) . "</td>";
                    echo "<td>" . $ingredients[$i] . "</td>";
                    echo "<td>" . $method[$i] . "</td></tr>";
                }
            echo "</tbody></table>";
            }
            ?>

</div>


</body>
