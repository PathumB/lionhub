<?php
session_start();
require "connection.php";

if (isset($_SESSION["u"])) {

    $fname = $_POST["f"];
    $lname = $_POST["l"];
    $mobile = $_POST["m"];
    $line1 = $_POST["a1"];
    $line2 = $_POST["a2"];
    $province = $_POST["p"];
    $district = $_POST["d"];
    $city = $_POST["c"];
    $postalCode = $_POST["pcode"];


    if (empty($fname)) {
        echo "Enter your first name";
    } else if (empty($lname)) {
        echo "Enter your last name";
    } else if (empty($mobile)) {
        echo "Enter your mobile number";
    } else if (preg_match("/07[0,1,2,4,5,6,7,8][0-9]+/", $mobile) == 0) {
        echo "Invalid mobile number";
    } else if (empty($line1)) {
        echo "Enter your Address line 1";
    } else if (empty($line2)) {
        echo "Enter your Address line 2";
    } else if ($province == "1") {
        echo "Please select your Province";
    } else if ($district == "1") {
        echo "Please select your District";
    } else if ($city == "1") {
        echo "Please select your city";
    } else if (empty($postalCode)) {
        echo "Please Enter your Postal Code";
    } else {


        // Profile Picture Update
        if (isset($_FILES["i"])) {


            $imageFile = $_FILES["i"];
            $fileNewName = $_FILES["i"]["name"];

            $allowed_image_extension = array("jpg", "png", "svg", "jpeg");
            $file_extension = pathinfo($fileNewName, PATHINFO_EXTENSION);

            if (!in_array($file_extension, $allowed_image_extension)) {
                echo "Please Select Valid Image";
            } else {


                $fileName = "resources/profile_img//" . uniqid() . "." . $file_extension;
                move_uploaded_file($imageFile["tmp_name"], $fileName);

                // Database::iud("INSERT INTO `profile_img` (`code`,`user_email`) VALUES('".$fileName."','".$_SESSION["u"]["email"]."')");

                $profile_image_set = Database::search("SELECT * FROM `profile_img` WHERE `user_email`='" . $_SESSION["u"]["email"] . "'");
                $pro_row = $profile_image_set->num_rows;

                if ($pro_row == 1) {


                    $exist_img = Database::search("SELECT * FROM `profile_img` WHERE `user_email`='" . $_SESSION["u"]["email"] . "' ");
                    $exist_img_r = $exist_img->fetch_assoc();

                    if (file_exists($exist_img_r["code"])) {
                        unlink($exist_img_r["code"]);
                    } else {
                        // echo 'No such Product img';
                    }


                        Database::iud("UPDATE `profile_img` SET 
                        `code`='" . $fileName . "'
                        WHERE `user_email` = '" . $_SESSION["u"]["email"] . "'");


                } else {

                    Database::iud("INSERT INTO `profile_img` 
                (`code`,`user_email`) 
                VALUES 
                ('" . $fileName . "', '" . $_SESSION["u"]["email"] . "')");
                }
            }
        } else {
        }



        // Update User fname , lname , mobile
        Database::iud("UPDATE `user` SET `fname`='" . $fname . "' , `lname`='" . $lname . "' , `mobile`='" . $mobile . "' 
        WHERE `email`='" . $_SESSION["u"]["email"] . "';");



        // Update city
        $address = Database::search("SELECT * FROM `user_has_address` WHERE `user_email`='" . $_SESSION["u"]["email"] . "'");
        $nr = $address->num_rows;

        if ($nr == 1) {

            $address_fetch = $address->fetch_assoc();

            // update : province , district , city
            Database::iud("UPDATE `location` SET 
        `province_id`='" . $province . "', 
        `district_id`='" . $district . "', 
        `city_id`='" . $city . "' WHERE `id`='" . $address_fetch["location_id"] . "'");

            // update : address1 , address2 , location
            Database::iud("UPDATE `user_has_address` SET 
        `line1`='" . $line1 . "' ,
        `line2`='" . $line2 . "' 
        WHERE `user_email`='" . $_SESSION["u"]["email"] . "'");

            // Update  : postal code
            Database::iud("UPDATE `city` SET 
        `postal_code`='" . $postalCode . "' WHERE `id`='" . $city . "'");

            $updated = 2;
            echo $updated;
        } else {

            $province_I = Database::iud("INSERT INTO `location` 
                                        (`province_id`,`district_id`,`city_id`) 
                                        VALUES 
                                        ('" . $province . "','" . $district . "','" . $city . "')");

            $last_id = Database::$connection->insert_id;

            $location_I = Database::iud("INSERT INTO `user_has_address` 
                                        (`user_email`,`line1`,`line2`,`location_id`) 
                                        VALUES 
                                        ('" . $_SESSION["u"]["email"] . "', '" . $line1 . "', '" . $line2 . "', '" . $last_id . "')");

            // Postal code eka Insert karann ba. [city ekath ekkma thiyen hinda]
            $postalCode_I = Database::iud("UPDATE `city` SET 
                                        `postal_code`='" . $postalCode . "' WHERE `id`='" . $city . "'");

            $added = 1;
            echo $added;
        }
    }
} else {
?>
    <script>
        window.location = "index.php";
    </script>
<?php

}
