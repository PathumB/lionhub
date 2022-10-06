<?php
session_start();
require "connection.php";
if (isset($_SESSION["u"])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Daily Shop | Contact</title>

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

        <!-- Alerts -->
        <link rel="stylesheet" href="other/snackbar.min.css">

        <!-- Main style sheet -->
        <link href="css/style.css" rel="stylesheet">

        <!-- Google Font -->
        <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
        <script>(function(w, d) { w.CollectId = "618b7f3e11c7462f21dec261"; var h = d.head || d.getElementsByTagName("head")[0]; var s = d.createElement("script"); s.setAttribute("type", "text/javascript"); s.async=true; s.setAttribute("src", "https://collectcdn.com/launcher.js"); h.appendChild(s); })(window, document);</script>

    </head>

    <body>

        <!-- SCROLL TOP BUTTON -->
        <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
        <!-- END SCROLL TOP BUTTON -->


        <?php
        require "header.php";
        ?>

        <!-- catg header banner section -->
        <section id="aa-catg-head-banner">
            <img src="resources/contact.jpg">
            <div class="aa-catg-head-banner-area">
                <div class="container">
                    <div class="aa-catg-head-banner-content">
                        <h2>Contact</h2>
                        <ol class="breadcrumb">
                            <li><a href="index.php">Home</a></li>
                            <li class="active">Contact</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <!-- / catg header banner section -->
        <!-- start contact section -->
        <section id="aa-contact">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="aa-contact-area">
                            <div class="aa-contact-top">
                                <h2>We are wating to assist you..</h2>
                                <p>Please send us your problem. We'll solve it within 24 hours. Have a good day.</p>
                            </div>
                            <!-- contact map -->

                            <!-- Contact address -->
                            <div class="aa-contact-address">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="aa-contact-address-left">
                                            <div class="comments-form contact-form">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input id="contactName" name="name" type="text" placeholder="Your Name" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">

                                                            <?php
                                                            $emailr;
                                                            $em = Database::search("SELECT * FROM user WHERE `email` = '" . $_SESSION["u"]["email"] . "' ");
                                                            $emn = $em->num_rows;

                                                            if ($emn >= 1) {
                                                                $emr = $em->fetch_assoc();
                                                                $emailr = $emr["email"];
                                                            } else {
                                                                $emailr = "";
                                                            }
                                                            ?>

                                                            <input id="contactEmail" name="email" type="email" value="<?php echo $emailr; ?>" placeholder="Email" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input id="contactSubject" name="subject" type="text" placeholder="Subject" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input id="contactCompany" name="company" type="text" placeholder="Company" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <textarea id="contactMessage" name="message" class="form-control" rows="3" placeholder="Message"></textarea>
                                                </div>
                                                <button onclick="contactForm();" class="aa-secondary-btn">Send</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="aa-contact-address-right">
                                            <address>
                                                <h4>LION HUB</h4>
                                                <p>First and Last Name. Obviously, getting the contact's name is the most important field to include on a contact form.</p>
                                                <p><span class="fa fa-home"></span>9th mile Post, Udawaththakumbura, Hanguranketha</p>
                                                <p><span class="fa fa-phone"></span>+94 728125203</p>
                                                <p><span class="fa fa-envelope"></span>Email: pathumbandarame@gmail.com</p>
                                            </address>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="aa-contact-map">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63320.43003471109!2d80.59076178919267!3d7.294543952143359!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae366266498acd3%3A0x411a3818a1e03c35!2sKandy!5e0!3m2!1sen!2slk!4v1635617057675!5m2!1sen!2slk" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                                <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3902.3714257064535!2d-86.7550931378034!3d34.66757706940219!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8862656f8475892d%3A0xf3b1aee5313c9d4d!2sHuntsville%2C+AL+35813%2C+USA!5e0!3m2!1sen!2sbd!4v1445253385137"
                                width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe> -->
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- tankyou section -->
        <?php
        require "other/thankyou.php";
        ?>
        <!-- tankyou section -->


        <?php
        require "footer.php";
        ?>

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

        <!-- Alerts -->
        <script src="other/snackbar.min.js"></script>

    </body>

    </html>
<?php
} else {
?>
    <script>
        window.location = "signinSignUp.php";
    </script>
<?php
}
?>