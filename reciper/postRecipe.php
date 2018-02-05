<?php
if(isset($_POST['metData'])) {

    session_start();
    $ing = ($_POST['ingData']);
    $met = ($_POST['metData']);
    $title = $_POST['titleData'];
    require ('db.php');
    $activeUser = $_SESSION['u_id'];
    $sql = ("INSERT INTO recipes (owner, title, method, ingredients) VALUES ('$activeUser', '$title', '$met', '$ing');");
    $result = mysqli_query($_db, $sql);
    header('location: http://localhost/reciper/recipes.php/');
    exit;
}
?>