<?php session_start(); require "connection.php"; ?>

<?php

if(isset($_SESSION["u"])){

    $oid = $_POST["oid"];
    $pid = $_POST["pid"];
    $email = $_POST["email"];
    $total = $_POST["total"];
    $pqty = $_POST["pqty"];

    $product_rs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $pid . "' ");
    $pn = $product_rs->fetch_assoc();

    $qty = $pn["qty"];
    $newQty = $qty - $pqty;

    Database::iud("UPDATE `product` SET `qty` = '".$newQty."' WHERE `id` = '".$pid."' ");

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");


    Database::iud("INSERT INTO `invoice` (`order_id`,`product_id`,`user_email`,`date`,`total`,`qty`,`status`) 
    VALUES 
    ('".$oid."','".$pid."','".$email."','".$date."','".$total."','".$pqty."', '1') ");

    Database::iud("INSERT INTO `ordertrack` (`trackid`,`order_id`,`user_email`,`date`,`order_status_id`) 
    VALUES ('".$pid."','".$oid."','".$email."','".$date."','1') ");

    echo "1";

}
    




?>