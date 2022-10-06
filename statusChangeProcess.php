<?php

require "connection.php";

$id = $_GET["p"];

$status_result = Database::search("SELECT *  FROM `product` WHERE `id`='".$id."'"); 
$sn = $status_result->num_rows;

if($sn == 1){
    $sd = $status_result->fetch_assoc();

    $statusid = $sd["status_id"];

    if($statusid == 1){
        Database::iud("UPDATE `product` SET `status_id`='2' WHERE `id`='".$id."'");
        echo "2";

    }else if($statusid == 2){

        Database::iud("UPDATE `product` SET `status_id`='1' WHERE `id`='".$id."'");
        echo "1";
    }

}else{
    echo "Cannot Connect To Database";
}



?>