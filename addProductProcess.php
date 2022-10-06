<?php
session_start();

if(isset($_SESSION["u"])){

require "connection.php";

$category = (int)$_POST["c"];
$brand = $_POST["b"];
$model= $_POST["m"];
$title = $_POST["t"];
$condition = $_POST["co"];
$colour = $_POST["col"];
$qty = (int)$_POST["qty"];
$price = (int)$_POST["p"];
$dwc = (int)$_POST["dwc"];
$doc = (int)$_POST["doc"];
$description = $_POST["desc"];


// echo $category;
// echo "<br/>";
// echo $brand;
// echo "<br/>";
// echo $model;
// echo "<br/>";
// echo $title;
// echo "<br/>";
// echo $condition;
// echo "<br/>";
// echo $colour;
// echo "<br/>";
// echo $qty;
// echo "<br/>";
// echo $price;
// echo "<br/>";
// echo $dwc;
// echo "<br/>";
// echo $doc;
// echo "<br/>";
// echo $description;


$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date = $d->format("Y-m-d H:i:s");

$state = 1;
$useremail = $_SESSION["u"]["email"];

if($category=="1"){
    echo "Please Select a Category.";
}else if(($brand=="1") || empty($brand)){
    echo "Please Select a Brand.";
}else if(($model=="1") || empty($model) || ($model=="0")){
    echo "Please Select a Model.";
}else if(empty($title)){
    echo "Please Add a Title";
}else if(strlen($title)>100){
    echo "Title must contain 100 or more than 100 characters";
}else if($qty=="0" || $qty =="e"){
    echo "Please Add the Quantity Of Your Product.";
}else if(!is_int($qty)){
    echo "Please Add valid Quantity.";
}else if(empty($qty)){
    echo "Please Add Quantity of your Product.";
}else if($qty < 0){
    echo "Please Add a Valid Quantity.";
}else if(empty($price)){
    echo "Please Add the Price of Your Product.";
}else if(!is_int($price)){
    echo "Please Insert a Valid Price.";
}else if(empty($dwc)){
    echo "Please Insert Delivery cost inside colombo District.";
}else if(!is_int($dwc)){
    echo "Please Insert a Valid Price.";
}else if(empty($doc)){
    echo "Please Insert Delivery cost outside colombo District.";
}else if(!is_int($doc)){
    echo "Please Insert a Valid Price.";
}else if(empty($description)){
    echo "Please Enter the Decription of Your Product.";
}else{
    $modelHasBrand = Database::search("SELECT `id` FROM `model_has_brand` WHERE `brand_id`='" . $brand . "' AND `model_id`='" . $model . "'");

    if ($modelHasBrand->num_rows == 0) {
        echo "The Product Doesn't Exists";
    } else {
        $f = $modelHasBrand->fetch_assoc();
        $modelHasBrandId = $f["id"];

        // echo $modelHasBrandId;

        Database::iud("INSERT INTO `product` 
        (`category_id`,`model_has_brand_id`,`title`,`color_id`,`price`,`qty`,`description`,`condition_id`,`status_id`,`user_email`,`datetime_added`,`delivery_fee_colombo`,`delivery_fee_other`)
        VALUES
        ('".$category."','".$modelHasBrandId."','".$title."','".$colour."','".$price."','".$qty."','".$description."','".$condition."','".$state."','".$useremail."','".$date."','".$dwc."','".$doc."');");
    

        $last_id = Database::$connection->insert_id; // anthimeta add karapu product eke id eka


// Add img Part
        if(isset($_FILES["img"] , $_FILES["img1"] , $_FILES["img2"])){

            $imageFile = $_FILES["img"];
            $imageFile1 = $_FILES["img1"];
            $imageFile2 = $_FILES["img2"];
            $fileNewName = $_FILES["img"]["name"];
            $fileNewName1 = $_FILES["img1"]["name"];
            $fileNewName2 = $_FILES["img2"]["name"];
            

            $allowed_image_extension = array("jpg","png","PNG","svg","jpeg"); 
            $file_extension = pathinfo($fileNewName, PATHINFO_EXTENSION); 
            $file_extension1 = pathinfo($fileNewName1, PATHINFO_EXTENSION); 
            $file_extension2 = pathinfo($fileNewName2, PATHINFO_EXTENSION); 

            // echo $file_extension = $image["type"];
    
            if(!in_array($file_extension , $allowed_image_extension) && (!in_array($file_extension1,$allowed_image_extension) && (!in_array($file_extension2, $allowed_image_extension)))){
                echo "Please Select Valid Image";
            }else{
                // echo $imageFile["name"];
    
                $fileName = "resources/products//"."img1".uniqid().".".$file_extension;
                $fileName1 = "resources/products//"."img2".uniqid().".".$file_extension1;
                $fileName2 = "resources/products//"."img3".uniqid().".".$file_extension2;
                move_uploaded_file($imageFile["tmp_name"],$fileName);
                move_uploaded_file($imageFile1["tmp_name"],$fileName1);
                move_uploaded_file($imageFile2["tmp_name"],$fileName2);
    
    
                Database::iud("INSERT INTO `images` (`code`,`product_id`) VALUES('".$fileName."','".$last_id."')");
                Database::iud("INSERT INTO `images` (`code`,`product_id`) VALUES('".$fileName1."','".$last_id."')");
                Database::iud("INSERT INTO `images` (`code`,`product_id`) VALUES('".$fileName2."','".$last_id."')");
    
    
                echo "1";

            }
        }else{
            Database::iud("DELETE FROM `product` WHERE `id`='".$last_id."'");
            echo "Please Select Images";
        }
    }
}

}else{
    ?>
        <script>window.location = "home.php";</script>
    <?php
}
?>