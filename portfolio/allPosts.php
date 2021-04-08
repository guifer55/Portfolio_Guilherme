<?php
    include 'includes/db/dbConnection.php';
    include "includes/header.php";
    $pageTitle = "Blog Posts";
?>
<main class="container" style="margin-top:5%">

<div class="pt-5"></div>
    <div class="form-wrapper">
        <div class="heading text-center">
            <div class="mt-5"></div>
            <h4 class="text-center">Search for blog post</h4><br>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="widget-sidebar sidebar-search">

                        <div class="mt-2"></div>
                        <div>
                            <form action="allPosts.php" method="POST">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="searchText"
                                        placeholder="Search by blog category, skill, or title" aria-label="Search for...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-secondary ml-4" type="submit"> Search
                                            <span class="ion-android-search"></span>
                                        </button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <?php

if ($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST['searchText'])) {
    $searchText = $_POST['searchText'];
    
    $sql = "Select blog.id, title, posted_at, teaser,
    image_path, categories.name  from blog 
    INNER JOIN categories ON blog.blog_category_fk = categories.id 
    WHERE title LIKE concat('%','$searchText' ,'%') OR categories.name  LIKE concat('%','$searchText','%')";
    $result = $dbLink->query($sql);
} else if(empty($_POST['searchText'])) {
    $sql = 'Select blog.id, title, posted_at, teaser,
    image_path, categories.name   from blog 
    INNER JOIN categories ON blog.blog_category_fk = categories.id  WHERE blog.id > 0';
    $result = $dbLink->query($sql);
}else{
    echo '<p class="text-danger font-weight-bold mt-5">No projects match the search</p>';
}


    function n12br2($string)
    {
        $string = str_replace(array("\\r\\n", "\\r", "\\n"), "<br />", $string);
        return $string;
    }

    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $image_path = $row['image_path'];
        $title = $row['title'];
        $teaser = n12br2($row['teaser']);
        $date = strtotime($row['posted_at']);
        $category = $row['name'];

        $_SESSION['post_update'] = $row['id']; ?>
                    <br><br>
                    <div class="container">
                        <div class="col text-center border  border-0 px-4 py-4"
                            style="border-color: coral; border-width: thin;">
                            <div>
                                <h3><?php echo $title ?></h3>
                                <p class="font-italic text-muted">By &nbsp Guilherme Ferreira &nbsp &nbsp Posted &nbsp
                                    <?php print date("F jS,  Y", $date);
        echo "&nbsp &nbsp Category &nbsp ". "$category"
                                    ?>
                                    
                                    </p>
                            </div>
                            <div>
                                <img src="<?php echo $image_path ?>" class="img-fluid" alt="" width=30%>
                            </div>
                            <br>
                            <div class="text-justify">
                                <p><?php echo $teaser ?></p>
                            </div>

                            <br>
                            <?php
            echo "<a class='btn btn-secondary btn-md' href=\"blogindividual.php?id=$row[id]\">Continue Reading</a>"; ?>
                            <?php if (isset($_SESSION['username'])) {
                echo "<a class='btn btn-secondary btn-md' href='updatePost.php?id=$id'>Update</a> ";
                echo "<a class='btn btn-secondary btn-md' href=\"deletePost.php?id=$id\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
            } ?>
                        </div>
                    </div>

                </div>
                <div class="mt-5"></div>
</main>
<?php
    }
$result->close();
$dbLink->close();
?>
<br>
<?php
include "includes/footer.php";
?>