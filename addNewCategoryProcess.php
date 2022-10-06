<?php
    session_start();
    require "connection.php";

    if(isset($_SESSION["a"])){
        $text = $_GET["t"];
        
        if(!empty($text)){

            $category_rs = Database::search("SELECT * FROM `category` WHERE `name` = '".$text."' ");
            $n = $category_rs->num_rows;

            if($n == 1){
                echo "The Category already exists";
            }else{
                Database::iud("INSERT INTO `category` (`name`) VALUES ('".$text."') ");
                echo "1";
            }

        }else{
            echo "Please enter category name";
        }
    }else{
        echo "Please log in to Admin Account";
    }
?>