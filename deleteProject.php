<?php
    $pageTitle = 'Delete Project';
    include 'includes/header.php';
    include 'includes/db/dbConnection.php';
?>
<?php

$id = $_GET['id'];

$dbLink = connect('guilherme_portfolio');
$result = mysqli_query($dbLink, "DELETE FROM projects WHERE id=$id");
 
?>
<div class="mt-4">
<a class="btn btn-dark" href="allProjects.php" role="button">Back To All Projects</a>
