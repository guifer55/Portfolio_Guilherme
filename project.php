<?php
    $pageTitle = 'Project Details';
    include 'includes/header.php';
    include 'includes/db/dbConnection.php';
    
?>

<main class="container" style="margin-top:5%">
    <div class="pt-5"></div>
    <div class="form-wrapper">
        <div class="heading text-center">
            <div class="mt-5"></div>

            <?php

    //c
    $id = isset($_GET['id']) ? intval($_GET['id']) : 1;

    $sql = "Select projects.id, title, description,
    image, video, categories.name from projects 
    INNER JOIN categories ON projects.project_category_fk = categories.id 
    WHERE projects.id  = $id";

    $result = $dbLink->query($sql);

    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $title = $row['title'];
        $description = $row['description'];
        $image = $row['image'];
        $video = $row['video'];
        $category = $row['name'];
    }

        $result->close();
         ?>
            <div class="row ml-auto mr-auto d-flex justify-content-center mb-5">

                <div class="col-8">
                    <div class="mt-3"></div>
                    <h1 class="page-section-heading text-center text-info mb-5"><?php echo $title ?></h1>
                    <div class="text-dark mb-3"><?php echo $description ?></div>
                    <div class="card mb-5">
                        <img class="h-50" src="./uploads/<?php echo $image ?>" alt="Card image cap">
                    </div>
                    <div class="mt-5 border-top my-8"></div>
                    <div class="embed-responsive embed-responsive-16by9 mt-5">
                        <iframe class="embed-responsive-item mb-5"
                            src="https://www.youtube.com/embed/<?php echo $video?>" allowfullscreen></iframe>
                    </div>
                    <div class="mt-5 border-top my-5"></div>
                    <h1 class="page-section-heading text-center text-secondary mb-5"><?php echo $title ?> additional
                        images
                    </h1>
                    <div class="divider-custom">
                        <div class="divider-custom-line"></div>
                        <div class="divider-custom-icon">
                        </div>
                    </div>

                    <div class="text-center">
                        <?php
                    $images = array();
                    $sql = "SELECT id, path, project_fk FROM images WHERE project_fk = $id";
                    $resultImg = $dbLink->query($sql);

                    while ($row = $resultImg->fetch_assoc()){
                        $id = $row['project_fk'];
                        array_push($images, $row['path']);
                        $projectId = $row['project_fk'];      
                    }
                    ?>
                    </div>
                </div>

                <!-- <div class="col-8">
                    <div class="row"> -->
                        <div class="mb-3">
                            <?php foreach ($images as &$imgs) {
                        ?>
                            <img src="./uploads/<?php echo $imgs ?>" class="img-fluid " alt="">
                        </div>

                    <!-- </div> -->
                    <?php } ?>
                <!-- </div> -->
            </div>

            <div class="mb-5"></div>
            <div>
                <h5>Skills: </h5>
                <?php
                  $sql = "SELECT  skills.id, skills.description FROM projects_skills
                  INNER JOIN skills  ON skills.id = projects_skills.skill_id 
                  WHERE projects_skills.project_id  = $id";

                $resultTag = $dbLink->query($sql);

                  while ($row = $resultTag->fetch_assoc()) {
                      ?>

                <i class="fas fa-tag text-muted"></i>
                <span class="mr-3"><?php echo $row['description']; ?></span>
                <?php
                  }
                  $resultTag->close();
                  $dbLink->close();
                  ?>
            </div>
            <div class="mb-5"></div>
            <div>
                <div class="row ml-auto mr-auto d-flex justify-content-center mb-5">
                    <a class='btn btn-secondary btn-md text-center' href="allProjects.php">Back to All
                        Projects</a></td>

                </div>
            </div>
        </div>

</main>
<?php
    include 'includes/footer.php';
?>