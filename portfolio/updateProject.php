<?php
    $pageTitle = 'Update Post';
    include 'includes/header.php';
    include 'includes/db/dbConnection.php';
    
    $id = $_GET["id"];
?>

<?php
if (isset($_GET["id"])) {
    confirm_logged_in(); ?>

<main class="container" style="margin-top:10%">

    <div class="pt-5"></div>
    <div class="form-wrapper">
        <div class="heading text-center">
            <?php
//getting id from url

    $sql = "SELECT * FROM projects WHERE id = $id";
    $result = $dbLink->query($sql);

    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $title = $row['title'];
        $description = $row['description'];
        $image = $row['image'];
        $video = $row['video'];
        $category = $row['project_category_fk'];

         ?>

            <h2>Update Project</h2>

            <form action="updateProject.php?id=<?php echo $id?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required
                        value="<?php echo $title ?>">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="editor" name="description" rows="10" required
                        value=""><?php echo $description ?></textarea>
                </div>


                <div class="form-group">
                    <label for="image">Image Upload</label><br>
                    <a class="btn btn-outline-secondary">
                        <div class="file-field medium">
                            <input type="file" name="theImage">
                        </div>
                    </a>
                </div>

                <div class="form-group">
                    <label for="video">Video</label>
                    <input type="text" class="form-control" id="video" name="video" required
                        value="<?php echo $video ?>">
                </div>

                <div class="form-group">
                    <label for="video">Category</label>
                    <input type="text" class="form-control" id="project_category_fk" name="project_category_fk" required
                        value="<?php echo $category?>">
                </div>

                <button type="submit" class="btn btn-dark" name="btnUpdateProject" value="updatePro">Update</button>

                <div class="mt-4">
                    <a class="btn btn-dark" href="allProjects.php" role="button">Back To All Projects</a>
                </div>
            </form>

            <?php
        if (isset($_SESSION["username"])) {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if ($_POST["btnUpdateProject"] == "updatePro") {
                    $title = $_POST['title'];
                    $description = $_POST['description'];
                    $video = $_POST['video'];
                    $category = $_POST['project_category_fk'];
            
                    $image = $_FILES['theImage']['name'];
                    $temp_name2 = $_FILES['theImage']['tmp_name'];
                    
                    if (!empty($title) && !empty($description) && !empty($video) && !empty($category)) {
                        
                
                        if (isset($image)) {
                            if (!empty($image)) {
                                $location = './uploads/';
                                
                            if (move_uploaded_file($temp_name2, $location. $image)) {
                                echo '<h5 class="font-weight-bold mt-5">Image uploaded</h5>';
                            } 
                        }

                        if (empty($image)) {
                            $dbLink = connect('guilherme_portfolio');
                            $sql = "UPDATE projects SET title = ?, description = ?, video = ?, project_category_fk = ? WHERE id = $id";
                            $result = $dbLink->query($sql);
        
                            if ($stmt = $dbLink->prepare($sql)) {
                                $stmt->bind_param('sssi', $title, $description, $video, $category);
                                $stmt->execute();
        
                                echo '<p class="text-danger font-weight-bold mt-5">Project was updated successfully.</p>';
                            }
                            break;                        } 
                        // $stmt->close();
                        // $result->close();
                    }
                }
            }
        }
    } ?>
            </form>

            <?php } ?>
            <?php } ?>

            <script src="ckeditor/ckeditor.js"></script>
            <script>
            CKEDITOR.replace("editor")
            </script>
        </div>
    </div>

    </div>
    <div class="mt-5"></div>
</main>
<?php
    include 'includes/footer.php';
?>