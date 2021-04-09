<?php
include 'includes/functions.php';
//one function for the connection
function connect($dbName){
    $dbLink = new mysqli('localhost', 'dev', 'Dev1234$', $dbName) 
    or die("Thre is a problem connecting to the database");
    return $dbLink;
}

function insertPost($conn, $image_path, $title, $content, $selected, $teaser){
    //$id = $_SESSION['id'];
    $sql = "INSERT INTO blog(image_path, title, content, blog_category_fk, teaser) VALUES (?,?,?,?,?)";
    if($stmt = $conn->prepare($sql)){

        $stmt->bind_param('sssis', $image_path, $title, $content, intVal($selected), $teaser);
        $stmt->execute();
        $stmt->close();
        $msg = "Successfully inserted $title. New record id is ". $conn->insert_id;
    }else{
        $msg = "Error inserting record";
    }
    return $msg;
}

function insertProject($conn, $title, $description, $image, $video, $category){
    $sql = "INSERT INTO projects(title, description, image, video, project_category_fk) VALUES (?,?,?,?,?)";
    if($stmt = $conn->prepare($sql)){

        $stmt->bind_param('ssssi', $title, $description, $image, $video, intVal($category));
        $stmt->execute();
        $stmt->close();
        $msg = "Successfully inserted $title. New record id is ". $conn->insert_id;
    }else{
        $msg = "Error inserting record";
    }
    return $msg;
}

//NOT SURE
function updatePost($conn, $image_path, $title, $content){
    $sql = "UPDATE blog SET image_path = ?, title = ?, content = ? WHERE id = $id"; //???
    if($stmt = $conn->prepare($sql)){

        $stmt->bind_param('sss', $image_path, $title, $content);
        $stmt->execute();
        $stmt->close();
        $msg = "Successfully inserted $title ";
    }else{
        $msg = "Error updating record";
    }
    return $msg;
}


function getLoggedInId($conn, $uName, $pWord) {
    $sql = "select id from users where username = ? and password = ?";
    if($stmt = $conn->prepare($sql)){

        $stmt->bind_param('ss', $uName, $pWord);
        $stmt->execute();
        $stmt->bind_result($id);
        $authId = 0;
        while($stmt->fetch()){
            $authId = $id;
        }
        $stmt->close();
        return $authId;

    }
}

//UPDATE BLOG IS HERE
if(isset($_POST["btnUpdate"])){

    $image_path = $_POST['image_path'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $teaser = $_POST['teaser'];
    $selected = $_POST['category'];
    $id = $_POST['id'];

    $dbLink = connect('guilherme_portfolio');
    $dbLink->query("UPDATE blog SET image_path = '$image_path', title = '$title', content = '$content', blog_category_fk = '$selected', teaser = '$teaser' WHERE id = $id") or die($dbLink->error);
    echo '<p class="text-danger font-weight-bold mt-5">Blog post was updated successfully.</p>';
    redirect_to("allPosts.php");
}

if(isset($_POST['btnDelete'])) {
    $dbLink = connect('guilherme_portfolio');
    $id = $_POST['id'];     

    $dbLink->query("DELETE FROM blog WHERE id=$id") or die($mysqli->error());
    echo "Blog post was deleted successfully. <br /><br />
    <a href='projects.php' class='btn btn-secondary'>Back</a>";
    header('location: ../../index.php');
}

?>







