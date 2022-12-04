<?php
session_start();
require "connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LION HUB | Product</title>

    <!-- Font awesome -->
    <link href="other/icon.png" rel="icon">
    <!-- Font awesome -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- SmartMenus jQuery Bootstrap Addon CSS -->
    <link href="css/jquery.smartmenus.bootstrap.css" rel="stylesheet">
    <!-- Product view slider -->
    <link rel="stylesheet" type="text/css" href="css/jquery.simpleLens.css">
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="css/slick.css">

    <!-- Theme color -->
    <link id="switcher" href="css/theme-color/lite-blue-theme.css" rel="stylesheet">
    <!-- Top Slider CSS -->
    <link href="css/sequence-theme.modern-slide-in.css" rel="stylesheet" media="all">

    <!-- Main style sheet -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Pricing slider -->
    <link href="css/nouislider.css" rel="stylesheet">

    <!-- Alerts -->
    <link rel="stylesheet" href="other/snackbar.min.css">

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>

    <!-- <script>
        (function(w, d) {
            w.CollectId = "618b7f3e11c7462f21dec261";
            var h = d.head || d.getElementsByTagName("head")[0];
            var s = d.createElement("script");
            s.setAttribute("type", "text/javascript");
            s.async = true;
            s.setAttribute("src", "https://collectcdn.com/launcher.js");
            h.appendChild(s);
        })(window, document);
    </script> -->

</head>
<!-- !Important notice -->
<!-- Only for product page body tag have to added .productPage class -->

