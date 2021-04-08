<?php
    include 'includes/db/dbConnection.php';
    include "includes/header.php";
    $pageTitle = "Portfolio";
?>

<main class="container" style="margin-top:5%">

    <div class="pt-5"></div>
    <div class="form-wrapper">
        <div class="heading text-center">
            <div class="mt-5"></div>
            <h5 class="text-center">Search for Project</h5>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="widget-sidebar sidebar-search">

                        <div class="mt-2"></div>
                        <div>
                            <form action="allProjects.php" method="POST">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="searchText"
                                        placeholder="Search by project category, skill, or title"
                                        aria-label="Search for...">
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
    
    $sql = "Select projects.id, title, description,
    image, video, categories.name from projects 
    INNER JOIN categories ON projects.project_category_fk = categories.id 
    WHERE title LIKE concat('%','$searchText','%') OR categories.name  LIKE concat('%','$searchText','%')";
    $result = $dbLink->query($sql);
} else {
    $sql = 'Select projects.id, title, description,
    image, video, categories.name from projects 
    INNER JOIN categories ON projects.project_category_fk = categories.id  WHERE projects.id > 0';
    $result = $dbLink->query($sql);
}

    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $title = $row['title'];
        $description = $row['description'];
        $image = $row['image'];
        $video = $row['video'];
        $category = $row['name'];

        $_SESSION['post_update'] = $row['id']; ?>

                    <br><br>

                    <div class="container">
                        <div class="col text-center border  border-0 px-4 py-4"
                            style="border-color: coral; border-width: thin;">

                            <div>
                                <h2><?php echo $title ?></h2>
                                <p class="font-italic text-muted">
                                    <?php echo "&nbsp &nbsp Category: &nbsp ". "$category"
                                    ?>
                                </p>
                            </div>
                            <div>
                                <img src="./uploads/<?php echo $image ?>" class="img-fluid" alt="">
                            </div>
                            <br>
                            <div class="text-justify">
                                <p><?php echo $description ?></p>
                            </div>
                            <br>
                            <?php if (isset($_SESSION['username'])) {
            echo "<a class='btn btn-secondary btn-md' href='updateProject.php?id=$id'>Update</a> ";
            echo "&nbsp<a class='btn btn-secondary btn-md' href=\"deleteProject.php?id=$id\" onClick=\"return confirm('Are you sure you want to delete this project?')\">Delete</a></td>";
            echo "&nbsp<a class='btn btn-secondary btn-md' href=\"insertImage.php?id=$id\">Add an image</a></td>";
        }
        echo "&nbsp<a class='btn btn-secondary btn-md' href=\"project.php?id=$id\">View Project Details</a></td>"; ?>
                        </div>
                    </div>

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