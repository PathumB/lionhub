<?php session_start(); require "connection.php" ?>

<?php
if (isset($_SESSION["u"])) {
    $cart_rs11 = Database::search("SELECT * FROM `cart` WHERE `user_email` = '" . $_SESSION["u"]["email"] . "'  ");
    $cn11 = $cart_rs11->num_rows;

    if($cn11 >= 5){
        echo "Your Cart is Full";
    }else{

            $id = $_GET["id"];
            $qtyTxt = $_GET["txt"];
            $umail = $_SESSION["u"]["email"];
        
            if ($qtyTxt == 0 || $qtyTxt < 0 || empty($qtyTxt)) {
                echo "Please add a Valid quantity";
            } else {
                $cart_rs = Database::search("SELECT * FROM `cart` WHERE `user_email` = '" . $umail . "' AND `product_id` = '" . $id . "' ");
                $cn = $cart_rs->num_rows;
        
                if ($cn == 1) {
                    echo "This product already exist";
                } else {
        
                    $product_rs = Database::search("SELECT `qty` FROM `product` WHERE `id` ='" . $id . "' ");
                    $pr = $product_rs->fetch_assoc();
        
                    if ($pr["qty"] >= $qtyTxt) {
        
                        Database::iud("INSERT INTO  `cart` (`product_id`,`user_email`,`qty`) VALUES ( '" . $id . "','" . $umail . "','" . $qtyTxt . "') ");
                        echo "1";
                    } else {
                        echo "Please Enter a Valid Quantity below" . " " . $pr["qty"] . ".";
                    }
                }
            }
        
          
       




    }
}else{
    echo "2";
}



?>