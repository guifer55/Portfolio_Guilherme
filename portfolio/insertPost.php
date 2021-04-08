<?php
    $pageTitle = 'Insert Post';
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
            <h2>Insert Post</h2>

            <form action="insertPost.php" method="POST">
                <div class="form-group">
                    <label for="image_path">Image Path</label>
                    <input type="text" class="form-control" id="image_path" name="image_path">
                </div>

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" id="editor" name="content" rows="20" value=""></textarea>
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
                    <input type="text" class="form-control" id="teaser" name="teaser">
                </div>

                <button type="submit" class="btn btn-dark" name="btnInsert" value="insert">Insert New Blog</button>
                <div class="mb-5"></div>
            </form>

            <?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
                            if ($_POST["btnInsert"] == "insert") {
                                $image_path = $_POST['image_path'];
                                $title = $_POST['title'];
                                $content = $_POST['content'];
                                $selected = $_POST['category'];
                                $teaser = $_POST['teaser'];

                                if (!empty($image_path) && !empty($title) && !empty($content) && ($selected) > 0 && !empty($teaser)) {
                                    $dbLink = connect('guilherme_portfolio');
                                    $msg = insertPost($dbLink, $image_path, $title, $content, $selected, $teaser);
                                    $LAST_ID = $dbLink->insert_id;
                                    $skills = $_POST['skill'];
                                    foreach ($skills as $i) {
                                        $sql2 = "INSERT INTO blog_skills(blog_id, skill_id) VALUES ($LAST_ID, $i)";
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