<body class="productPage" onload="searchAlert();">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
    <!-- END SCROLL TOP BUTTON -->


    <?php
    require "header.php";
    ?>



    <!-- catg header banner section -->
    <!-- <section id="aa-catg-head-banner">
        <img src="resources/allproduct.jpg" alt="fashion img">
        <div class="aa-catg-head-banner-area">
            <div class="container">
                <div class="aa-catg-head-banner-content">
                    <h2>Search Your Favour</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Products</li>
                    </ol>
                </div>
            </div>
        </div>
    </section> -->
    <!-- / catg header banner section -->

    <!-- product category -->
    <section id="aa-product-category">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
                    <div class="aa-product-catg-content">
                        <div class="aa-product-catg-head">
                            <div class="aa-product-catg-head-left">
                                <!-- <div class="aa-sort-form">
                                    <label for="">Sort by</label>
                                    <select name="">
                                        <option value="1" selected="Default">Default</option>
                                        <option value="2">Name</option>
                                        <option value="3">Price</option>
                                        <option value="4">Date</option>
                                    </select>
                                </div>
                                <div class="aa-show-form">
                                    <label for="">Show</label>
                                    <select name="">
                                        <option value="1" selected="12">12</option>
                                        <option value="2">24</option>
                                        <option value="3">36</option>
                                    </select>
                                </div> -->
                                <div class="aa-sort-form">
                                    <label for="">You can search products by either basic search or advanced search..</label>
                                </div>
                            </div>
                            <div class="aa-product-catg-head-right">
                                <a id="grid-catg" href="#"><span class="fa fa-th"></span></a>
                                <!-- <a id="list-catg" href="#"><span class="fa fa-list"></span></a> -->
                            </div>
                        </div>
                        <div class="col-12 aa-product-catg-body">
                            <ul id="filterproducs" class="aa-product-catg">
                                <!-- start single product item -->
                                <div class="col-12" id="products">
                                    <div class="row g-2 py-2">

                                        <?php

                                        if (isset($_GET["page"])) {
                                            $pageno = $_GET["page"];
                                        } else {
                                            $pageno = 1;
                                        }

                                        $products = Database::search("SELECT * FROM `product` WHERE `qty` >= '1' AND `status_id` = '1' ORDER BY `datetime_added` DESC LIMIT 18 ");
                                        $d = $products->num_rows;
                                        $row = $products->fetch_assoc();

                                        $results_per_page = 9;
                                        $number_of_pages = ceil($d / $results_per_page);
                                        $page_first_result = ((int)$pageno - 1) * $results_per_page;

                                        $select_edrs = Database::search("SELECT * FROM `product` WHERE `qty` >= '1' AND `status_id` = '1' ORDER BY `datetime_added` DESC 
                                        LIMIT " . $results_per_page . " OFFSET " . $page_first_result . "");
                                        $srn = $select_edrs->num_rows;

                                        while ($srow = $select_edrs->fetch_assoc()) {

                                            // for ($i = 0; $i < $srn; $i++) {


                                        ?>
                                            <li>
                                                <figure>

                                                    <?php
                                                    $pimgrs = Database::search("SELECT * FROM `images` WHERE `code` LIKE '%img1%' AND `product_id`='" . $srow["id"] . "'");
                                                    $pir = $pimgrs->fetch_assoc();
                                                    $pimgrs1 = Database::search("SELECT * FROM `images` WHERE `code` LIKE '%img2%' AND `product_id`='" . $srow["id"] . "'");
                                                    $pir1 = $pimgrs1->fetch_assoc();
                                                    $pimgrs2 = Database::search("SELECT * FROM `images` WHERE `code` LIKE '%img3%' AND `product_id`='" . $srow["id"] . "'");
                                                    $pir2 = $pimgrs2->fetch_assoc();
                                                    ?>

                                                    <a class="aa-product-img"><img style="width: 250px; height: auto; " src="<?php echo $pir["code"] ?>" alt="polo shirt img"></a>
                                                    <a style="cursor: pointer; margin-bottom: 50px;" onclick="addToCart(<?php echo $srow['id'] ?>);" class="aa-add-card-btn"><span class="fa fa-shopping-cart"></span>Add To Cart</a>

                                                    <figcaption>
                                                        <!-- <br /> -->
                                                        <h4 style="font-family: 'calibri';" class="aa-product-title"><a><?php echo $srow["title"] ?></a></h4>


                                                        <?php
                                                        $feedback = Database::search("SELECT * FROM `feedback` WHERE `product_id` = '" . $srow["id"] . "' ");
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


                                                        <span style="display: inline; font-family: 'calibri';" class="aa-product-price"> Rs <?php echo $srow["price"] ?> .00</span><span class="aa-product-price"></span> &nbsp;&nbsp;<span style="font-weight: bolder;"> x </span>&nbsp;&nbsp;
                                                        <span> <input style="text-align: center; display: inline; font-family: 'calibri'; width: 25%; margin-left: auto; margin-right: auto; background-color: transparent; color: black; height: 20px; border-color: #0090CC; border-width: 2px; " min="1" id="qtytxt<?php echo $srow["id"]; ?>" type="number" class="form-control mb-1 " value="1"></span>


                                                        <p class="aa-product-descrip"><?php echo $srow["description"] ?>.</p>
                                                    </figcaption>

                                                </figure>
                                                <div class="aa-product-hvr-content">
                                                    <a style="cursor: pointer; background-color: #FF2424; color: white;" onclick="addToWishList(<?php echo $srow['id'] ?>);" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                                                    <a style="cursor: pointer; background-color: #000000; color: white;" href="<?php echo "product-detail.php?id=" . ($srow['id']); ?>" data-toggle="tooltip" data-placement="top" title="View Product"><span class="fa fa-eye"></span></a>
                                                    <a style="cursor: pointer; background-color: #000000; color: white;" onclick="quickViewModel(<?php echo $srow['id']; ?>);" href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal<?php echo $srow["id"] ?>"><span class="fa fa-search"></span></a>
                                                </div>
                                                <!-- product badge -->
                                                <?php
                                                if ((int)$srow["qty"] > 0) {
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


                                            <!-- model -->
                                            <div class="modal fade quick-view-modal" id="quick-view-modal<?php echo $srow["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                                                                        <img src="<?php echo $pir["code"] ?>" class="simpleLens-big-image">
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="simpleLens-thumbnails-container">
                                                                                <a href="#" class="simpleLens-thumbnail-wrapper" data-big-image="<?php echo $pir["code"] ?>">
                                                                                    <img style="width: 108px; height: auto;" src="<?php echo $pir["code"] ?>">
                                                                                </a>
                                                                                <a href="#" class="simpleLens-thumbnail-wrapper" data-big-image="<?php echo $pir1["code"] ?>">
                                                                                    <img style="width: 108px; height: auto;" src="<?php echo $pir1["code"] ?>">
                                                                                </a>

                                                                                <a href="#" class="simpleLens-thumbnail-wrapper" data-big-image="<?php echo $pir2["code"] ?>">
                                                                                    <img style="width: 108px; height: auto;" src="<?php echo $pir2["code"] ?>">
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="aa-product-view-content">
                                                                        <h5 id="para1"></h5>

                                                                        <h1 style="font-weight: bold; font-family: 'calibri';"><?php echo $srow["title"] ?></h1>
                                                                        <br />
                                                                        <div class="aa-price-block">
                                                                            <p style="font-size: xx-large;" class="aa-product-view-price">Rs. <?php echo $srow["price"] ?> .00</p>

                                                                            <?php
                                                                            if ((int)$srow["qty"] > 0) {
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
                                                                        <p class="aa-product-price"> <?php echo $srow["qty"] ?> Items Left</span><span class="aa-product-price"></p>
                                                                        <input style="display: none;" min="1" id="qtytxt<?php echo $product["id"]; ?>" type="number" class="form-control mb-1 " value="1">

                                                                        <?php
                                                                        $color_rs = Database::search("SELECT `name` FROM `color` WHERE `id` ='" . $srow["color_id"] . "' ");
                                                                        $clr = $color_rs->fetch_assoc();
                                                                        $condition_rs = Database::search("SELECT * FROM `condition` WHERE `id` = '" . $srow["condition_id"] . "' ");
                                                                        $cor = $condition_rs->fetch_assoc();

                                                                        $brand = Database::search("SELECT * FROM `model_has_brand` WHERE `id` = '" . $srow["model_has_brand_id"] . "' ");
                                                                        $brand_d = $brand->fetch_assoc();
                                                                        $brand_id = $brand_d["brand_id"];
                                                                        $brand1 = Database::search("SELECT * FROM `brand` WHERE `id` = '".$brand_id."' ");
                                                                        $brand_result = $brand1->fetch_assoc();

                                                                        $user_rs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $srow["user_email"] . "' ");
                                                                        $user_d = $user_rs->fetch_assoc();
                                                                        ?>

                                                                        <p>Product Color: <span style="color: #BA0000;"><?php echo $clr["name"] ?></span></p>
                                                                        <p>Product Condition: <span style="color: #BA0000;"><?php echo $cor["name"] ?></span></p>
                                                                        <p>Product Brand: <span style="color: #BA0000;"><?php echo $brand_result["name"] ?></span></p>
                                                                        <p>Product Listed On: <span style="color: #BA0000;"><?php echo $srow["datetime_added"] ?></span></p>
                                                                        <p>Seller Name: <span style="color: blue;"><?php echo $user_d["fname"] . " " . $user_d["lname"] ?></span></p>
                                                                        <p>Seller Email: <span style="color: blue;"><?php echo $user_d["email"]; ?></span></p>


                                                                        <div class="aa-prod-view-bottom">
                                                                            <div class="col-12">
                                                                                <div class="row">

                                                                                    <a style="width: 33%; background-color: #0E68FF; color: white;" href="<?php echo "product-detail.php?id=" . ($srow['id']); ?>" class="btn aa-add-to-cart-btn">View Details</a>
                                                                                    <a onclick="sse('<?php echo $user_d['email'] ?>');" style="width: 40%; background-color: #3A3A3A; color: white;" href="#" class="btn aa-add-to-cart-btn">Contact Seller</a>
                                                                                    <a data-dismiss="modal" style="width: 14%; cursor: pointer; background-color: #F63333; color: white;" onclick="addToCart(<?php echo $srow['id'] ?>);" class="btn aa-add-to-cart-btn "><span class="fa fa-shopping-cart"></span></a>
                                                                                </div>
                                                                            </div>

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



                                        <!-- pagination -->

                                        <div id="sp" class="col-12 mb-3 text-center">

                                            <div class=" col-12 col-lg-4 offset-lg-4  aa-product-catg-pagination">
                                                <div class="pagination">
                                                    <a class="btn btn-light" href="
                                                        <?php
                                                        if ($pageno <= 1) {
                                                            echo "#";
                                                        } else {
                                                            echo "?page=" . ($pageno - 1);
                                                        }
                                                        ?>">&laquo;</a>


                                                    <?php
                                                    $page;

                                                    for ($page = 1; $page <= $number_of_pages; $page++) {
                                                        if ($page == $pageno) {
                                                    ?>
                                                            <a href="<?php echo "?page=" . ($page); ?>" class="ms-1 active btn btn-primary"><?php echo $page; ?></a>

                                                        <?php
                                                        } else {
                                                        ?>
                                                            <a href="<?php echo "?page=" . ($page); ?>" class="ms-1 btn btn-light"><?php echo $page; ?></a>

                                                    <?php
                                                        }
                                                    }

                                                    ?>
                                                    <a class="btn btn-light" href="
                                                        <?php
                                                        if ($pageno >= $number_of_pages) {
                                                            echo "#";
                                                        } else {
                                                            echo "?page=" . ($pageno + 1);
                                                        }
                                                        ?>
                                                    ">&raquo;</a>

                                                </div>

                                            </div>
                                        </div>

                                        <!-- pagination -->




                                    </div>
                                </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
                    <aside class="aa-sidebar">
                        <!-- single sidebar -->
                        <div class="aa-sidebar-widget">

                            <h3>Sort By Category</h3>
                            <select onchange="productSearch('1'); clearRadioFilters();" id="category" class="form-control">
                                <?php
                                $rs = Database::search("SELECT * FROM `category` ");
                                $n = $rs->num_rows;


                                for ($i = 0; $i < $n; $i++) {
                                    $cat = $rs->fetch_assoc();

                                ?>


                                    <option onclick="productSearch('1'); " value="<?php echo $cat["id"]; ?>"><?php echo $cat["name"] ?></option>

                                <?php


                                }
                                ?>
                            </select>


                        </div>



                        <!-- single sidebar -->
                        <div class="aa-sidebar-widget">

                            <h3>Sort By Color</h3>
                            <select onchange="productSearch('1'); clearRadioFilters();" id="color" class="form-control">
                                <option value="0">Select Color</option>
                                <?php
                                $colorrs = Database::search("SELECT * FROM `color` ");
                                $cr = $colorrs->num_rows;


                                for ($i = 0; $i < $cr; $i++) {
                                    $cd = $colorrs->fetch_assoc();

                                ?>


                                    <option onclick="productSearch('1');" value="<?php echo $cd["id"]; ?>"><?php echo $cd["name"] ?></option>

                                <?php


                                }
                                ?>
                            </select>


                        </div>


                        <!-- single sidebar -->
                        <div class="aa-sidebar-widget">
                            <h3>Sort By Active Time</h3>
                            <div class="tag-cloud">

                                <div class="form-check">
                                    <input onchange="productSearch('1'); clearOther();" class="form-check-input" type="radio" name="gridRadios" id="n" value="option1">
                                    <label class="form-check-label" for="n">
                                        Newest on Top
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input onchange="productSearch('1'); clearOther();" class="form-check-input" type="radio" name="gridRadios" id="o" value="option1">
                                    <label class="form-check-label" for="o">
                                        Oldest on Top
                                    </label>
                                </div>

                            </div>
                        </div>


                        <div class="aa-sidebar-widget">
                            <h3>Sort By Quantity</h3>
                            <div class="tag-cloud">

                                <div class="form-check">
                                    <input onchange="productSearch('1'); clearOther();" class="form-check-input" type="radio" name="gridRadios" id="l" value="option1">
                                    <label class="form-check-label" for="l">
                                        Low To High
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input onchange="productSearch('1'); clearOther();" class="form-check-input" type="radio" name="gridRadios" id="h" value="option1">
                                    <label class="form-check-label" for="h">
                                        High To Low
                                    </label>
                                </div>

                            </div>
                        </div>




                        <div class="aa-sidebar-widget">
                            <h3>Sort By Condition</h3>
                            <div class="tag-cloud">

                                <div class="form-check">
                                    <input onchange="productSearch('1'); clearOther();" class="form-check-input" type="radio" name="gridRadios" id="b" value="option1">
                                    <label class="form-check-label" for="b">
                                        Brand New Items
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input onchange="productSearch('1'); clearOther();" class="form-check-input" type="radio" name="gridRadios" id="u" value="option1">
                                    <label class="form-check-label" for="u">
                                        Used Items
                                    </label>
                                </div>

                            </div>
                        </div>


                        <div class="aa-sidebar-widget">
                            <h3>Sort By Price</h3>
                            <div class="tag-cloud">

                                <div class="form-check">
                                    <input onchange="productSearch('1'); clearOther();" class="form-check-input" type="radio" name="gridRadios" id="pl" value="option1">
                                    <label class="form-check-label" for="pl">
                                        Low To High
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input onchange="productSearch('1'); clearOther();" class="form-check-input" type="radio" name="gridRadios" id="ph" value="option1">
                                    <label class="form-check-label" for="ph">
                                        High To Low
                                    </label>
                                </div>

                            </div>
                        </div>

                        <div class="aa-sidebar-widget">
                            <h3>Sort By Price Range</h3>
                            <!-- price range -->
                            <div class="filter">
                                <label class="filter__label">
                                    <input disabled onchange="productSearch('1');" type="number" class="filter__input" id="from1">
                                </label>

                                <label class="filter__label">
                                    <input disabled onchange="productSearch('1');" type="number" class="filter__input" id="to1">
                                </label>

                                <div name="gridRadios" onclick="productSearch('1'); clearFilters();" id="sliderPrice" class="filter__slider-price" data-min="0" data-max="300000" data-step="5"></div>
                            </div>
                        </div>

                        <!-- <button onclick="productSearch('1');" class="aa-filter-btn" type="submit">Filter</button> -->

                        <button style="margin-left: auto; margin-right: auto; display: block; background-color: #0091FF;" onclick="goToProduct();" class="btn btn-primary" type="submit">Clear All</button>
                        <br /> <br />
                        <div class="aa-sidebar-widget">
                            <h3>Newest Items</h3>
                            <div class="aa-recently-views">
                                <ul>

                                    <?php

                                    $Newest_items = Database::search("SELECT * FROM `product` ORDER BY `datetime_added` DESC LIMIT 3 ");
                                    $nr = $Newest_items->num_rows;

                                    for ($x = 0; $x < $nr; $x++) {
                                        $nd = $Newest_items->fetch_assoc();

                                    ?>
                                        <li>

                                            <?php
                                            $img_rs = Database::search("SELECT * FROM `images` WHERE `product_id` = '" . $nd["id"] . "' AND `code` LIKE '%img1%' LIMIT 3 ");
                                            $imgd = $img_rs->fetch_assoc();
                                            ?>

                                            <a href="#" class="aa-cartbox-img"><img alt="img" src="<?php echo $imgd["code"] ?>"></a>
                                            <div class="aa-cartbox-info">
                                                <h4 style="font-weight: bolder;"><a href="#"><?php echo $nd["title"]; ?></a></h4>
                                                <p>Listed on: <?php echo $nd["datetime_added"]; ?></p>
                                                <p><?php echo $nd["qty"]; ?> x <?php echo $nd["price"]; ?></p>
                                            </div>
                                        </li>
                                    <?php

                                    }

                                    ?>

                                </ul>
                            </div>
                        </div>

                    </aside>
                </div>

            </div>
        </div>
    </section>
    <!-- / product category -->



    <!-- tankyou section -->
    <?php
    require "other/thankyou.php";
    ?>
    <!-- tankyou section -->

    <?php
    require "footer.php";
    ?>


    <!-- Login Modal -->
    <?php
    require "loginmodel.php";
    ?>





    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.js"></script>
    <!-- SmartMenus jQuery plugin -->
    <script type="text/javascript" src="js/jquery.smartmenus.js"></script>
    <!-- SmartMenus jQuery Bootstrap Addon -->
    <script type="text/javascript" src="js/jquery.smartmenus.bootstrap.js"></script>
    <!-- To Slider JS -->
    <script src="js/sequence.js"></script>
    <script src="js/sequence-theme.modern-slide-in.js"></script>
    <!-- Product view slider -->
    <script type="text/javascript" src="js/jquery.simpleGallery.js"></script>
    <script type="text/javascript" src="js/jquery.simpleLens.js"></script>
    <!-- slick slider -->
    <script type="text/javascript" src="js/slick.js"></script>
    <!-- Price picker slider -->
    <!-- <script type="text/javascript" src="js/nouislider.js"></script> -->
    <!-- Custom js -->
    <script src="js/custom.js"></script>
    <script src="js/all.js"></script>
    <!-- Alerts -->
    <script src="other/snackbar.min.js"></script>
    <!-- Price slider -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.0/nouislider.js"></script>
    <script src="js/pricing.js"></script>
    <script src="other/bootstrap.bundle.js"></script>
</body>

</html>