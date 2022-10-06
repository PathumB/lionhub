<?php

session_start();
require "connection.php";


if(isset($_SESSION["u"])){

    $email = $_SESSION["u"]["email"];
    $cid = $_GET["id"];

    $cart_rs = Database::search("SELECT `product_id` FROM `cart` WHERE `id` = '".$cid."'  ");
    $cf = $cart_rs->fetch_assoc();

    $pid = $cf["product_id"];
    $recent_rs = Database::search("SELECT * FROM `recent` WHERE `product_id` = '".$pid."' AND `user_email` = '".$email."' ");
    $rn = $recent_rs->num_rows;

    if($rn == 1){

        Database::iud("DELETE FROM `cart` WHERE `id`='".$cid."'");
        echo "1";

    }else{
        Database::iud("INSERT INTO `recent` (`product_id`,`user_email`) VALUES ('".$pid."','".$email."') ");
        Database::iud("DELETE FROM `cart` WHERE `id`='".$cid."'");
        echo "1";
    }

}else{

}






?>