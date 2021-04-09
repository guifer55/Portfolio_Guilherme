<?php
    $pageTitle = "Login";
    include 'includes/header.php';
?>
<main class="container" style="margin-top:5%">

    <div class="pt-5"></div>
    <div class="form-wrapper">
        <div class="heading text-center">
            <?php
    if (isset($_SESSION['username'])) {
        echo '<div class="mt-5"></div>';
        echo "You are logged in as ", $_SESSION['username'];
        echo '<li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="allPosts.php">All Posts</a></li>';
    } else if ($_SERVER['REQUEST_METHOD'] == "POST") {

        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            $username = htmlentities($_POST['username']);
            $password = htmlentities($_POST['password']);

            $dbName = connect('guilherme_portfolio');
            $authId = getLoggedInId($dbName, $username, $password);

            if ($authId > 0) {
                $_SESSION['username'] = $username;
                $_SESSION['authId'] = $authId;
                header("Location: index.php"); 
                exit();
            } else {
                echo '<p class="text-danger font-weight-bold mt-5">Incorrect username or password.</p>';
            }
        } else {
            echo '<p class="text-danger font-weight-bold mt-5">Please fill out both fields</p>';
        } 
    } else {
        if (isset($_GET['logout'])) {
            if ($_GET['logout'] == 1) {
                echo "You have been logged out";
            }
        }
    }
    ?>
            <?php
if (!isset($_SESSION['username']))  {
    ?>

            <form action="login.php" method="post">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>

                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>

    </div>
</main>

<?php
}
?>