<?php
session_start();
require "connection.php";

if (isset($_SESSION["u"])) {

    $sender = $_GET["e"];
    $recever = $_SESSION["u"]["email"];



    // $senderrs = Database::search("SELECT * FROM `chat` WHERE `from`='" . $sender . "' OR `to`='" . $recever . "' ORDER BY `date` DESC ");
    // $senderrs = Database::search("SELECT * FROM `chat` ORDER BY `date` DESC ");
    $senderrs = Database::search("SELECT * FROM `chat` WHERE `from` = '" . $recever . "' OR `to` = '" . $recever . "' ");
    $n = $senderrs->num_rows;


    if ($n == 0) {
?>

        <!-- empty message -->
        <div style="margin-left: auto; margin-right: auto; display: block; margin-top: 10%;">
            <!-- <img style="margin-left: auto; margin-right: auto; display: block;" src="resources/start_conversation.png"/> -->
            <p style="font-weight: bolder; font-size: xx-large; text-align: center;"><i class="fa fa-user-secret" aria-hidden="true"></i></p>
            <br />
            <p style="font-family: 'calibri'; font-weight: bolder; font-size: xx-large; text-align: center;">Start Your Conversation</p>
            <br />
            <p style="font-family: 'calibri';  font-size: large; text-align: center;"><b style="font-weight: bolder;">Note: </b>Your messages are not end-to-end encrypted but we are keeping your messsages secured.</p>
        </div>
        <!-- empty message -->

        <?php
    } else {
        for ($x = 0; $x < $n; $x++) {

            $f = $senderrs->fetch_assoc();

            $date = $f["date"];
            $d = explode(" ", $date);
            $time = $d[1];


            if ($f["from"] == $sender) {
                $friend_profile = Database::search("SELECT * FROM `profile_img` WHERE `user_email` = '" . $sender . "' ");
                $fpr = $friend_profile->num_rows;

        ?>
                <!-- Reciever Message-->
                <li style="margin-bottom: 10px;" class="sent">

                    <?php
                    if ($fpr == 1) {
                        $fp = $friend_profile->fetch_assoc();
                    ?>
                        <img style="width: 30px; height: auto;" src="<?php echo $fp["code"] ?>" alt="" />
                    <?php
                    } else {
                    ?>
                        <img style="width: 30px; height: auto;" src="resources/feedback_user.jpg" alt="" />
                    <?php
                    }
                    ?>

                    <p style="word-wrap:break-word; font-family: 'calibri'; border-radius: 20px; border-top-left-radius: 0%;"><?php echo $f["content"]; ?><span style="float: right; margin-top: 20px;"><?php echo $time; ?></span></p>
                </li>
                <!-- Reciever Message -->

            <?php
            }

            if ($f["to"] == $sender) {
                $friend_profile1 = Database::search("SELECT * FROM `profile_img` WHERE `user_email` = '" . $recever . "' ");
                $fpr1 = $friend_profile1->num_rows;

            ?>
                <!-- Reciever Message-->
                <li style="margin-bottom: 10px;" class="replies">

                    <?php
                    if ($fpr1 == 1) {
                        $fp1 = $friend_profile1->fetch_assoc();
                    ?>
                        <img style="width: 30px; height: 30px;" src="<?php echo $fp1["code"] ?>" alt="" />
                    <?php
                    } else {
                    ?>
                        <img style="width: 30px; height: 30px;" src="resources/feedback_user.jpg" alt="" />
                    <?php
                    }
                    ?>

                    <p style="word-wrap:break-word; font-family: 'calibri';  border-radius: 20px; border-top-right-radius: 0%;"><?php echo $f["content"]; ?><span style="float: right; margin-top: 20px;"><?php echo $time; ?></span></p>
                </li>
                <!-- Reciever Message -->

    <?php
            }
        }
    }
} else {
    ?>
    <script>
        window.location = "signinSignUp.php";
    </script>
<?php
}

?>