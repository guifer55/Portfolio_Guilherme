<?php
    $pageTitle = 'Delete Post';
    include 'includes/header.php';
    include 'includes/db/dbConnection.php';
?>
<?php
$id = $_GET['id'];
 
$dbLink = connect('guilherme_portfolio');
$result = mysqli_query($dbLink, "DELETE FROM blog WHERE id=$id");
 
header("Location: allPosts.php");
?>