<?php
    $pageTitle = 'Resume';
    include 'includes/header.php';    
?>

<main class="container" style="margin-top:10%">
    <div class="pt-5"></div>
    <div class="form-wrapper">
        <?php
    if (!isset($_POST['submit'])) { ?>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"
            integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8 col-lg-6 pb-5">
                    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                        <div class="card border-dark rounded-0">
                            <div class="card-header p-0">
                                <div class="card bg-light mb-3 text-center">
                                    <h3><i class="fa fa-envelope"></i> Contact Me</h3>
                                </div>
                            </div>
                            <div class="card-body p-3">

                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-envelope text-info"></i></div>
                                        </div>
                                        <input type="email" class="form-control" name="to_email"
                                            placeholder="example@gmail.com" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-envelope text-info"></i></div>
                                        </div>
                                        <input type="text" class="form-control" name="subject"
                                            placeholder="Enter subject here" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-comment text-info"></i></div>
                                        </div>
                                        <textarea class="form-control" placeholder="Send a message" name="message"
                                            required></textarea>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <input type="submit" name="submit" value="Send"
                                        class="btn btn-dark btn-block rounded-0 py-2">
                                </div>
                            </div>

                        </div>
                    </form>

                    <?php
            } else {
                if (isset($_POST['to_email'])) {

                    $to_email = $_POST['to_email'];
                    //$from_email = $_POST['from_email'];
                    $subject = $_POST['subject'];
                    $message = $_POST['message'];
                    

                    $htmlBody = '<html> <body> <h1 style="color: #AA3333;">Thank You</h1> <p>Thank you for contacting me. 
                    I\'ll be in touch shortly.</p> </body> </html>';

                    $headers = "MIME-Version: 1.0 \r\n";
                    $headers .= "Content-type: text/html; charset=utf-8 \r\n";
                    //$headers .= "From: $from_email \r\n";
                    $headers .= "Cc:bob@test.com \r\n";

                    

                    if (mail($to_email, $subject, $message, $htmlBody, $headers)) {
                        echo "<h2>Success, mail sent to $to_email</h2><br> <div> <a href='" . $_SERVER["PHP_SELF"] . "'>Send another message to Guilherme </a></div>";
                    } else {
                        echo "Mail failed to send.";
                    }
                }
            }
         ?>
                </div>
            </div>

        </div>
        <div class="mt-5"></div>
</main>
<?php
    include 'includes/footer.php';
?>