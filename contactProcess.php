<?php

require "connection.php";

$name = $_POST["n"];
$email = $_POST["e"];
$subject = $_POST["s"];
$company = $_POST["c"];
$msg = $_POST["m"];


if(empty($_POST["n"])){
    echo "Please Enter your name";
}else if(empty($_POST["e"])){
    echo "Please Enter your email";
}else if(empty($_POST["s"])){
    echo "Please Enter your Subject";
}else if(empty($_POST["c"])){
    echo "Please Enter your company Name";
}else if(empty($_POST["m"])){
    echo "Please Enter your Message";
}else{
    Database::search("INSERT INTO `contact` (`name`,`user_email`,`subject`,`company`,`msg`) VALUES ('".$name."', '".$email."' ,'".$subject."' ,'".$company."' , '".$msg."') ");
    echo "1";
}
 

?>
