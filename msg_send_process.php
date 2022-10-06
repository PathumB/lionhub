<?php

session_start();
require "connection.php";

if (isset($_SESSION["u"])) {

    $sender = $_SESSION["u"]["email"];
    $recever = $_POST["e"];
    $msg = $_POST["t"];

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    if (empty($msg)) {
        echo "0";
    } else {

        $check_status = Database::search("SELECT * FROM `chat` WHERE `from` = '" . $sender . "' AND `to` = '" . $recever . "' ");
        $cr = $check_status->num_rows;
        if ($cr == 0) {
            Database::iud("INSERT INTO `chat` (`from`,`to`,`content`,`date`,`status`) VALUES ('" . $sender . "','" . $recever . "','" . $msg . "','" . $date . "','1')");
            echo "1";
        } else {
            Database::iud("INSERT INTO `chat` (`from`,`to`,`content`,`date`,`status`) VALUES ('" . $sender . "','" . $recever . "','" . $msg . "','" . $date . "','2')");
            echo "1";
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