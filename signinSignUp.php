<?php
session_start();
require "connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-signin-client_id" content="352027670231-e7m87lri39ro7agf3666r6bls3ass85n.apps.googleusercontent.com">
    <title>LION HUB | Account Page</title>

    <link href="other/icon.png" rel="icon">
    <!-- Font awesome -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- SmartMenus jQuery Bootstrap Addon CSS -->
    <link href="css/jquery.smartmenus.bootstrap.css" rel="stylesheet">
    <!-- Product view slider -->
    <link rel="stylesheet" type="text/css" href="css/jquery.simpleLens.css">
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="css/slick.css">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="css/nouislider.css">
    <!-- Theme color -->
    <link id="switcher" href="css/theme-color/lite-blue-theme.css" rel="stylesheet">
    <!-- Top Slider CSS -->
    <link href="css/sequence-theme.modern-slide-in.css" rel="stylesheet" media="all">

    <!-- Main style sheet -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Alerts -->
    <link rel="stylesheet" href="other/snackbar.min.css">
   
    <!-- google signin -->
    <meta name="google-signin-client_id" content="352027670231-e7m87lri39ro7agf3666r6bls3ass85n.apps.googleusercontent.com">


    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <script>
        (function(w, d) {
            w.CollectId = "618b7f3e11c7462f21dec261";
            var h = d.head || d.getElementsByTagName("head")[0];
            var s = d.createElement("script");
            s.setAttribute("type", "text/javascript");
            s.async = true;
            s.setAttribute("src", "https://collectcdn.com/launcher.js");
            h.appendChild(s);
        })(window, document);
    </script>

</head>

