<?php
session_start();
require "connection.php";

if (isset($_SESSION["u"])) {
    $admin_email = $_SESSION["u"]["email"];

    if (empty($_POST["banner_type"])) {
        // .......
    } else {

        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $date = $d->format("Y-m-d H:i:s");


        $banner_type = $_POST["banner_type"];

        if ((isset($_FILES["slider1"])) && $banner_type == "home_sliders") {

            $exist_img_result = Database::search("SELECT * FROM `banner_update` WHERE `banner_name` LIKE '%slider1%' ");
            $exist_imgd1 = $exist_img_result->fetch_assoc();



            $tmpName = $_FILES['slider1']['tmp_name'];
            list($width, $height, $type, $attr) = getimagesize($tmpName);

            if ($width != 1920 && $height != 700) {
                echo $width . " x " . $height . " Image diamensions are invalid";
            } else {

                $hs1 = $_FILES["slider1"];
                $hs1_name = $_FILES["slider1"]["name"];
                $allowed_image_extension1 = array("jpg", "jpeg", "png", "PNG", "svg");
                $img_extension1 = pathinfo($hs1_name, PATHINFO_EXTENSION);

                if (!in_array($img_extension1, $allowed_image_extension1)) {
                    echo "Please Upload Valid Images";
                } else {
                    if (file_exists($exist_imgd1["banner_name"])) {
                        unlink($exist_imgd1["banner_name"]);
                    } else {
                        // echo 'No such Product img';
                    }




                    $hs1_name = "img/slider//" . "slider1" . uniqid() . "." . $img_extension1;
                    move_uploaded_file($hs1["tmp_name"], $hs1_name);
                    Database::iud("UPDATE `banner_update` SET 
                                    `banner_name` = '" . $hs1_name . "' , 
                                    `date_time` = '" . $date . "',
                                    `user_email` = '" . $admin_email . "' WHERE `banner_name` = '" . $exist_imgd1["banner_name"] . "' ");

                    echo "1";
                }
            }
        } else if ((isset($_FILES["slider2"])) && $banner_type == "home_sliders") {



            $exist_img_result = Database::search("SELECT * FROM `banner_update` WHERE `banner_name` LIKE '%slider2%' ");
            $exist_imgd1 = $exist_img_result->fetch_assoc();



            $tmpName = $_FILES['slider2']['tmp_name'];
            list($width, $height, $type, $attr) = getimagesize($tmpName);

            if ($width != 1920 && $height != 700) {
                echo $width . " x " . $height . " Image diamensions are invalid";
            } else {

                $hs1 = $_FILES["slider2"];
                $hs1_name = $_FILES["slider2"]["name"];
                $allowed_image_extension1 = array("jpg", "jpeg", "png", "PNG", "svg");
                $img_extension1 = pathinfo($hs1_name, PATHINFO_EXTENSION);

                if (!in_array($img_extension1, $allowed_image_extension1)) {
                    echo "Please Upload Valid Images";
                } else {
                    if (file_exists($exist_imgd1["banner_name"])) {
                        unlink($exist_imgd1["banner_name"]);
                    } else {
                        // echo 'No such Product img';
                    }




                    $hs1_name = "img/slider//" . "slider2" . uniqid() . "." . $img_extension1;
                    move_uploaded_file($hs1["tmp_name"], $hs1_name);
                    Database::iud("UPDATE `banner_update` SET 
                                    `banner_name` = '" . $hs1_name . "' , 
                                    `date_time` = '" . $date . "',
                                    `user_email` = '" . $admin_email . "' WHERE `banner_name` = '" . $exist_imgd1["banner_name"] . "' ");

                    echo "1";
                }
            }
        } else if ((isset($_FILES["slider3"])) && $banner_type == "home_sliders") {



            $exist_img_result = Database::search("SELECT * FROM `banner_update` WHERE `banner_name` LIKE '%slider3%' ");
            $exist_imgd1 = $exist_img_result->fetch_assoc();



            $tmpName = $_FILES['slider3']['tmp_name'];
            list($width, $height, $type, $attr) = getimagesize($tmpName);

            if ($width != 1920 && $height != 700) {
                echo $width . " x " . $height . " Image diamensions are invalid";
            } else {

                $hs1 = $_FILES["slider3"];
                $hs1_name = $_FILES["slider3"]["name"];
                $allowed_image_extension1 = array("jpg", "jpeg", "png", "PNG", "svg");
                $img_extension1 = pathinfo($hs1_name, PATHINFO_EXTENSION);

                if (!in_array($img_extension1, $allowed_image_extension1)) {
                    echo "Please Upload Valid Images";
                } else {
                    if (file_exists($exist_imgd1["banner_name"])) {
                        unlink($exist_imgd1["banner_name"]);
                    } else {
                        // echo 'No such Product img';
                    }




                    $hs1_name = "img/slider//" . "slider3" . uniqid() . "." . $img_extension1;
                    move_uploaded_file($hs1["tmp_name"], $hs1_name);
                    Database::iud("UPDATE `banner_update` SET 
                                    `banner_name` = '" . $hs1_name . "' , 
                                    `date_time` = '" . $date . "',
                                    `user_email` = '" . $admin_email . "' WHERE `banner_name` = '" . $exist_imgd1["banner_name"] . "' ");

                    echo "1";
                }
            }
        } else if ((isset($_FILES["slider4"])) && $banner_type == "home_sliders") {



            $exist_img_result = Database::search("SELECT * FROM `banner_update` WHERE `banner_name` LIKE '%slider4%' ");
            $exist_imgd1 = $exist_img_result->fetch_assoc();



            $tmpName = $_FILES['slider4']['tmp_name'];
            list($width, $height, $type, $attr) = getimagesize($tmpName);

            if ($width != 1920 && $height != 700) {
                echo $width . " x " . $height . " Image diamensions are invalid";
            } else {

                $hs1 = $_FILES["slider4"];
                $hs1_name = $_FILES["slider4"]["name"];
                $allowed_image_extension1 = array("jpg", "jpeg", "png", "PNG", "svg");
                $img_extension1 = pathinfo($hs1_name, PATHINFO_EXTENSION);

                if (!in_array($img_extension1, $allowed_image_extension1)) {
                    echo "Please Upload Valid Images";
                } else {
                    if (file_exists($exist_imgd1["banner_name"])) {
                        unlink($exist_imgd1["banner_name"]);
                    } else {
                        // echo 'No such Product img';
                    }




                    $hs1_name = "img/slider//" . "slider4" . uniqid() . "." . $img_extension1;
                    move_uploaded_file($hs1["tmp_name"], $hs1_name);
                    Database::iud("UPDATE `banner_update` SET 
                                    `banner_name` = '" . $hs1_name . "' , 
                                    `date_time` = '" . $date . "',
                                    `user_email` = '" . $admin_email . "' WHERE `banner_name` = '" . $exist_imgd1["banner_name"] . "' ");

                    echo "1";
                }
            }
        } else if ((isset($_FILES["slider5"])) && $banner_type == "home_sliders") {



            $exist_img_result = Database::search("SELECT * FROM `banner_update` WHERE `banner_name` LIKE '%slider5%' ");
            $exist_imgd1 = $exist_img_result->fetch_assoc();



            $tmpName = $_FILES['slider5']['tmp_name'];
            list($width, $height, $type, $attr) = getimagesize($tmpName);

            if ($width != 1920 && $height != 700) {
                echo $width . " x " . $height . " Image diamensions are invalid";
            } else {

                $hs1 = $_FILES["slider5"];
                $hs1_name = $_FILES["slider5"]["name"];
                $allowed_image_extension1 = array("jpg", "jpeg", "png", "PNG", "svg");
                $img_extension1 = pathinfo($hs1_name, PATHINFO_EXTENSION);

                if (!in_array($img_extension1, $allowed_image_extension1)) {
                    echo "Please Upload Valid Images";
                } else {
                    if (file_exists($exist_imgd1["banner_name"])) {
                        unlink($exist_imgd1["banner_name"]);
                    } else {
                        // echo 'No such Product img';
                    }




                    $hs1_name = "img/slider//" . "slider5" . uniqid() . "." . $img_extension1;
                    move_uploaded_file($hs1["tmp_name"], $hs1_name);
                    Database::iud("UPDATE `banner_update` SET 
                                    `banner_name` = '" . $hs1_name . "' , 
                                    `date_time` = '" . $date . "',
                                    `user_email` = '" . $admin_email . "' WHERE `banner_name` = '" . $exist_imgd1["banner_name"] . "' ");

                    echo "1";
                }
            }
        } else {
            echo "Please Upload Banners..";
        }

        // $slider1 = $_POST["slider1"];
        // $slider2 = $_POST["slider2"];
        // $slider3 = $_POST["slider3"];
        // $slider4 = $_POST["slider4"];
        // $slider5 = $_POST["slider5"];




















    }
} else {
?>
    <script>
        window.location = "signinSignUp.php";
    </script>
<?php
}
