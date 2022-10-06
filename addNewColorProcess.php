<?php
    session_start();
    require "connection.php";

    if(isset($_SESSION["a"])){
        $text = $_GET["t"];
        
        if(!empty($text)){

            $color_rs = Database::search("SELECT * FROM `color` WHERE `name` = '".$text."' ");
            $n = $color_rs->num_rows;

            if($n == 1){
                echo "The Color already exists";
            }else{
                Database::iud("INSERT INTO `color` (`name`) VALUES ('".$text."') ");
                echo "1";
            }

        }else{
            echo "Please enter Color name";
        }
    }else{
        echo "Please log in to Admin Account";
    }
?>