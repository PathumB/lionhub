<?php

// session_start();
// $email = $_SESSION["u"]["email"];

require "connection.php";

$search = $_POST["search"];
$category = $_POST["category"];
$color = $_POST["color"];
$activetime = $_POST["activetime"];
$quantity = $_POST["quantity"];
$condition = $_POST["condition"];
$price = $_POST["price"];
$pf = $_POST["pf"];
$pt = $_POST["pt"];

// echo $search;
// echo $activetime;
// echo $quantity;
// echo $condition;


$activeorder;
$qtyorder;
$activetime_qty;
$priceorder;

if ($activetime == "1") {
    $activeorder = "DESC";
} else if ($activetime == "2") {
    $activeorder = "ASC";
} else {
    $activeorder = "null";
}

if ($quantity == "1") {
    $qtyorder = "DESC";
} else if ($quantity == "2") {
    $qtyorder = "ASC";
} else {
    $qtyorder = "null";
}

if ($price == "1") {
    $priceorder = "AsC";
} else if ($price == "2") {
    $priceorder = "DESC";
} else {
    $priceorder = "null";
}


// if($activetime == "1" && $quantity == "1"){
//     $activetime_qty = "DESC";
// }else if($activetime == "2" && $quantity == "2"){
//     $activetime_qty = "ASC";
// }



