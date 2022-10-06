<?php
session_start();
require "connection.php";

if (isset($_SESSION["u"])) {


    if (isset($_GET["seller_email"])) {
        $seller_email = $_GET["seller_email"];

?>



        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="css/message.css" />
            <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
            <meta charset='UTF-8'>
            <meta name="robots" content="noindex">
            <link rel="shortcut icon" type="image/x-icon" href="//production-assets.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" />
            <link rel="mask-icon" type="" href="//production-assets.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg" color="#111" />
            <link rel="canonical" href="https://codepen.io/emilcarlsson/pen/ZOQZaV?limit=all&page=74&q=contact+" />
            <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,300' rel='stylesheet' type='text/css'>
            <link rel="icon" href="other/icon.png" />
            <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>
            <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>
            <title>LionHub | Chat</title>
            <!-- Alerts -->
            <link rel="stylesheet" href="other/snackbar.min.css">
        </head>

        <body onload="refresher('<?php echo $seller_email ?>'),loop0();">




            <div id="frame">
                <div style="background-image: url('resources/chat_sidepannel.jpg'); background-repeat: no-repeat; background-size: cover;" id="sidepanel">
                    <div id="profile">
                        <div class="wrap">

                            <?php
                            $user = $_SESSION["u"];
                            $umail = $user["email"];

                            $userd = Database::search("SELECT * FROM `profile_img` WHERE `user_email` = '" . $umail . "' ");
                            $userr = $userd->num_rows;
                            if ($userr == 1) {
                                $user_dp = $userd->fetch_assoc();
                            ?>
                                <img style="width: 53px; height: 53px;" id="profile-img" src="<?php echo $user_dp["code"] ?>" class="online" alt="" />
                            <?php
                            } else {
                            ?>
                                <img style="width: 53px; height: 53px;" id="profile-img" src="resources/feedback_user.jpg" class="online" alt="" />
                            <?php
                            }
                            ?>


                            <p style="font-family: 'calibri';"><?php echo $user["fname"] . " " . $user["lname"]; ?></p>


                            <i class="fa fa-chevron-down expand-button" aria-hidden="true"></i>
                            <div id="status-options">
                                <ul>
                                    <li id="status-online" class="active"><span class="status-circle"></span>
                                        <p>Online</p>
                                    </li>
                                    <li id="status-offline"><span class="status-circle"></span>
                                        <p>Offline</p>
                                    </li>
                                </ul>
                            </div>
                            <div style="margin-left: 10px;" id="expanded">
                                <label for="twitter"><i class="fa fa-user" aria-hidden="true"></i></label>
                                <input disabled name="twitter" type="text" value="<?php echo $user["fname"] . " " . $user["lname"]; ?>" />
                                <label for="twitter"><i class="fa fa-envelope" aria-hidden="true"></i></label>
                                <input disabled name="twitter" type="text" value="<?php echo $user["email"]; ?>" />
                            </div>
                        </div>
                    </div>
                    <div id="search">
                        <label for=""><i class="fa fa-commenting" aria-hidden="true"></i></label>
                        <input style="text-align: center;" disabled type="text" placeholder="Your Recent Chats" />
                    </div>



                    <div style="margin-top: 1%;" id="contacts">
                        <ul id="rcv">

                            <!-- recent area -->

                        </ul>
                    </div>




                    <div id="bottom-bar">
                        <button style="background-color: #FFFFFF; color: black; font-weight: bolder;" onclick="goBack();" id="settings"><i class="fa fa-exchange" aria-hidden="true"></i> <span>Back</span></button>
                        <a href="index.php"><button style="background-color: #4D4D4D;" id="settings"><i class="fa fa-home" aria-hidden="true"></i> <span>Back To Home</span></button></a>
                    </div>
                </div>
                <div class="content">
                    <div class="contact-profile">

                        <?php

                        $friend_profile = Database::search("SELECT * FROM `profile_img` WHERE `user_email` = '" . $seller_email . "' ");
                        $fp = $friend_profile->fetch_assoc();
                        $fr = $friend_profile->num_rows;
                        $friend_name = Database::search("SELECT * FROM `user` WHERE `email` = '" . $seller_email . "' ");
                        $fn = $friend_name->fetch_assoc();

                        if ($fr == 0) {
                        ?>
                            <img src="resources/feedback_user.jpg" alt="" />
                        <?php
                        } else {
                        ?>
                            <img style="width: 40px; height: 40px; background-size: 100% 100%;" src="<?php echo $fp["code"]; ?>" alt="" />
                        <?php
                        }

                        ?>


                        <p style="font-weight: bolder;"><?php echo $fn["fname"] . " " . $fn["lname"]; ?></p>


                        <div class="social-media">
                            <!-- <span class="btn btn-success" style="margin-right: 50px;"><i class="fa fa-recycle" aria-hidden="true"></i> Clear Chat</span>
                         -->
                         <p class="text-black-50" style="margin-right: 50px;"><b style="font-weight: bold;">email:</b> <?php echo $fn["email"] ; ?></p>
                        </div>


                    </div>
                    <div id="message_box" style="background-image: url('resources/profilebackground.jpg'); background-repeat: no-repeat; background-size: cover;" class="messages">
                        <ul id="chat_area">

                            <!-- Message area -->

                        </ul>
                    </div>
                    <div class="message-input">
                        <div class="wrap">
                            <input id="msgtxt" type="text" placeholder="Write your message..." />
                            <!-- <i class="fa fa-bookmark attachment" aria-hidden="true"></i> -->
                            <button onclick="sendmessage('<?php echo $seller_email; ?>'); " style="background-color: #1A67D2; padding-bottom: 20px;  padding-top: 20px;" class="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>

            </div>



            <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
            <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
            
            <script src="https://use.typekit.net/hoy3lrg.js"></script>
            <script>
                try {
                    Typekit.load({
                        async: true
                    });
                } catch (e) {}
            </script>
            <script src="js/message.js"></script>
            <!-- Alerts -->
            <script src="other/snackbar.min.js"></script>
        </body>

        </html>



    <?php

    } else {
    ?>



        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="css/message.css" />
            <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
            <meta charset='UTF-8'>
            <meta name="robots" content="noindex">
            <link rel="shortcut icon" type="image/x-icon" href="//production-assets.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" />
            <link rel="mask-icon" type="" href="//production-assets.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg" color="#111" />
            <link rel="canonical" href="https://codepen.io/emilcarlsson/pen/ZOQZaV?limit=all&page=74&q=contact+" />
            <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,300' rel='stylesheet' type='text/css'>
            <link rel="icon" href="other/icon.png" />
            <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>
            <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>
            <title>LionHub | Chat</title>
            <!-- Alerts -->
            <link rel="stylesheet" href="other/snackbar.min.css">
        </head>

        <body onload="refresher();">




            <div id="frame">
                <div style="background-image: url('resources/chat_sidepannel.jpg'); background-repeat: no-repeat; background-size: cover;" id="sidepanel">
                    <div id="profile">
                        <div class="wrap">

                            <?php
                            $user = $_SESSION["u"];
                            $umail = $user["email"];

                            $userd = Database::search("SELECT * FROM `profile_img` WHERE `user_email` = '" . $umail . "' ");
                            $userr = $userd->num_rows;
                            if ($userr == 1) {
                                $user_dp = $userd->fetch_assoc();
                            ?>
                                <img style="width: 53px; height: 53px;" id="profile-img" src="<?php echo $user_dp["code"] ?>" class="online" alt="" />
                            <?php
                            } else {
                            ?>
                                <img style="width: 53px; height: 53px;" id="profile-img" src="resources/feedback_user.jpg" class="online" alt="" />
                            <?php
                            }
                            ?>


                            <p style="font-family: 'calibri'; font-weight: bold;"><?php echo $user["fname"] . " " . $user["lname"]; ?></p>


                            <i class="fa fa-chevron-down expand-button" aria-hidden="true"></i>
                            <div id="status-options">
                                <ul>
                                    <li id="status-online" class="active"><span class="status-circle"></span>
                                        <p>Online</p>
                                    </li>
                                    <li id="status-offline"><span class="status-circle"></span>
                                        <p>Offline</p>
                                    </li>
                                </ul>
                            </div>
                            <div id="expanded">
                                <label style="margin-left: 4px;"><i class="fa fa-user" aria-hidden="true"></i></label>
                                <input disabled type="text" value="<?php echo $user["fname"] . " " . $user["lname"]; ?>" />
                                <label><i class="fa fa-envelope" aria-hidden="true"></i></label>
                                <input disabled type="text" value="<?php echo $user["email"]; ?>" />
                            </div>
                        </div>
                    </div>
                    <div id="search">
                        <label for=""><i class="fa fa-commenting" aria-hidden="true"></i></label>
                        <input style="text-align: center;" disabled type="text" placeholder="Your Recent Chats" />
                    </div>



                    <div style="margin-top: 1%;" id="contacts">
                        <ul id="rcv">

                            <!-- recent area -->

                        </ul>
                    </div>




                    <div id="bottom-bar">
                        <button style="background-color: #FFFFFF; color: black; font-weight: bolder;" onclick="goBack();" id="settings"><i class="fa fa-exchange" aria-hidden="true"></i> <span>Back</span></button>
                        <a href="index.php"><button style="background-color: #4D4D4D;" id="settings"><i class="fa fa-home" aria-hidden="true"></i> <span>Back To Home</span></button></a>
                    </div>
                </div>
                <div style="background-image: url('resources/profilebackground.jpg'); background-repeat: no-repeat; background-size: cover;" class="content">

                    <div style=" margin-left: auto; margin-right: auto; display: block;">
                        <img style="margin-left: auto; margin-right: auto; display: block; width: 40%; height: auto; margin-top: 10%;" src="resources/chat_start.png" />
                        <h1 style="text-align: center; font-size: xx-large; font-weight: bolder; font-family: 'calibri';">Start a Conversation</h1>
                        <br />
                        <h1 style="width: 80%; margin-left: auto; margin-right: auto; display: block; line-height: 20px; text-align: center; font-size: medium; font-weight: bolder; font-family: 'calibri';">We see our customers as invited guests to a party, and we are the hosts. It’s our job every day to make every important aspect of the customer experience a little bit better </h1>
                    </div>

                </div>
            </div>



            <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
            <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

            <script src="https://use.typekit.net/hoy3lrg.js"></script>
            <script>
                try {
                    Typekit.load({
                        async: true
                    });
                } catch (e) {}
            </script>
            <script src="js/message.js"></script>
            <!-- Alerts -->
            <script src="other/snackbar.min.js"></script>
        </body>

        </html>



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