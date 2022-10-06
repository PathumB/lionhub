<?php
session_start();
require "connection.php";

if (isset($_SESSION["u"])) {

    $admin1 = Database::search("SELECT * FROM `admin` WHERE `email` = '" . $_SESSION["u"]["email"] . "' ");
    $admin1r = $admin1->num_rows;

    if ($admin1r == 1) {



?>
        <!DOCTYPE html>
        <html lang="en">

        <head>

            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>LION HUB | Admin Signin</title>

            <link href="other/icon.png" rel="icon">
            <link rel="stylesheet" href="other/bootstrap.css" />
            <link rel="stylesheet" href="other/bootstrap-icons.css" />
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
            <link rel="stylesheet" href="other/invoice.css" />
            <!-- Alerts -->
            <link rel="stylesheet" href="other/snackbar.min.css">

        </head>

        <body style="background-image: url('resources/profilebackground.jpg'); background-repeat: no-repeat; background-size: cover;">



            <div class="container-fluid vh-100 justify-content-center" style="margin-top: 100px;">
                <div class="row align-content-center">

                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 logo"></div>
                            <div class="col-12">
                                <p class="text-center title1" style="font-family: 'calibri';">Welcome To <span class="text-danger">LION HUB</span> Admins</p>
                                <p class="text-center">You need to verify the code sent to your email. Because we need to verify that you are an Admin or fake guy.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 p-5">
                        <div class="row">
                            <div class="col-12 d-none d-lg-block background"></div>
                            <div class="col-12 col-lg-12 d-block">
                                <div class="row g-3">
                                    <div class="col-12 ">
                                        <h3 style="font-family: 'calibri';">Sign In To Your Account</h3>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Enter Your Email Address <span style="color: red;">*</span></label>
                                        <input placeholder="email address : admin@gmail.com" style="border-color: black;" id="e" type="email" class="form-control" name="" id="">
                                    </div>
                                    <div class="col-12 col-lg-4 d-grid">
                                        <button class="btn btn-primary" onclick="sendverification();">Send Verification Code To Login</button>
                                    </div>
                                    <div class="col-12 col-lg-4 d-grid">
                                        <a href="signinSignUp.php" class="btn btn-danger">Back To User's Login</a>
                                    </div>
                                    <div class="col-12 col-lg-4 d-grid">
                                        <a href="index.php" class="btn btn-dark">Home Page</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Modal -->
                    <div class="modal fade" id="verificationModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">Admin Verification</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <label for="" class="form-label">Enter the verification Code you got by an email</label>
                                    <input id="v" type="text" class="form-control">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" onclick="verify();">Verify</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-12 d-none d-lg-block fixed-bottom jus">
                        <div class="row">
                            <p class="text-center">&copy;2021 LION HUB.lk All Rights Reserved.</p>
                        </div>
                    </div>

                </div>
            </div>







            <script src="other/script.js"></script>
            <script src="other/bootstrap.bundle.js"></script>
            <!-- Alerts -->
            <script src="other/snackbar.min.js"></script>
        </body>

        </html>
    <?php
    }else{
        ?>
        <script>
            window.location = "signinSignUp.php";
        </script>
    <?php
    }
} else {
    ?>
    <script>
        window.location = "signinSignUp.php";
    </script>
<?php
}
?>