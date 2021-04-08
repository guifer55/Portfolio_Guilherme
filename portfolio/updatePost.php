<?php
    $pageTitle = 'Update Post';
    include 'includes/header.php';
    include 'includes/db/dbConnection.php';
    
    $id = $_GET["id"];
?>

<?php
if (!isset($_SESSION['username'])) {
    redirect_to('login.php');
} else {
?>

<main class="container" style="margin-top:10%">

    <div class="pt-5"></div>
    <div class="form-wrapper">
        <div class="heading text-center">
            <?php
if (isset($_GET["id"])) {
    
            $sql = "SELECT * FROM blog WHERE id = $id";
            $result = $dbLink->query($sql);

            function n12br2($string) {
                $string = str_replace(array("\\r\\n", "\\r", "\\n"), "<br />", $string);
                return $string;
            }

            while ($row = $result->fetch_assoc()) {
            
                $id = $row['id'];
                $image_path = $row['image_path'];
                $title = $row['title'];
                $content = n12br2($row['content']);
                $teaser = $row['teaser'];
                $date = strtotime($row['posted_at']);
            ?>
            <h2>Update Post</h2>

            <form action="updatePost.php" method="POST">
                <div class="form-group">
                    <label for="image_path">Image Path</label>
                    <input type="text" class="form-control" id="image_path" name="image_path" required
                        value="<?php echo $image_path ?>">
                </div>

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required
                        value="<?php echo $title ?>">
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" id="editor" name="content" required rows="20"
                        value=""><?php echo $content ?></textarea>
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

                <div class="form-group">
                    <label for="title">Teaser</label>
                    <input type="text" class="form-control" id="teaser" name="teaser" value="<?php echo $teaser ?>">
                </div>

                <input type="hidden" name="id" value=<?php echo $id;?>>

                <button type="submit" class="btn btn-dark" name="btnUpdate" value="update">Update</button>
                
                <div class="mt-4">
                    <a class="btn btn-dark" href="allPosts.php" role="button">Back To All Posts</a>
                </div>

                

                <?php
        //check if form was posted
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if ($_POST["btnUpdate"] == "update") {

            $image_path = $_POST['image_path'];
            $title = $_POST['title'];
            $content = $_POST['content'];
            $teaser = $_POST['teaser'];
            $selected = $_POST['category'];

            if(!empty($image_path) && !empty($title) && !empty($content) && ($selected) > 0 && !empty($teaser)){
                $dbLink = connect('guilherme_portfolio');
                $sql = "UPDATE blog SET image_path = ?, title = ?, content = ?, blog_category_fk = ?, teaser = ? WHERE id = $id";

                $result = $dbLink->query($sql);

                if ($stmt = $dbLink->prepare($sql)) {
                    $stmt->bind_param('sssis', $image_path, $title, $content, $selected, $teaser);
                    $stmt->execute();

                    echo '<p class="text-danger font-weight-bold mt-5">Blog post was updated successfully.</p>';
                }
                redirect_to('allPosts.php');
            }else{
                echo '<p class="text-danger font-weight-bold mt-5">Please don`t leave any blank fields.</p>';
            }
            $stmt->close();
            $result->close();
        }
    }
}
?>
                
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