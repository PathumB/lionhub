<?php
require "connection.php";

if(isset($_POST["e"])){
    $email = $_POST["e"];

    $user_rs = Database::search("SELECT * FROM `user` WHERE `email` = '".$email."' ");
    $user_rows = $user_rs->num_rows;

    if($user_rows == 1){

        $fetch_data = $user_rs->fetch_assoc();
        $user_status = $fetch_data["status_id"];

        if($user_status == 1){
            Database::iud("UPDATE `user` SET `status_id` = '2' WHERE `email` = '".$email."' ");
            echo "1";
        }else{
            Database::iud("UPDATE `user` SET `status_id` = '1' WHERE `email` = '".$email."' ");
            echo "2";
        }

    }
}

?>