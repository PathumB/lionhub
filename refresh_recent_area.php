<?php
session_start();
require "connection.php";


if (isset($_SESSION["u"])) {
    $mail = $_SESSION["u"]["email"];

    $chatrs = Database::search("SELECT * FROM `chat` WHERE `to` IN ('" . $mail . "') AND `status` = '1' ORDER BY `date` DESC ");
    $n = $chatrs->num_rows;

    if ($n == 0) {
        echo "<h1 style='color:#CCCCCC; text-align:center; margin-top: 50%'; font-weight: bold;>No Recent Chats Available..</h1>";
    } else {

        for ($x = 0; $x < $n; $x++) {

            $r = $chatrs->fetch_assoc();
            $u = array_unique($r);

            $date = $u["date"];
            $d = explode(" ", $date);
            $sdate = $d[0];


?>

            <li onclick="sse('<?php echo $u['from'] ?>');" style="height: 100px; border-bottom-style: solid; border-width: 2px; border-color: rgb(149, 149, 149,0.7);" class="contact ">
                <div class="wrap">
                    <span class="contact-status busy"></span>

                    <?php
                    $friend_profile = Database::search("SELECT * FROM `profile_img` WHERE `user_email` = '" . $u['from'] . "' ");
                    $fp = $friend_profile->fetch_assoc();
                    $fr = $friend_profile->num_rows;

                    if ($fr == 0) {
                    ?>
                        <img style="width: 50px; height: auto; background-size: contain; background-position: center;" src="resources/feedback_user.jpg" />
                    <?php
                    } else {
                    ?>
                        <img style="width: 50px; height: auto; background-size: contain; background-position: center;" src="<?php echo $fp["code"] ?>" />
                    <?php
                    }
                    ?>

                    <?php

                    $last_chat = $u["content"];
                    $last_msg = Database::search("SELECT * FROM `chat` WHERE `content` = '" . $last_chat . "' ORDER BY `date` DESC LIMIT 1");
                    $lm = $last_msg->fetch_assoc();

                    ?>


                    <div class="meta">
                        <p style="font-size: large; font-family: 'calibri'; margin-left: 70px;" class="name"><?php echo $u["from"]; ?></p>
                        <p style="font-family: 'calibri';  margin-left: 70px;" class="preview"><?php echo $lm["content"]; ?></p><br />
                        <p style="font-family: 'calibri'; float: right; margin-top: 1%;"><?php echo $sdate; ?></p>
                    </div>
                </div>
            </li>

    <?php

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