<body>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
    <!-- END SCROLL TOP BUTTON -->


    <?php
    require "header.php";
    ?>



    <!-- catg header banner section -->
    <section id="aa-catg-head-banner">
        <img style="width: 1920px;" src="resources/signin.jpg">
        <div class="aa-catg-head-banner-area">
            <div class="container">
                <div class="aa-catg-head-banner-content">
                    <h2>Sign in &nbsp;&nbsp;/ &nbsp;&nbsp;Sign up</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Account</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <!-- / catg header banner section -->

    <!-- Cart view section -->
    <section id="aa-myaccount">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-myaccount-area">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="aa-myaccount-login">
                                    <h4>Register</h4>
                                    <div class="aa-login-form">

                                        <label for="">First Name<span>*</span></label>
                                        <input id="fname" type="text" placeholder="enter your first name..">

                                        <label for="">Last Name<span>*</span></label>
                                        <input id="lname" type="text" placeholder="enter your last name..">

                                        <label for="">Email address<span>*</span></label>
                                        <input id="email" type="text" placeholder="enter your email address">

                                        <label for="">Password<span>*</span></label>
                                        <input id="password" type="password" placeholder="Password">

                                        <label for="">Mobile Number<span>*</span></label>
                                        <input id="mobile" type="text" placeholder="enter your mobile number">

                                        <label for="">Gender<span>*</span></label>
                                        <br />
                                        <select class="form-control" id="gender">

                                            <?php


                                            $r = Database::search("SELECT * FROM `gender`");
                                            $n = $r->num_rows;
                                            for ($x = 0; $x < $n; $x++) {
                                                $d = $r->fetch_assoc();
                                            ?>
                                                <option value="<?php echo $d["id"]; ?>"><?php echo $d["name"]; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <br />
                                        <div class="form-group form-check">
                                            <input onclick="seller_or_not();" type="checkbox" class="form-check-input" id="register_as_seller"> &nbsp;&nbsp;
                                            <label class="form-check-label" for="register_as_seller">Register As a Seller</label>
                                        </div>
                                        <button type="submit" class="aa-browse-btn btn" onclick="signUp();">Register</button>
                                        <button type="submit" class="aa-browse-btn btn darkcolor" onclick="goToSigninSignup();">Reset</button>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="aa-myaccount-register">
                                    <h4>Login</h4>
                                    <div class="aa-login-form">

                                        <?php
                                        $e = "";
                                        $p = "";

                                        if (isset($_COOKIE["e"])) {
                                            $e = $_COOKIE["e"];
                                        }

                                        if (isset($_COOKIE["p"])) {
                                            $p = $_COOKIE["p"];
                                        }

                                        ?>

                                        <label for="">Email address<span>*</span></label>
                                        <input id="email2" value="<?php echo $e ?>" type="text" placeholder="enter your email address">

                                        <label for="">Password<span>*</span></label>
                                        <input id="password2" value="<?php echo $p ?>" type="password" placeholder="Password">

                                        <label class="rememberme" for="rememberme"><input checked type="checkbox" value="1" id="remember"> Remember me </label>
                                        <br />
                                        

                                        <button class="aa-browse-btn btn" onclick="signIn();">Login</button>

                                        <!-- Google Signin -->
                                        <div style="margin-top: 2px;" class="g-signin2 btn" data-onsuccess="onSignIn"></div>
                                        <div class="data">
                                            <p style="display: none;" id="google_name"></p>
                                            <p style="display: none;" id="google_email"></p>
                                        </div>
                                        <!-- Google Signin -->

                                        <?php

                                        if (isset($_SESSION["u"])) {


                                            $admin_check = Database::search("SELECT * FROM `admin` WHERE `email` = '" . $_SESSION["u"]["email"] . "'  ");
                                            $sr = $admin_check->num_rows;

                                            if ($sr == 1) {
                                        ?>
                                                <button style="background-color: red; width: 39%;" class=" btn btn-danger " onclick="adminsignin();">I am an ADMIN</button>
                                        <?php
                                            } else {
                                            }
                                        }
                                        ?>



                                        <br /> <br />
                                        <p data-toggle="modal" data-target="#forgetPasswordModal" style="cursor: pointer; color: blue;" class="aa-lost-password" onclick="forgotPassword()" ;>Lost your password?</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Cart view section -->

    <!-- footer -->
    <?php
    require "footer.php";
    ?>
    <!-- / footer -->



    <!-- FORGOT Modal -->
    <div class="modal fade" id="forgetPasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <img style="width: 30%; margin-left: auto; margin-right: auto; display: block;" src="other//icon.png" />
                    <h2 style="text-align: center;" class="modal-title" id="exampleModalCenterTitle">Reset Your Password</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label style="margin-left: 5px;" class="form-label">New Password</label>
                            <div class="modal-footer ">
                                <input class="form-control" type="password" id="np" />
                                <button class="btn btn-outline-primary" type="button" onclick="showPassword1();" id="npb">Show</button>
                            </div>
                        </div>

                        <div class="col-12">
                            <label style="margin-left: 5px;" class="form-label">Re-type Password</label>
                            <div class="modal-footer ">
                                <input class="form-control" type="password" id="rnp" />
                                <button class="btn btn-outline-primary" type="button" onclick="showPassword2();" id="rnpb">Show</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label style="margin-left: 5px;" class="form-label">Verification Code</label>
                            <input class="form-control " type="text" id="vc" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="resetPassword();">Reset</button>
                </div>
            </div>
        </div>
    </div>
    <!-- FORGOT Modal -->



    <?php
    require "loginmodel.php";
    ?>



    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.js"></script>
    <!-- SmartMenus jQuery plugin -->
    <script type="text/javascript" src="js/jquery.smartmenus.js"></script>
    <!-- SmartMenus jQuery Bootstrap Addon -->
    <script type="text/javascript" src="js/jquery.smartmenus.bootstrap.js"></script>
    <!-- To Slider JS -->
    <script src="js/sequence.js"></script>
    <script src="js/sequence-theme.modern-slide-in.js"></script>
    <!-- Product view slider -->
    <script type="text/javascript" src="js/jquery.simpleGallery.js"></script>
    <script type="text/javascript" src="js/jquery.simpleLens.js"></script>
    <!-- slick slider -->
    <script type="text/javascript" src="js/slick.js"></script>
    <!-- Price picker slider -->
    <script type="text/javascript" src="js/nouislider.js"></script>
    <!-- Custom js -->
    <script src="js/custom.js"></script>
    <script src="js/all.js"></script>
    <!-- google signin -->
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <!-- Alerts -->
    <script src="other/snackbar.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>

</html>