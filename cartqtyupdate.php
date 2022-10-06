<?php 
session_start();

require "connection.php";

if(isset($_SESSION["u"])){

$email = $_SESSION["u"]["email"];

$id = $_POST["id"];
$qty = $_POST["qty"];

$cartrs = Database::search("SELECT * FROM `cart` WHERE `user_email` = '".$email."'");
$cn = $cartrs->num_rows;

if($cn == 0){
    echo "Not Found";
}else{
    $x = Database::search("SELECT * FROM `cart` WHERE `id` = '".$id."'");
    $xn = $x->num_rows;

    if($xn == 0){
        echo "Not Found";
    }else{
        Database::iud("UPDATE `cart` SET `qty`='".$qty."' WHERE `user_email` = '".$email."' AND `id` = '".$id."'");
        echo "success";
    }
}

}else{
?>

<?php
}
?>