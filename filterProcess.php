<?php

session_start();
$email = $_SESSION["u"]["email"];

require "connection.php";

$search = $_POST["search"];
$activetime = $_POST["activetime"];
$quantity = $_POST["quantity"];
$condition = $_POST["condition"];

$activeorder;
$qtyorder;
$activetime_qty;

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

// if($activetime == "1" && $quantity == "1"){
//     $activetime_qty = "DESC";
// }else if($activetime == "2" && $quantity == "2"){
//     $activetime_qty = "ASC";
// }



if (empty($search) && $activetime == "0" && $quantity == "0" && $condition == "0") {
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

        $allproductresult = Database::search("SELECT DISTINCT * FROM `product` INNER JOIN `images` ON product.id = images.product_id WHERE images.code LIKE '%img1%' AND product.`title` LIKE '%" . $search . "%' AND product.`user_email` = '" . $email . "' ORDER BY `datetime_added` $activeorder;");
        $allproductresultnumber = $allproductresult->num_rows;
        $number_of_pages = ceil($allproductresultnumber / $results_per_page);
        $page_first_result = (int)$pageno * $results_per_page - $results_per_page;
        $productresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE images.code LIKE '%img1%' AND  product.`title` LIKE '%" . $search . "%' AND product.`user_email` = '" . $email . "' ORDER BY `datetime_added` $activeorder LIMIT 6 OFFSET $page_first_result;");
    } else if (!empty($search) && $quantity !== "0") {

        $allproductresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE images.code LIKE '%img1%' AND product.`title` LIKE '%" . $search . "%' AND product.`user_email` = '" . $email . "' ORDER BY `qty` $qtyorder;");
        $allproductresultnumber = $allproductresult->num_rows;
        $number_of_pages = ceil($allproductresultnumber / $results_per_page);
        $page_first_result = (int)$pageno * $results_per_page - $results_per_page;
        $productresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE images.code LIKE '%img1%' AND product.`title` LIKE '%" . $search . "%' AND product.`user_email` = '" . $email . "' ORDER BY `qty` $qtyorder LIMIT 6 OFFSET $page_first_result;");
    } else if (!empty($search) && $condition !== "0") {

        $allproductresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE images.code LIKE '%img1%' AND product.`title` LIKE '%" . $search . "%' AND product.`user_email` = '" . $email . "' AND product.`condition_id`= '" . $condition . "';");
        $allproductresultnumber = $allproductresult->num_rows;
        $number_of_pages = ceil($allproductresultnumber / $results_per_page);
        $page_first_result = (int)$pageno * $results_per_page - $results_per_page;
        $productresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE images.code LIKE '%img1%' AND product.`title` LIKE '%" . $search . "%' AND product.`user_email` = '" . $email . "' AND product.`condition_id`= '" . $condition . "' LIMIT 6 OFFSET $page_first_result;");
    } else if ($condition !== "0" && $quantity !== "0" && !empty($search)) {

        $allproductresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE images.code LIKE '%img1%' AND product.`user_email` = '" . $email . "' AND `title` LIKE '%".$search."%' AND `condition_id` = '".$condition."'  ORDER BY `qty` $qtyorder;");
        $allproductresultnumber = $allproductresult->num_rows;
        $number_of_pages = ceil($allproductresultnumber / $results_per_page);
        $page_first_result = (int)$pageno * $results_per_page - $results_per_page;
        $productresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE images.code LIKE '%img1%' AND product.`user_email` = '" . $email .  "' AND `title` LIKE '%".$search."%'  AND `condition_id` = '".$condition."' ORDER BY `qty` $qtyorder LIMIT 6 OFFSET $page_first_result ;");
    } else if ($condition !== "0" && $quantity !== "0" && empty($search)) {

        $allproductresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE images.code LIKE '%img1%' AND product.`user_email` = '" . $email . "' AND `condition_id` = '".$condition."'  ORDER BY `qty` $qtyorder;");
        $allproductresultnumber = $allproductresult->num_rows;
        $number_of_pages = ceil($allproductresultnumber / $results_per_page);
        $page_first_result = (int)$pageno * $results_per_page - $results_per_page;
        $productresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE images.code LIKE '%img1%' AND product.`user_email` = '" . $email .  "'  AND `condition_id` = '".$condition."' ORDER BY `qty` $qtyorder LIMIT 6 OFFSET $page_first_result ;");
    } else if ($activetime !== "0" && $condition !== "0" && empty($search)) {

        $allproductresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE images.code LIKE '%img1%' AND product.`user_email` = '" . $email . "' AND `condition_id` = '".$condition."'  ORDER BY `datetime_added` $activeorder;");
        $allproductresultnumber = $allproductresult->num_rows;
        $number_of_pages = ceil($allproductresultnumber / $results_per_page);
        $page_first_result = (int)$pageno * $results_per_page - $results_per_page;
        $productresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE images.code LIKE '%img1%' AND product.`user_email` = '" . $email .  "'  AND `condition_id` = '".$condition."' ORDER BY `datetime_added` $activeorder LIMIT 6 OFFSET $page_first_result ;");
    } else if ($activetime !== "0" && $condition !== "0" && !empty($search)) {

        $allproductresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE images.code LIKE '%img1%' AND product.`user_email` = '" . $email . "' AND `title` LIKE '%".$search."%' AND `condition_id` = '".$condition."'  ORDER BY `datetime_added` $activeorder;");
        $allproductresultnumber = $allproductresult->num_rows;
        $number_of_pages = ceil($allproductresultnumber / $results_per_page);
        $page_first_result = (int)$pageno * $results_per_page - $results_per_page;
        $productresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE images.code LIKE '%img1%' AND product.`user_email` = '" . $email .  "' AND `title` LIKE '%".$search."%'  AND `condition_id` = '".$condition."' ORDER BY `datetime_added` $activeorder LIMIT 6 OFFSET $page_first_result ;");
    } else if (!empty($search)) {

        $allproductresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE images.code LIKE '%img1%' AND product.`title` LIKE '%" . $search . "%' AND product.`user_email` = '" . $email . "';");
        $allproductresultnumber = $allproductresult->num_rows;
        $number_of_pages = ceil($allproductresultnumber / $results_per_page);
        $page_first_result = (int)$pageno * $results_per_page - $results_per_page;
        $productresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE images.code LIKE '%img1%' AND product.`title` LIKE '%" . $search . "%' AND product.`user_email` = '" . $email . "' LIMIT 6 OFFSET $page_first_result;");
    } else if ($activetime !== "0") {

        $allproductresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE images.code LIKE '%img1%' AND product.`user_email` = '" . $email . "' ORDER BY `datetime_added` $activeorder;");
        $allproductresultnumber = $allproductresult->num_rows;
        $number_of_pages = ceil($allproductresultnumber / $results_per_page);
        $page_first_result = (int)$pageno * $results_per_page - $results_per_page;
        $productresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE images.code LIKE '%img1%' AND product.`user_email` = '" . $email . "' ORDER BY `datetime_added` $activeorder LIMIT 6 OFFSET $page_first_result;");
    } else if ($quantity !== "0") {

        $allproductresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE images.code LIKE '%img1%' AND product.`user_email` = '" . $email . "' ORDER BY `qty` $qtyorder;");
        $allproductresultnumber = $allproductresult->num_rows;
        $number_of_pages = ceil($allproductresultnumber / $results_per_page);
        $page_first_result = (int)$pageno * $results_per_page - $results_per_page;
        $productresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE images.code LIKE '%img1%' AND product.`user_email` = '" . $email . "' ORDER BY `qty` $qtyorder LIMIT 6 OFFSET $page_first_result;");
    } else if ($condition !== "0") {

        $allproductresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE images.code LIKE '%img1%' AND product.`user_email` = '" . $email . "' AND product.`condition_id`= '" . $condition . "';");
        $allproductresultnumber = $allproductresult->num_rows;
        $number_of_pages = ceil($allproductresultnumber / $results_per_page);
        $page_first_result = (int)$pageno * $results_per_page - $results_per_page;
        $productresult = Database::search("SELECT DISTINCT * FROM `product`INNER JOIN `images` ON product.id = images.product_id WHERE images.code LIKE '%img1%' AND product.`condition_id`= '" . $condition . "' AND product.`user_email` = '" . $email . "' LIMIT 6 OFFSET $page_first_result;");
    } else {
    }

    $productnum = $productresult->num_rows;