if (empty($search) && $category == "1" && $color == "0" && $activetime == "0" && $quantity == "0" && $condition == "0" && $price == "0" && $pf == 0 && $pt == 300000) {
    echo "1";
} else {

    // echo $email;
    // echo "<br/>";
    // echo $search;
    // echo "<br/>";
    // echo $activeorder;
    // echo "<br/>";
    // echo $qtyorder;
    // echo "<br/>";
    // echo $condition;

    $results_per_page = 6;

    $pageno = $_POST["page"];

    // $unique_img = Database::search("SELECT DISTINCT `product_id` FROM `images`;");
    // $ui = $unique_img->fetch_assoc();

    // $image_array;
    // $exist_img = Database::search("SELECT * FROM `images` ");
    // $exist_img_rows = $exist_img->num_rows;

    // $exist_img_r;
    // for ($y = 0; $y < $exist_img_rows; $y++) {
    //     $exist_img_r = $exist_img->fetch_assoc();
    //     $image_array[$y] = $exist_img_r["code"];
    // }

    if (!empty($search) && $activetime !== "0") {

        $allproductresult = Database::search("SELECT DISTINCT * FROM `product` INNER JOIN `images` ON product.id = images.product_id WHERE product.`status_id` = '1' AND images.code LIKE '%img1%' AND product.`title` LIKE '%" . $search . "%'  ORDER BY `datetime_added` $activeorder;");
        $allproductresultnumber = $allproductresult->num_rows;
        $number_of_pages = ceil($allproductresultnumber / $results_per_page);
        $page_first_result = (int)$pageno * $results_per_page - $results_per_page;
        $productresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id  WHERE product.`status_id` = '1' AND images.code LIKE '%img1%' AND  product.`title` LIKE '%" . $search . "%' ORDER BY `datetime_added` $activeorder LIMIT 9 OFFSET $page_first_result;");
    } else if (!empty($search) && $condition !== "0") {

        $allproductresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE product.`status_id` = '1' AND images.code LIKE '%img1%' AND product.`title` LIKE '%" . $search . "%' AND  product.`condition_id`= '" . $condition . "';");
        $allproductresultnumber = $allproductresult->num_rows;
        $number_of_pages = ceil($allproductresultnumber / $results_per_page);
        $page_first_result = (int)$pageno * $results_per_page - $results_per_page;
        $productresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE product.`status_id` = '1' AND images.code LIKE '%img1%' AND product.`title` LIKE '%" . $search . "%' AND  product.`condition_id`= '" . $condition . "' LIMIT 9 OFFSET $page_first_result;");
    }else if (!empty($search) && $price !== "0") {

        $allproductresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE product.`status_id` = '1' AND images.code LIKE '%img1%' AND product.`title` LIKE '%" . $search . "%' ORDER BY `price` $priceorder ;");
        $allproductresultnumber = $allproductresult->num_rows;
        $number_of_pages = ceil($allproductresultnumber / $results_per_page);
        $page_first_result = (int)$pageno * $results_per_page - $results_per_page;
        $productresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE product.`status_id` = '1' AND images.code LIKE '%img1%' AND product.`title` LIKE '%" . $search . "%'  ORDER BY `price` $priceorder LIMIT 9 OFFSET $page_first_result;");
    } else if (!empty($search) && $quantity !== "0") {

        $allproductresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE product.`status_id` = '1' AND images.code LIKE '%img1%' AND product.`title` LIKE '%" . $search . "%' ORDER BY `qty` $qtyorder;");
        $allproductresultnumber = $allproductresult->num_rows;
        $number_of_pages = ceil($allproductresultnumber / $results_per_page);
        $page_first_result = (int)$pageno * $results_per_page - $results_per_page;
        $productresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE product.`status_id` = '1' AND images.code LIKE '%img1%' AND product.`title` LIKE '%" . $search . "%'  ORDER BY `qty` $qtyorder LIMIT 9 OFFSET $page_first_result;");
    } else if (!empty($search) && $pf !== "0") {

        $allproductresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE product.`status_id` = '1' AND images.code LIKE '%img1%' AND product.`title` LIKE '%" . $search . "%' AND `price` >= '".$pf."';");
        $allproductresultnumber = $allproductresult->num_rows;
        $number_of_pages = ceil($allproductresultnumber / $results_per_page);
        $page_first_result = (int)$pageno * $results_per_page - $results_per_page;
        $productresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE product.`status_id` = '1' AND images.code LIKE '%img1%' AND product.`title` LIKE '%" . $search . "%'  AND `price` >= '".$pf."' LIMIT 9 OFFSET $page_first_result;");
    } else if (!empty($search) && $pt !== "300000") {

        $allproductresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE product.`status_id` = '1' AND images.code LIKE '%img1%' AND product.`title` LIKE '%" . $search . "%' AND `price` <= '".$pt."';");
        $allproductresultnumber = $allproductresult->num_rows;
        $number_of_pages = ceil($allproductresultnumber / $results_per_page);
        $page_first_result = (int)$pageno * $results_per_page - $results_per_page;
        $productresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE product.`status_id` = '1' AND images.code LIKE '%img1%' AND product.`title` LIKE '%" . $search . "%'  AND `price` <= '".$pt."' LIMIT 9 OFFSET $page_first_result;");
    } else if (!empty($search) && $pf !== "0" && $pt !== "300000") {

        $allproductresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE product.`status_id` = '1' AND images.code LIKE '%img1%' AND product.`title` LIKE '%" . $search . "%' AND `price` BETWEEN '".$pf."' AND '".$pt."' ;");
        $allproductresultnumber = $allproductresult->num_rows;
        $number_of_pages = ceil($allproductresultnumber / $results_per_page);
        $page_first_result = (int)$pageno * $results_per_page - $results_per_page;
        $productresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE product.`status_id` = '1' AND images.code LIKE '%img1%' AND product.`title` LIKE '%" . $search . "%'  AND `price` BETWEEN '".$pf."' AND '".$pt."' LIMIT 9 OFFSET $page_first_result;");
    } else if ($activetime !== "0") {

        $allproductresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE product.`status_id` = '1' AND images.code LIKE '%img1%'  ORDER BY `datetime_added` $activeorder;");
        $allproductresultnumber = $allproductresult->num_rows;
        $number_of_pages = ceil($allproductresultnumber / $results_per_page);
        $page_first_result = (int)$pageno * $results_per_page - $results_per_page;
        $productresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE product.`status_id` = '1' AND images.code LIKE '%img1%'  ORDER BY `datetime_added` $activeorder LIMIT 9 OFFSET $page_first_result;");
    } else if ($quantity !== "0") {

        $allproductresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE product.`status_id` = '1' AND images.code LIKE '%img1%'  ORDER BY `qty` $qtyorder;");
        $allproductresultnumber = $allproductresult->num_rows;
        $number_of_pages = ceil($allproductresultnumber / $results_per_page);
        $page_first_result = (int)$pageno * $results_per_page - $results_per_page;
        $productresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE product.`status_id` = '1' AND images.code LIKE '%img1%' ORDER BY `qty` $qtyorder LIMIT 9 OFFSET $page_first_result;");
    } else if ($condition !== "0") {

        $allproductresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE product.`status_id` = '1' AND images.code LIKE '%img1%'  AND product.`condition_id`= '" . $condition . "';");
        $allproductresultnumber = $allproductresult->num_rows;
        $number_of_pages = ceil($allproductresultnumber / $results_per_page);
        $page_first_result = (int)$pageno * $results_per_page - $results_per_page;
        $productresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE product.`status_id` = '1' AND images.code LIKE '%img1%' AND product.`condition_id`= '" . $condition . "' LIMIT 9 OFFSET $page_first_result;");
    } else if ($price !== "0") {

        $allproductresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE product.`status_id` = '1' AND images.code LIKE '%img1%'  ORDER BY `price` $priceorder ;");
        $allproductresultnumber = $allproductresult->num_rows;
        $number_of_pages = ceil($allproductresultnumber / $results_per_page);
        $page_first_result = (int)$pageno * $results_per_page - $results_per_page;
        $productresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE product.`status_id` = '1' AND images.code LIKE '%img1%' ORDER BY `price` $priceorder LIMIT 9 OFFSET $page_first_result;");
    } else if (!empty($search) && $color !== "0" && $category !== "1") {

        $allproductresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE product.`status_id` = '1' AND images.code LIKE '%img1%' AND product.`title` LIKE '%" . $search . "%' AND `color_id` = '" . $color . "' AND `category_id` = '" . $category . "' ;");
        $allproductresultnumber = $allproductresult->num_rows;
        $number_of_pages = ceil($allproductresultnumber / $results_per_page);
        $page_first_result = (int)$pageno * $results_per_page - $results_per_page;
        $productresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE product.`status_id` = '1' AND images.code LIKE '%img1%' AND product.`title` LIKE '%" . $search . "%' AND `color_id` = '" . $color . "' AND `category_id` = '" . $category . "' LIMIT 9 OFFSET $page_first_result;");
    } else if (empty($search) && $color !== "0" && $category !== "1") {

        $allproductresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE product.`status_id` = '1' AND images.code LIKE '%img1%' AND  `color_id` = '" . $color . "' AND `category_id` = '" . $category . "' ;");
        $allproductresultnumber = $allproductresult->num_rows;
        $number_of_pages = ceil($allproductresultnumber / $results_per_page);
        $page_first_result = (int)$pageno * $results_per_page - $results_per_page;
        $productresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE product.`status_id` = '1' AND images.code LIKE '%img1%' AND  `color_id` = '" . $color . "' AND `category_id` = '" . $category . "' LIMIT 9 OFFSET $page_first_result;");
    } else if (!empty($search) && $category !== "1") {

        $allproductresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE product.`status_id` = '1' AND images.code LIKE '%img1%' AND product.`title` LIKE '%" . $search . "%' AND `category_id` = '" . $category . "' ;");
        $allproductresultnumber = $allproductresult->num_rows;
        $number_of_pages = ceil($allproductresultnumber / $results_per_page);
        $page_first_result = (int)$pageno * $results_per_page - $results_per_page;
        $productresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE product.`status_id` = '1' AND images.code LIKE '%img1%' AND product.`title` LIKE '%" . $search . "%' AND `category_id` = '" . $category . "' LIMIT 9 OFFSET $page_first_result;");
    } else if (empty($search) && $category !== "1") {

        $allproductresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE product.`status_id` = '1' AND images.code LIKE '%img1%' AND  `category_id` = '" . $category . "' ;");
        $allproductresultnumber = $allproductresult->num_rows;
        $number_of_pages = ceil($allproductresultnumber / $results_per_page);
        $page_first_result = (int)$pageno * $results_per_page - $results_per_page;
        $productresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE product.`status_id` = '1' AND images.code LIKE '%img1%'  AND `category_id` = '" . $category . "' LIMIT 9 OFFSET $page_first_result;");
    } else if (!empty($search) && $color !== "0") {

        $allproductresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE product.`status_id` = '1' AND images.code LIKE '%img1%' AND product.`title` LIKE '%" . $search . "%' AND `color_id` = '" . $color . "' ;");
        $allproductresultnumber = $allproductresult->num_rows;
        $number_of_pages = ceil($allproductresultnumber / $results_per_page);
        $page_first_result = (int)$pageno * $results_per_page - $results_per_page;
        $productresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE product.`status_id` = '1' AND images.code LIKE '%img1%' AND product.`title` LIKE '%" . $search . "%' AND `color_id` = '" . $color . "' LIMIT 9 OFFSET $page_first_result;");
    } else if (empty($search) && $color !== "0") {

        $allproductresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE product.`status_id` = '1' AND images.code LIKE '%img1%' AND  `color_id` = '" . $color . "' ;");
        $allproductresultnumber = $allproductresult->num_rows;
        $number_of_pages = ceil($allproductresultnumber / $results_per_page);
        $page_first_result = (int)$pageno * $results_per_page - $results_per_page;
        $productresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE product.`status_id` = '1' AND images.code LIKE '%img1%' AND `color_id` = '" . $color . "' LIMIT 9 OFFSET $page_first_result;");
    } else if (!empty($search)) {

        $allproductresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE product.`status_id` = '1' AND images.code LIKE '%img1%' AND product.`title` LIKE '%" . $search . "%' ;");
        $allproductresultnumber = $allproductresult->num_rows;
        $number_of_pages = ceil($allproductresultnumber / $results_per_page);
        $page_first_result = (int)$pageno * $results_per_page - $results_per_page;
        $productresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE product.`status_id` = '1' AND images.code LIKE '%img1%' AND product.`title` LIKE '%" . $search . "%'  LIMIT 9 OFFSET $page_first_result;");
    } else if ($condition !== "0" && $quantity !== "0" && empty($search)) {

        $allproductresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE product.`status_id` = '1' AND images.code LIKE '%img1%'  AND `condition_id` = '" . $condition . "'  ORDER BY `qty` $qtyorder;");
        $allproductresultnumber = $allproductresult->num_rows;
        $number_of_pages = ceil($allproductresultnumber / $results_per_page);
        $page_first_result = (int)$pageno * $results_per_page - $results_per_page;
        $productresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE product.`status_id` = '1' AND images.code LIKE '%img1%'  AND `condition_id` = '" . $condition . "' ORDER BY `qty` $qtyorder LIMIT 9 OFFSET $page_first_result ;");
    } else if ($condition !== "0" && $quantity !== "0" && !empty($search)) {

        $allproductresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE product.`status_id` = '1' AND images.code LIKE '%img1%'  AND `title` LIKE '%" . $search . "%' AND `condition_id` = '" . $condition . "'  ORDER BY `qty` $qtyorder;");
        $allproductresultnumber = $allproductresult->num_rows;
        $number_of_pages = ceil($allproductresultnumber / $results_per_page);
        $page_first_result = (int)$pageno * $results_per_page - $results_per_page;
        $productresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE product.`status_id` = '1' AND images.code LIKE '%img1%'  AND `title` LIKE '%" . $search . "%'  AND `condition_id` = '" . $condition . "' ORDER BY `qty` $qtyorder LIMIT 9 OFFSET $page_first_result ;");
    } else if ($activetime !== "0" && $condition !== "0" && empty($search)) {

        $allproductresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE product.`status_id` = '1' AND images.code LIKE '%img1%'  AND `condition_id` = '" . $condition . "'  ORDER BY `datetime_added` $activeorder;");
        $allproductresultnumber = $allproductresult->num_rows;
        $number_of_pages = ceil($allproductresultnumber / $results_per_page);
        $page_first_result = (int)$pageno * $results_per_page - $results_per_page;
        $productresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE product.`status_id` = '1' AND images.code LIKE '%img1%'   AND `condition_id` = '" . $condition . "' ORDER BY `datetime_added` $activeorder LIMIT 9 OFFSET $page_first_result ;");
    } else if ($activetime !== "0" && $condition !== "0" && !empty($search)) {

        $allproductresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE product.`status_id` = '1' AND images.code LIKE '%img1%'  AND `title` LIKE '%" . $search . "%' AND `condition_id` = '" . $condition . "'  ORDER BY `datetime_added` $activeorder;");
        $allproductresultnumber = $allproductresult->num_rows;
        $number_of_pages = ceil($allproductresultnumber / $results_per_page);
        $page_first_result = (int)$pageno * $results_per_page - $results_per_page;
        $productresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE product.`status_id` = '1' AND images.code LIKE '%img1%' AND `title` LIKE '%" . $search . "%'  AND `condition_id` = '" . $condition . "' ORDER BY `datetime_added` $activeorder LIMIT 9 OFFSET $page_first_result ;");
    } else if ($color !== "0" && $category !== "0" && !empty($search)) {

        $allproductresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE product.`status_id` = '1' AND images.code LIKE '%img1%'  AND `title` LIKE '%" . $search . "%' AND `category_id` = '" . $category . "' AND `color_id` = '" . $color . "' ;");
        $allproductresultnumber = $allproductresult->num_rows;
        $number_of_pages = ceil($allproductresultnumber / $results_per_page);
        $page_first_result = (int)$pageno * $results_per_page - $results_per_page;
        $productresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE product.`status_id` = '1' AND images.code LIKE '%img1%' AND `title` LIKE '%" . $search . "%'  AND `category_id` = '" . $category . "' AND `color_id` = '" . $color . "'  LIMIT 9 OFFSET $page_first_result ;");
    } else if ($pt !== "300000" && $pf !== "-1" && $activetime !== "0") {
        // price.. seen eka
        $allproductresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE product.`status_id` = '1' AND images.code LIKE '%img1%'  AND  `price` BETWEEN '" . $pf . "' AND '" . $pt . "' ORDER BY `datetime_added` $activeorder;");
        $allproductresultnumber = $allproductresult->num_rows;
        $number_of_pages = ceil($allproductresultnumber / $results_per_page);
        $page_first_result = (int)$pageno * $results_per_page - $results_per_page;
        $productresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE product.`status_id` = '1' AND images.code LIKE '%img1%' AND  `price` BETWEEN '" . $pf . "' AND '" . $pt . "' ORDER BY `datetime_added` $activeorder LIMIT 9 OFFSET $page_first_result;");
    } else if ($pt !== "300000" && $pf !== "-1" && $quantity !== "0") {
        // price
        $allproductresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE product.`status_id` = '1' AND images.code LIKE '%img1%'  AND  `price` BETWEEN '" . $pf . "' AND '" . $pt . "' ORDER BY `qty` $qtyorder;");
        $allproductresultnumber = $allproductresult->num_rows;
        $number_of_pages = ceil($allproductresultnumber / $results_per_page);
        $page_first_result = (int)$pageno * $results_per_page - $results_per_page;
        $productresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE product.`status_id` = '1' AND images.code LIKE '%img1%' AND  `price` BETWEEN '" . $pf . "' AND '" . $pt . "' ORDER BY `qty` $qtyorder LIMIT 9 OFFSET $page_first_result;");
    } else if ($pt !== "300000" && $pf !== "-1" && $condition !== "0") {
        // price
        $allproductresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE product.`status_id` = '1' AND images.code LIKE '%img1%'  AND  `price` BETWEEN '" . $pf . "' AND '" . $pt . "' AND product.`condition_id`= '" . $condition . "';");
        $allproductresultnumber = $allproductresult->num_rows;
        $number_of_pages = ceil($allproductresultnumber / $results_per_page);
        $page_first_result = (int)$pageno * $results_per_page - $results_per_page;
        $productresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE product.`status_id` = '1' AND images.code LIKE '%img1%' AND  `price` BETWEEN '" . $pf . "' AND '" . $pt . "' AND product.`condition_id`= '" . $condition . "' LIMIT 9 OFFSET $page_first_result;");
    } else if ($pt !== "300000" && $pf !== "-1") {
        // price
        $allproductresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE product.`status_id` = '1' AND images.code LIKE '%img1%'  AND  `price` BETWEEN '" . $pf . "' AND '" . $pt . "';");
        $allproductresultnumber = $allproductresult->num_rows;
        $number_of_pages = ceil($allproductresultnumber / $results_per_page);
        $page_first_result = (int)$pageno * $results_per_page - $results_per_page;
        $productresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE product.`status_id` = '1' AND images.code LIKE '%img1%' AND  `price` BETWEEN '" . $pf . "' AND '" . $pt . "' LIMIT 9 OFFSET $page_first_result;");
    } else if ($pt !== "300000") {
        // price
        $allproductresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE product.`status_id` = '1' AND images.code LIKE '%img1%'  AND  `price` <=  '" . $pt . "';");
        $allproductresultnumber = $allproductresult->num_rows;
        $number_of_pages = ceil($allproductresultnumber / $results_per_page);
        $page_first_result = (int)$pageno * $results_per_page - $results_per_page;
        $productresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE product.`status_id` = '1' AND images.code LIKE '%img1%' AND `price` <=  '" . $pt . "' LIMIT 9 OFFSET $page_first_result;");
    } else if ($pf !== "-1") {
        // price seen eka
        $allproductresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE product.`status_id` = '1' AND  images.code LIKE '%img1%'  AND `price` >= '" . $pf . "';");
        $allproductresultnumber = $allproductresult->num_rows;
        $number_of_pages = ceil($allproductresultnumber / $results_per_page);
        $page_first_result = (int)$pageno * $results_per_page - $results_per_page;
        $productresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE product.`status_id` = '1' AND images.code LIKE '%img1%' AND `price` >= '" . $pf . "' LIMIT 9 OFFSET $page_first_result;");
    } else if ($category !== "1") {

        $allproductresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE product.`status_id` = '1' AND images.code LIKE '%img1%' AND product.`category_id` = '" . $category . "' ;");
        $allproductresultnumber = $allproductresult->num_rows;
        $number_of_pages = ceil($allproductresultnumber / $results_per_page);
        $page_first_result = (int)$pageno * $results_per_page - $results_per_page;
        $productresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE product.`status_id` = '1' AND images.code LIKE '%img1%' AND product.`category_id` = '" . $category . "'  LIMIT 9 OFFSET $page_first_result;");
    } else if ($color !== "1") {

        $allproductresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE product.`status_id` = '1' AND images.code LIKE '%img1%' AND product.`color_id` = '" . $color . "' ;");
        $allproductresultnumber = $allproductresult->num_rows;
        $number_of_pages = ceil($allproductresultnumber / $results_per_page);
        $page_first_result = (int)$pageno * $results_per_page - $results_per_page;
        $productresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE product.`status_id` = '1' AND images.code LIKE '%img1%' AND product.`color_id` = '" . $color . "'  LIMIT 9 OFFSET $page_first_result;");
    } else {
    }

    $productnum = $productresult->num_rows;
    if ($productnum == 0) {
        echo "<h3 style = 'text-align:center; color: gray; margin-top: 100px; ' >No Products Available For Your Keyword !!</h3>";
        echo "<h3 style = 'text-align:center; color: gray; margin-bottom: 50px;' >Try again..</h3>";
    }
?>
    <div class="col-12" id="products">
        <div class="row g-2 py-2">

            <?php
            for ($x = 0; $x < $productnum; $x++) {
                $product = $productresult->fetch_assoc();
            ?>
                <!-- start single product item -->
                <li>
                    <figure>
                        <a class="aa-product-img"><img style="width: 250px; height: auto; " src="<?php echo $product['code']; ?>" alt="polo shirt img"></a>
                        <a style="cursor: pointer; margin-bottom: 50px;" class="aa-add-card-btn" onclick="addToCart(<?php echo $product['id'] ?>);"><span class="fa fa-shopping-cart"></span>Add To Cart</a>

                        <figcaption>
                            <!-- <br /> -->
                            <h4 style="font-family: 'calibri';" id="title<?php echo $product["id"]; ?>" class="aa-product-title"><a href="#"><?php echo $product["title"]; ?></a></h4>

                            <?php
                            $feedback = Database::search("SELECT * FROM `feedback` WHERE `product_id` = '" . $product["id"] . "' ");
                            $fr = $feedback->num_rows;

                            if ($fr == 1) {
                            ?>
                                <div style="color: #FF2828;" class="product-wid-rating ">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>&nbsp;<span style="color: black;"> (<?php echo $fr; ?>)</span>
                                </div>
                            <?php
                            } else if ($fr > 1) {
                            ?>
                                <div style="color: #FF2828;" class="product-wid-rating ">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>&nbsp;<span style="color: black;"> (<?php echo $fr; ?>)</span>
                                </div>
                            <?php
                            } else {
                            ?>
                                <div style="color: black;" class="product-wid-rating ">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>&nbsp;<span style="color: black;"> (0)</span>
                                </div>
                            <?php
                            }
                            ?>

                           
                            <span style="font-family: 'calibri';" class="aa-product-price">Rs <?php echo $product["price"]; ?> .00</span><span class="aa-product-price"></span>&nbsp;&nbsp;<span style="font-weight: bolder;"> x </span>&nbsp;&nbsp;
                            <span><input style="text-align: center; display: inline; font-family: 'calibri'; width: 25%; margin-left: auto; margin-right: auto; background-color: transparent; color: black; height: 20px; border-color: #0090CC; border-width: 2px; " min="1" id="qtytxt<?php echo $product["id"]; ?>" type="number" class="form-control mb-1 " value="1"></span>


                            <p class="aa-product-descrip"><?php echo $product["description"]; ?>.</p>
                        </figcaption>
                    </figure>
                    <div class="aa-product-hvr-content">
                        <a style="cursor: pointer; background-color: #FF2424; color: white;" onclick="addToWishList(<?php echo $product['id'] ?>);" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a style="cursor: pointer; background-color: #000000; color: white;" href="<?php echo "product-detail.php?id=" . ($product['id']); ?>" data-toggle="tooltip" data-placement="top" title="View Product"><span class="fa fa-eye"></span></a>
                        <a style="cursor: pointer; background-color: #000000; color: white;" onclick="quickViewModel(<?php echo $product['id']; ?>);" href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal<?php echo $product["id"] ?>"><span class="fa fa-search"></span></a>
                    </div>
                    <!-- product badge -->

                    <?php

                    if ((int)$product["qty"] > 0) {
                    ?>
                        <span class="aa-badge aa-sold-out" href="#">In Stock</span>
                    <?php
                    } else {
                    ?>
                        <span class="aa-badge aa-sale" href="#">Out Of Stock</span>
                    <?php
                    }
                    ?>


                </li>
                <!-- start single product item -->


                <?php
                $images0 = Database::search("SELECT * FROM `images` WHERE `product_id` = '" . $product["id"] . "' AND `code` LIKE '%img1%' ");
                $imgr1 = $images0->fetch_assoc();
                $images = Database::search("SELECT * FROM `images` WHERE `product_id` = '" . $product["id"] . "' AND `code` LIKE '%img2%' ");
                $imgr2 = $images->fetch_assoc();
                $images3 = Database::search("SELECT * FROM `images` WHERE `product_id` = '" . $product["id"] . "' AND `code` LIKE '%img3%' ");
                $imgr3 = $images3->fetch_assoc();
                ?>

                <!-- model -->
                <div class="modal fade quick-view-modal" id="quick-view-modal<?php echo $product["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <div class="row">

                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="aa-product-view-slider">
                                            <div class="simpleLens-gallery-container" id="demo-1">
                                                <div style="height: 400px;" class="simpleLens-container">
                                                    <div class="simpleLens-big-image-container">
                                                        <a class="simpleLens-lens-image">
                                                            <img src="<?php echo $imgr1["code"] ?>" class="simpleLens-big-image">
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="simpleLens-thumbnails-container">
                                                    <a href="#" class="simpleLens-thumbnail-wrapper" data-big-image="<?php echo $imgr1["code"] ?>">
                                                        <img style="width: 108px; height: auto;" src="<?php echo $imgr1["code"] ?>">
                                                    </a>
                                                    <a href="#" class="simpleLens-thumbnail-wrapper" data-big-image="<?php echo $imgr2["code"] ?>">
                                                        <img style="width: 108px; height: auto;" src="<?php echo $imgr2["code"] ?>">
                                                    </a>

                                                    <a href="#" class="simpleLens-thumbnail-wrapper" data-big-image="<?php echo $imgr3["code"] ?>">
                                                        <img style="width: 108px; height: auto;" src="<?php echo $imgr3["code"] ?>">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="aa-product-view-content">
                                            <h5 id="para1"></h5>

                                            <h1 style="font-weight: bold; font-family: 'calibri';"><?php echo $product["title"] ?></h1>
                                            <br />
                                            <div class="aa-price-block">
                                                <p style="font-size: xx-large;" class="aa-product-view-price">Rs. <?php echo $product["price"] ?> .00</p>

                                                <?php
                                                if ((int)$product["qty"] > 0) {
                                                ?>
                                                    <p class="aa-product-avilability">Avilability: <span style="color: red;">In stock</span></p>
                                                <?php
                                                } else {
                                                ?>
                                                    <p class="aa-product-avilability">Avilability: <span>Out Of Stock</span></p>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                            <p class="aa-product-price"> <?php echo $product["qty"] ?> Items Left</span><span class="aa-product-price"></p>
                                            <input style="display: none;" min="1" id="qtytxt<?php echo $product["id"]; ?>" type="number" class="form-control mb-1 " value="1">

                                            <?php
                                            $color_rs = Database::search("SELECT `name` FROM `color` WHERE `id` ='" . $product["color_id"] . "' ");
                                            $clr = $color_rs->fetch_assoc();
                                            $condition_rs = Database::search("SELECT * FROM `condition` WHERE `id` = '" . $product["condition_id"] . "' ");
                                            $cor = $condition_rs->fetch_assoc();
                                            $brand = Database::search("SELECT * FROM `brand` WHERE `id` = '" . $product["model_has_brand_id"] . "' ");
                                            $brand_d = $brand->fetch_assoc();
                                            $user_rs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $product["user_email"] . "' ");
                                            $user_d = $user_rs->fetch_assoc();
                                            ?>

                                            <p>Product Color: <span style="color: #BA0000;"><?php echo $clr["name"] ?></span></p>
                                            <p>Product Condition: <span style="color: #BA0000;"><?php echo $cor["name"] ?></span></p>
                                            <p>Product Brand: <span style="color: #BA0000;"><?php echo $brand_d["name"] ?></span></p>
                                            <p>Product Listed On: <span style="color: #BA0000;"><?php echo $product["datetime_added"] ?></span></p>
                                            <p>Seller Name: <span style="color: blue;"><?php echo $user_d["fname"] . " " . $user_d["lname"] ?></span></p>
                                            <p>Seller Email: <span style="color: blue;"><?php echo $user_d["email"]; ?></span></p>


                                            <div class="aa-prod-view-bottom">
                                                <a data-dismiss="modal" style="cursor: pointer; background-color: #F63333; color: white;" onclick="addToCart(<?php echo $product['id'] ?>);" class="btn aa-add-to-cart-btn btn btn-outline-primary"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                                                <a style="background-color: #0E68FF; color: white;" href="<?php echo "product-detail.php?id=" . ($product['id']); ?>" class="btn aa-add-to-cart-btn">View Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- model -->



            <?php
            }
            ?>
        </div>
    </div>



    <!--pagination-->
    <div class="col-12 col-lg-4 offset-lg-4 aa-product-catg-pagination">
        <div class="pagination">
            <?php

            if ($pageno != 1) {

            ?>
                <button class="btn btn-light ms-1" style="width: 45px;" onclick="productSearch(<?php echo $pageno - 1; ?>);">&laquo;</button>
            <?php
            }
            ?>

            <?php

            for ($i = 1; $i <= $number_of_pages; $i++) {

                if ($i == $pageno) {

            ?>
                    <button class="btn btn-primary ms-1" style="width: 45px;" onclick="productSearch(<?php echo $i; ?>);"><?php echo $i; ?></button>
                <?php

                } else {

                ?>
                    <button class="btn btn-outline-secondary ms-1" style="width: 45px;" onclick="productSearch(<?php echo $i; ?>);"><?php echo $i; ?></button>
            <?php
                }
            }
            ?>

            <?php
            if ($pageno != $number_of_pages) {
            ?>
                <button class="btn btn-light ms-1" style="width: 45px;" onclick="productSearch(<?php echo $pageno + 1; ?>);">&raquo;</button>
            <?php
            }
            ?>
        </div>
    </div>
    <!--pagination-->
<?php
}
?>