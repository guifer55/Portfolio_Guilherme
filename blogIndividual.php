<?php
    include 'includes/db/dbConnection.php';
    include "includes/header.php";
    $pageTitle = "individual blog page";

?>


<main class="container" style="margin-top:5%">

    <div class="pt-5"></div>

    <div class="form-wrapper">
        <div class="heading text-center">
            <div class="mt-5"></div>

            <?php

  $blogId = isset($_GET['id']) ? intval($_GET['id']) : 1;

  $sql = "Select blog.id, title, posted_at, content,
    image_path, categories.name   from blog 
    INNER JOIN categories ON blog.blog_category_fk = categories.id
    WHERE  blog.id = $blogId";

    $result = $dbLink->query($sql);
          
  function nl2br2($string)
  {
      $string = str_replace(array("\\r\\n", "\\r", "\\n"), "<br />", $string);
      return $string;
  }

  while ($row = $result->fetch_assoc()) {
      ?>

            <section>

                <img src="<?php echo $row['image_path']?>" class="img-fluid" alt="">
        </div>
        <div class="mt-3"></div>
        <div class="text-center">
            <h1 class="article-title"><?php echo $row['title'] ?></h1>
            <i class="fas fa-user-alt"></i>
            <span class="text-info mr-3">Guilherme Ferreira</span>
            <i class="fas fa-book-open"></i>
            <span class="text-info mr-3"><?php echo $row['name'] ?></span>
            <i class="fas fa-calendar"></i>
            <span class="text-info mr-3"><?php $date = strtotime($row['posted_at']);
      echo date('F d, Y', $date); ?></span>

        </div>
        <div class="mt-5"></div>
        <div class="article-content">
            <p>
                <?php echo nl2br2($row['content']); ?>
            </p>
        </div>
    </div>
    <?php
  }
          ?>
    </section>
    <div class="mb-5"></div>
    <div>
        <h5>Skills: </h5>
        <?php
                  $sql = "SELECT  skills.id, skills.description FROM blog_skills
                  INNER JOIN skills  ON skills.id = blog_skills.skill_id 
                  WHERE blog_skills.blog_id  = $blogId";

                $resultTag = $dbLink->query($sql);

                  while ($row = $resultTag->fetch_assoc()) {
                      ?>

        <i class="fas fa-tag text-muted"></i>
        <span class="mr-3"><?php echo $row['description']; ?></span>
        <?php
                  }
                  $result->close();
                  $resultTag->close();
                  $dbLink->close();
                  ?>
    </div>
    </div>

    </div>
    </div>
    <div class="mb-5"></div>

</main>

<?php
include "includes/footer.php";
?>