?>
    <div class="col-12" id="products">
        <div class="row g-2 py-2">

            <?php
            for ($x = 0; $x < $productnum; $x++) {
                $product = $productresult->fetch_assoc();
            ?>

                <div class="col-12 col-lg-6">
                    <div class="card">
                        <div class="row g-0">
                            <div class="col-md-4 my-auto mx-auto text-center">
                                <img src="<?php echo $product['code']; ?>" style="height: 95px; width: auto;">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body ">
                                    <h5 class="card-title fw-bold" id="title<?php echo $product["id"]; ?>"><?php echo $product["title"]; ?></h5>
                                    <span class="card-text fw-bold text-success"><span class="text-dark">Unit Price: </span>Rs.<?php echo $product["price"]; ?> .00</span><br />
                                    <span class="card-text text-success fw-bold"><span class="text-dark">Quantity: </span><?php echo $product["qty"]; ?> items</span><br />
                                    <span class="card-text fw-bold text-success"><span class="text-dark">Product Listed Date & Time: </span> <?php echo $product["datetime_added"] ?></span><br />
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="check" onchange="changeStatus(<?php echo $product['id']; ?>);">

                                        <label class="form-check-label fw-bold text-info" for="check" id="checklabel<?php echo $product["id"]; ?>"><?php
                                                                                                                                                    if ($product["status_id"] == 2) {
                                                                                                                                                        echo "Make Your Product Active";
                                                                                                                                                    } else {
                                                                                                                                                        echo "Make Your Product Deactive";
                                                                                                                                                    }
                                                                                                                                                    ?></label>

                                    </div>
                                    <div class="row">
                                        <div class="col-5 offset-1 col-lg-6 offset-lg-0 d-grid">
                                            <a href="#" onclick="sendid('<?php echo $product['id']; ?>')" class="btn btn-primary text-products">Update Product</a>
                                        </div>
                                        <div class="col-5 col-lg-6 d-grid">
                                            <a href="#" class="btn btn-danger text-products" onclick="deleteModal(<?php echo $product['id'] ?>);">Delete Product</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Modal-->
                <div class="modal fade" id="deleteModal<?php echo $product["id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title fw-bold text-danger" id="exampleModalLabel">Warning...</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure about Deleting this product?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-bs-dismiss="modal">No</button>
                                <button type="button" class="btn btn-danger" onclick="deleteProduct(<?php echo $product['id'] ?>)">Yes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Modal-->

            <?php
            }
            ?>
        </div>
    </div>
    <!--pagination-->
    <div class="col-12 col-lg-4 offset-lg-4 d-flex justify-content-center">
        <div class="pagination">
            <?php

            if ($pageno != 1) {

            ?>
                <button class="btn btn-light ms-1" style="width: 45px;" onclick="addfilters(<?php echo $pageno - 1; ?>);">&laquo;</button>
            <?php
            }
            ?>

            <?php

            for ($i = 1; $i <= $number_of_pages; $i++) {

                if ($i == $pageno) {

            ?>
                    <button class="btn btn-primary ms-1" style="width: 45px;" onclick="addfilters(<?php echo $i; ?>);"><?php echo $i; ?></button>
                <?php

                } else {

                ?>
                    <button class="btn btn-outline-secondary ms-1" style="width: 45px;" onclick="addfilters(<?php echo $i; ?>);"><?php echo $i; ?></button>
            <?php
                }
            }
            ?>

            <?php
            if ($pageno != $number_of_pages) {
            ?>
                <button class="btn btn-light ms-1" style="width: 45px;" onclick="addfilters(<?php echo $pageno + 1; ?>);">&raquo;</button>
            <?php
            }
            ?>
        </div>
    </div>
    <!--pagination-->
<?php
}
?>