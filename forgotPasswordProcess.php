<?php

    require "connection.php";
    require 'Exception.php'; 
    require 'PHPMailer.php'; 
    require 'SMTP.php'; 
    use PHPMailer\PHPMailer\PHPMailer; 

    
    if(isset($_GET["e"])){

        $e = $_GET["e"];

        if(empty($e)){
            echo "Please enter your email address";
        }else{

            $rs = Database::search("SELECT * FROM `user` WHERE `email`='".$e."';");

            if($rs->num_rows == 1){

                $code = uniqid();

                Database::iud("UPDATE `user` SET `verification_code`='".$code."' WHERE `email`='".$e."';");


                // Email Code
 
        $mail = new PHPMailer; 
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com'; 
        $mail->SMTPAuth = true; 
        $mail->Username = 'pathumbandarame@gmail.com'; 
        $mail->Password = 'Pathum2001';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('sltech80@gmail.com', 'LION HUB'); 
        $mail->addReplyTo('sltech80@gmail.com', 'LION HUB'); 
        $mail->addAddress($e); 
        $mail->isHTML(true); 
        $mail->Subject = 'LION HUB Forgot Password Verification Code'; 
        $bodyContent = '<h3 style="color:#0077ff";>Your Verification Code : '.$code.'</h3>'; 
        $mail->Body    = $bodyContent; 

        if(!$mail->send()) { 
            echo "Verification code sending fale";
        } else { 
            echo "1"; 
        }

                // Email Code

            }else{
                echo "Email address not found";
            }

        }


    }else{
        echo "Please enter your email address";
    }
?>
