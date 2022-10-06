<?php
require "connection.php";

if(isset($_POST["id"])){
    $id = $_POST["id"];

    $user_rs = Database::search("SELECT * FROM `product` WHERE `id` = '".$id."' ");
    $product_rows = $user_rs->num_rows;

    if($product_rows == 1){

        $fetch_data = $user_rs->fetch_assoc();
        $product_status = $fetch_data["status_id"];

        if($product_status == 1){
            Database::iud("UPDATE `product` SET `status_id` = '2' WHERE `id` = '".$id."' ");
            echo "1";
        }else{
            Database::iud("UPDATE `product` SET `status_id` = '1' WHERE `id` = '".$id."' ");
            echo "2";
        }

    }
}

?>