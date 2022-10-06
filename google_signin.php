<?php
session_start();
require "connection.php";

$f = $_POST["fn"];
$l = $_POST["ln"];
$e = $_POST["e"];

// echo $f;
// echo "<br/>";
// echo $l;
// echo "<br/>";
// echo $e;

$rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $e . "' AND `status_id` = '2' ;");
$n = $rs->num_rows;

if ($n == 1) {
    echo "1";
} else {


    $rs1 = Database::search("SELECT * FROM `user` WHERE `email`='" . $e . "' AND NOT `status_id` = '2' ;");
    $n1 = $rs1->num_rows;

    if($n1 == 1){
        echo "2";

        $d = $rs1->fetch_assoc();
        $_SESSION["u"]=$d;
        setcookie("e","",-1);
        setcookie("p","",-1);

    }else{

        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $date = $d->format("Y-m-d H:i:s");

        $insert = Database::iud("INSERT INTO `user` (`fname`,`lname`,`email`,`register_date`,`gender_id`,`status_id`) VALUES ('".$f."','".$l."','".$e."','".$date."','1','1') ");
        $rs2 = Database::search("SELECT * FROM `user` WHERE `email`='" . $e . "' AND NOT `status_id` = '2' ;");

        $d1 = $rs2->fetch_assoc();
        $_SESSION["u"]=$d1;
        setcookie("e","",-1);
        setcookie("p","",-1);
        echo "3";

    }

}
