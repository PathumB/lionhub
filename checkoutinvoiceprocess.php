<?php
require "connection.php";
session_start();

if(isset($_SESSION["u"])){

    // $total = "";
    // $amount = "";
    $amount = "";


$oid = $_POST["oid"];

$cartrs = Database::search("SELECT * FROM `cart` WHERE `user_email` = '" . $_SESSION["u"]["email"] . "';");
$cnum = $cartrs->num_rows;


// ............

$umail = $_SESSION["u"]["email"];

$address_rs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email` = '" . $umail . "' ");
$cn = $address_rs->num_rows;



for ($c = 0; $c < $cnum; $c++) {
    $cfetch = $cartrs->fetch_assoc();

    $productrs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $cfetch["product_id"] . "'");
    $pn = $productrs->fetch_assoc();

    if ($cn == 1) {

        $ar = $address_rs->fetch_assoc();
    
    // location , district , province
        $rs1 = Database::search("SELECT `location`.`id`, `province_id` , `district_id`, `city_id`, 
        city.id AS `cid`, city.name AS `c_name`, 
        city.postal_code, 
        district.id AS `did`, district.name AS `d_name`, 
        province.id AS `pid`, province.name AS `p_name` 
        FROM `location` JOIN `city` ON city.id=location.city_id
        JOIN `district` ON district.id=location.district_id
        JOIN `province` ON province.id=location.province_id WHERE `location`.`id` = '" . $ar["location_id"] . "';");
    
        $locr = $rs1->fetch_assoc();
    
        $delivery = "0";
    
        if ($locr["district_id"] == "3") {
            $delivery = $pn["delivery_fee_colombo"];
        } else {
            $delivery = $pn["delivery_fee_other"];
        }
    
       
    
    
    }

    $qty = $pn["qty"];
    $price = $pn["price"];
    $newqty = $qty - $cfetch["qty"];

    Database::iud("UPDATE `product` SET `qty`='" . $newqty . "' WHERE `id` = '" . $cfetch["product_id"] . "'");


    $total = $price * $cfetch["qty"];
    $amount = $total + (int)$delivery;

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    Database::iud("INSERT INTO `invoice`(`order_id`,`product_id`,`user_email`,`date`,`qty`,`total`,`status`) VALUES
        ('" . $oid . "','" . $cfetch["product_id"] . "','" .  $_SESSION["u"]["email"] . "','" . $date . "','" . $cfetch["qty"] . "','" .$amount. "','1')");

    Database::iud("DELETE FROM `cart` WHERE `user_email` = '" . $_SESSION["u"]["email"] . "'");

    Database::iud("INSERT INTO `ordertrack` (`trackid`,`order_id`,`user_email`,`date`,`order_status_id`) 
    VALUES ('".$cfetch["product_id"]."','".$oid."','".$_SESSION["u"]["email"]."','".$date."','1') ");
   

}

    echo "1";

}else{
    echo "Error";
}
