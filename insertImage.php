<?php
    $pageTitle = 'Update Post';
    include 'includes/header.php';
    include 'includes/db/dbConnection.php';
    
    $id = $_GET["id"];
?>

<?php
    confirm_logged_in(); ?>
<main class="container" style="margin-top:10%">
    <div class="pt-5"></div>
    <div class="form-wrapper">
        <div class="heading text-center">
            <h2>Insert Image</h2>
            <form action="insertImage.php?id=<?php echo $id?>" method="POST" enctype="multipart/form-data">
                <div class="mb-5">
                    <label for="theImage"><b>Image Upload</b></label>
                    <a class="btn btn-outline-secondary">
                        <div class="file-field medium">
                            <input type="file" name="theImage">
                        </div>
                    </a>
                    <input type="hidden" name="form" value=<?php echo $_GET["id"] ?>>
                    <button type="submit" class="btn btn-dark" name="btnInsertImage" value="insertImg">Insert</button>
                </div>
            </form>
            <?php
        if (isset($_SESSION["username"])) {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if ($_POST["btnInsertImage"] == "insertImg") {
                    $form = $_POST["form"];

                    $image = $_FILES['theImage']['name'];
                    $temp_name = $_FILES['theImage']['tmp_name'];
                    
                        if (isset($image)) {
                            if (!empty($image)) {
                                $location = './uploads/';
                                
                            if (move_uploaded_file($temp_name, $location. $image)) {
                                echo '<h5 class="font-weight-bold mt-5">Image was uploaded!</h5>';
                            } 
                        }
                            $sql = "INSERT INTO images(path, project_fk, blog_fk) VALUES (?,?,?)";
                            $result = $dbLink->query($sql);
                            if ($stmt = $dbLink->prepare($sql)) {
                                $stmt->bind_param('sii', $image, $form, $blog_fk);
                                $stmt->execute();
        
                            }
                          } 
                        $stmt->close();
                }
            }
        }
     ?>

            </form>
        </div>
    </div>

    </div>
</main>
<?php
    include 'includes/footer.php';
?>