<?php
session_start();
require "connection.php";


if(isset($_SESSION["u"])){

    $u_email = $_SESSION["u"]["email"];
    $id = $_GET["id"];

    $watchlist_rs1 = Database::search("SELECT * FROM `watchlist` WHERE `user_email`='".$u_email."'");
    $n1 = $watchlist_rs1->num_rows;

    if($n1 >= 10){
        echo "Your Wishlist is Full";
    }else{

        $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE `product_id`='".$id."' AND `user_email`='".$u_email."'");
        $n = $watchlist_rs->num_rows;
    
        if($n == 1){
            echo "Already Added to Watchlist";
        }else{
            Database::iud("INSERT INTO `watchlist` (`product_id`,`user_email`) VALUES ('".$id."', '".$u_email."') ");
            echo "1";
        }


    }




}else{
    echo "5";
}
?>