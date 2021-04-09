<?php
    $pageTitle = 'Insert Project';
    include 'includes/header.php';
?>

<?php
   if (!isset($_SESSION['username'])) {
       redirect_to('login.php');
   } else { ?>

<main class="container" style="margin-top:10%">

    <div class="pt-5"></div>
    <div class="form-wrapper">
        <div class="heading text-center">
            <h2>Insert Project</h2>

            <form action="insertProject.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="editor" name="description" rows="10" value=""></textarea>
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
                    <label for="video">Video Upload</label>
                    <input type="text" class="form-control" id="video" name="video">
                </div>

                <div class="form-group">
                    <label for="video">Category</label>
                    <?php
                    $dbLink = connect('guilherme_portfolio');
                    $sql = "SELECT * FROM categories WHERE id > 0";
                    $results = $dbLink->query($sql);

                    ?>
                    <select class="form-control" id="category" name="category">
                        <option value="0">Select a Category</option>

                        <?php
                        $id = 0;

                        if (!empty($_POST['category'])) {
                            $id = $_POST['category'];
                        }
                        while ($row = $results->fetch_assoc()) {
                            if ($row['id'] == $id) {
                                $selected = "selected='selected'";
                            } else {
                                $selected = "";
                            } ?>
                        <option value="<?php echo $row['id'] ?>" <?php echo $selected; ?>>
                            <?php echo $row['name'] ?>
                        </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="video">Skills</label>
                    <?php
                    $dbLink = connect('guilherme_portfolio');
                    $sql = "SELECT * FROM skills WHERE id > 0";
                    $results = $dbLink->query($sql);

                    ?>
                    <select class="form-control" id="skills" name="skill[]" multiple="multiple">
                        <option value="0">Select Skills</option>

                        <?php
                        $id = 0;

                        if (!empty($_POST['skill[]'])) {
                            $id = $_POST['skill[]'];
                        }
                        while ($row = $results->fetch_assoc()) {
                            if ($row['id'] == $id) {
                                $selectedOptions = "selectedOptions='selectedOptions'";
                            } else {
                                $selectedOptions = "";
                            } ?>
                        <option value="<?php echo $row['id'] ?>" <?php echo $selectedOptions; ?>>
                            <?php echo $row['description']?>
                        </option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-dark" name="btnInsert" value="insert">Insert New Project</button>
                <div class="mb-5"></div>
            </form>

            <?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
                            if ($_POST["btnInsert"] == "insert") {
                                $title = $_POST['title'];
                                $description = $_POST['description'];
        
                                $selected = $_POST['category'];
    
                                $video = $_POST['video'];

                                $image = $_FILES['theImage']['name'];
                                $temp_name2 = $_FILES['theImage']['tmp_name'];

                                if (isset($image)) {
                                    if (!empty($image)) {
                                        $location = './uploads/';
                                    }

                                    if (move_uploaded_file($temp_name2, $location. $image)) {
                                        echo '<h5 class="font-weight-bold mt-5">Image uploaded</h5>';
                                    } else {
                                        echo '<p class="text-danger font-weight-bold mt-5">You need to upload an image</p>';
                                    }
                                }

                                if (!empty($title) && !empty($description) && !empty($image) && !empty($video) && ($selected) > 0) {
                                    $dbLink = connect('guilherme_portfolio');
                                    $msg = insertProject($dbLink, $title, $description, $image, $video, $selected);
                                    $LAST_ID = $dbLink->insert_id;
                                    $skills = $_POST['skill'];
                                    foreach ($skills as $i) {
                                        $sql2 = "INSERT INTO projects_skills(project_id, skill_id) VALUES ($LAST_ID, $i)";
                                        $results2 = $dbLink->query($sql2);
                                    }
                                    echo $msg;
                                    $dbLink->close();
                                } else {
                                    echo "Fields cannot be empty";
                                }
                            }
                        }
   }
?>
            <script src="ckeditor/ckeditor.js"></script>
            <script>
            CKEDITOR.replace("editor")
            </script>
        </div>
    </div>

    </div>
</main>

<?php
    include 'includes/footer.php';
?>