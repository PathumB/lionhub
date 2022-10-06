<?php

require "connection.php";
require "Exception.php";
require "PHPMailer.php";
require "SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;

if(isset($_POST["e"])){
    $email = $_POST["e"];

    if(empty($email)){
        echo "Please enter your Email Address.";
    }else{
        $admin_rs = Database::search("SELECT * FROM `admin` WHERE `email` = '".$email."' ");
        $an = $admin_rs->num_rows;

        if($an == 1){

            $code = uniqid();

            Database::iud("UPDATE `admin` SET `verification` = '".$code."' ");



                    // Email Code
 
        $mail = new PHPMailer; 
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com'; 
        $mail->SMTPAuth = true; 
        $mail->Username = 'pathumbandarame@gmail.com'; 
        $mail->Password = 'Pathum2001';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('sltech80@gmail.com', 'Lion Hub'); 
        $mail->addReplyTo('sltech80@gmail.com', 'Lion Hub'); 
        $mail->addAddress($email); 
        $mail->isHTML(true); 
        $mail->Subject = 'Lion Hub Admin Log in Verification Code'; 
        $bodyContent = '<h1 style="color:red";>Your Verification Code : '.$code.'</h1>'; 
        $mail->Body    = $bodyContent; 

        if(!$mail->send()) { 
            echo "Verification code sending fale";
        } else { 
            echo "1"; // success
        }

                // Email Code

            }else{
                echo "Email address not found";
            }

/* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */


    }
}else{
    echo "Please Enter your Email";
}


?>