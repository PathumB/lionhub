<?php
require "connection.php";

$title = $_POST["title"];
$qty = $_POST["qty"];
$dwc = $_POST["dwc"];
$doc = $_POST["doc"];
$desc = $_POST["desc"];
$pid = $_POST["id"];

if(empty($title)){
    echo "Please Enter Product Title";
}else if(empty($qty)){
    echo "Please Enter Product Quantity";
}else if(($qty=="0" || $qty =="e")){
    echo "Please Enter Valid Quantity";
}else if(empty($dwc)){
    echo "Please Insert Delivery cost inside colombo District";
}else if(empty($doc)){
    echo "Please Insert Delivery cost outside colombo District";
}else if(empty($desc)){
    echo "Please Enter Description";
}else{

// Update [title , qty , dwc , doc , desc]
    $update1 = Database::iud("UPDATE `product` SET 
    `title`='".$title."', `qty`='".$qty."',`description`='".$desc."' , `delivery_fee_colombo`='".$dwc."', `delivery_fee_other`='".$doc."' WHERE 
    `id`='".$pid."' ");



// Update  [ img ]
$image_array;

    if(isset($_FILES["img1"] , $_FILES["img2"] , $_FILES["img3"])){

        // Database::iud("DELETE * FROM `images` WHERE `product_id` = '".$pid."' ");


        
        $exist_img = Database::search("SELECT * FROM `images` WHERE `product_id`='".$pid."' ");
        $exist_img_rows = $exist_img->num_rows;

        $exist_img_r;

        for($y = 0; $y < $exist_img_rows; $y++){
            $exist_img_r = $exist_img->fetch_assoc();
            $image_array[$y] = $exist_img_r["code"];
        }




        $img1 = $_FILES["img1"];
        $img2 = $_FILES["img2"];
        $img3 = $_FILES["img3"];
        $img_name1 = $_FILES["img1"]["name"];
        $img_name2 = $_FILES["img2"]["name"];
        $img_name3 = $_FILES["img3"]["name"];


        $allowed_image_extension = array("jpg","jpeg","png","PNG","svg");
        $img_extension1 = pathinfo($img_name1,PATHINFO_EXTENSION);
        $img_extension2 = pathinfo($img_name2,PATHINFO_EXTENSION);
        $img_extension3 = pathinfo($img_name3,PATHINFO_EXTENSION);

        if(!in_array($img_extension1, $allowed_image_extension) || (!in_array($img_extension2,$allowed_image_extension)|| (!in_array($img_extension3,$allowed_image_extension)))){
            echo "Please Upload Valid Images";
        }else{
            if(file_exists($exist_img_r["code"])){
                unlink($exist_img_r["code"]);
            }else{
                // echo 'No such Product img';
            }

            $img_name1 = "resources/products//"."img1".uniqid().".".$img_extension1;
            $img_name2 = "resources/products//"."img2".uniqid().".".$img_extension2;
            $img_name3 = "resources/products//"."img3".uniqid().".".$img_extension3;

            move_uploaded_file($img1["tmp_name"],$img_name1);
            move_uploaded_file($img2["tmp_name"],$img_name2);
            move_uploaded_file($img3["tmp_name"],$img_name3);
            
            Database::iud("UPDATE `images` SET `code` = '".$img_name1."' WHERE `code` = '".$image_array[0]."' ");
            Database::iud("UPDATE `images` SET `code` = '".$img_name2."' WHERE `code` = '".$image_array[1]."' ");
            Database::iud("UPDATE `images` SET `code` = '".$img_name3."' WHERE `code` = '".$image_array[2]."' ");

                // Database::iud("INSERT INTO `images` (`code`,`product_id`) VALUES('".$img_name1."','".$pid."')");
                // Database::iud("INSERT INTO `images` (`code`,`product_id`) VALUES('".$img_name2."','".$pid."')");
                // Database::iud("INSERT INTO `images` (`code`,`product_id`) VALUES('".$img_name3."','".$pid."')");
                
            echo "1";
            
        }

    }else{

        echo "Please Upload All Product images";
        
    }



    
}

?>
