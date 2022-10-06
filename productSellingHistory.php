<?php

session_start();

require "connection.php";



if (isset($_GET["f"])) {
    $from = $_GET["f"];
}
if (isset($_GET["t"])) {
    $to = $_GET["t"];
}



?>

<!DOCTYPE html>

<html>

<head>
    <title>eShop | Selling history</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="other/icon.png" rel="icon">
    <link rel="stylesheet" href="other/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="other/invoice.css" />
    <link rel="stylesheet" href="css/style.css" />
    <!-- Font awesome -->
    <link href="css/font-awesome.css" rel="stylesheet">

</head>

<body style="background-image: url('resources/profilebackground.jpg');  background-attachment: fixed; background-repeat: no-repeat; background-size: cover;">

    <div class="container-fluid">
        <div class="row">

            <div class="col-12  text-center rounded mt-5">
                <h1 class="form-label fs-2 fw-bold text-dark">Products Selling History</h1>
            </div>

            <div class="col-12 rounded">
                <div class="row">
                    <div class="col-4 col-lg-6">
                        <button onclick="window.history.go(-1); return false;" class="col-12 offset-1 col-md-1 offset-lg-0  ms-lg-3 btn btn-primary">Back</button>
                        <a href="adminPannel.php" class="col-12 offset-1 col-md-2 mt-2 mt-lg-0 offset-lg-0 ms-lg-3 btn btn-secondary">Dashboard</a>
                        
                    </div>
                    <div class="col-6">
                        <div class="col-12 offset-0 offset-lg-7 offset-0 col-lg-12 mb-3">
                            <div class="row">
                                <div class="col-10 col-lg-3">
                                    <input placeholder="Search product.." style="border-color: blue; border-width: 2px;" type="text" class="form-control border-secondary" id="searchtxt" />
                                </div>

                                <div class="col-2 d-grid">
                                    <button class="btn btn-primary"  onclick="searchProductHistory('1');">Search</button>
                                </div>
                                <!-- <div class="col-4 mt-2 mt-lg-0 col-lg-2 offset-lg-0 offset-10 d-grid">
                                    <a class="btn text-primary fw-bold fs-5" href="productSellingHistory.php"><i class="fa fa-refresh" aria-hidden="true"></i></a>
                                </div> -->
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <div class="col-12 mt-3 mb-2 text-center">
                <div class="row">
                    <div class="border-end col-2 bg-dark pt-2 pb-2 text-end">
                        <span class="fs-4 fw-bold text-white">Order ID</span>
                    </div>
                    <div class="border-end col-6 col-lg-2 col-lg-3 bg-dark pt-2 pb-2">
                        <span class="fs-4 text-white fw-bold">Product</span>
                    </div>
                    <div class="border-end col-4 col-lg-3 bg-dark pt-2 pb-2">
                        <span class="fs-4 fw-bold text-white">Buyer</span>
                    </div>
                    <div class="border-end col-6 col-lg-2 bg-dark pt-2 pb-2 d-none d-lg-block">
                        <span class="fs-4 text-white fw-bold">Price</span>
                    </div>
                    <div class="col-2 bg-dark pt-2 pb-2 d-none d-lg-block">
                        <span class="fs-4 fw-bold text-white">Quantity</span>
                    </div>
                </div>
            </div>

            <div id="data">

                <?php

                if (!empty($from) && empty($to)) {
                    echo "<h5 class = 'mt-5 mb-5 fw-bold text-center' style = 'color:brown;'> Please Select Date Range To Display Selling History</h5>";

                    $fromrs = Database::search("SELECT * FROM `invoice`");
                    $fn = $fromrs->num_rows;

                    

                    for ($x = 0; $x < $fn; $x++) {
                        $fr = $fromrs->fetch_assoc();
                        $fromdate = $fr["date"];
                        $product_id = $fr["product_id"];

                        $splitdate = explode(" ", $fromdate);
                        $date = $splitdate[0];

                        if ($from == $date) {

                ?>

                            <div class="col-12 mb-2">
                                <div class="row">
                                    <div class="col-2 bg-primary pt-2 pb-2 text-end">
                                        <span class="fs-5 fw-bold text-white"><?php echo $fr["order_id"]; ?></span>
                                    </div>

                                    <?php
                                    $product_details = Database::search("SELECT * FROM `product` WHERE `id` = '" . $product_id . "'");
                                    $pd = $product_details->fetch_assoc();
                                    ?>

                                    <div class="col-6 col-lg-2 col-lg-3 bg-light pt-2 pb-2 text-center">
                                        <span class="fs-5 fw-bold"><?php echo $pd["title"]; ?></span>
                                    </div>
                                    <?php
                                    $user_r = Database::search("SELECT * FROM `user` WHERE `email` = '" . $fr["user_email"] . "' ");
                                    $userd = $user_r->fetch_assoc();
                                    ?>
                                    <div class="col-4 col-lg-3 bg-primary pt-2 pb-2">
                                        <span class="fs-5 fw-bold text-white"><?php echo $userd["fname"] . " " . $userd["lname"]; ?></span>
                                    </div>
                                    <div class="col-6 col-lg-2 bg-light pt-2 pb-2 d-none d-lg-block">
                                        <span class="fs-5 fw-bold">Rs. <?php echo $pd["price"]; ?> .00</span>
                                    </div>
                                    <div class="col-2 bg-primary pt-2 pb-2 d-none d-lg-block">
                                        <span class="fs-5 fw-bold text-white"><?php echo $fr["qty"]; ?></span>
                                    </div>
                                </div>
                            </div>

                        <?php
                        }
                    }
                } else if (!empty($from) && !empty($to)) {

                    $betweenrs = Database::search("SELECT * FROM `invoice`");
                    $bn = $betweenrs->num_rows;

                    

                    for ($x = 0; $x < $bn; $x++) {
                        $br = $betweenrs->fetch_assoc();
                        $betweendate = $br["date"];
                        $product_id = $br["product_id"];

                        $splitdate = explode(" ", $betweendate);
                        $date = $splitdate[0];

                        if ($from <= $date && $to >= $date) {

                        ?>

                            <div class="col-12 mb-2">
                                <div class="row">
                                    <div class="col-2 bg-secondary pt-2 pb-2 text-end">
                                        <span class="fs-5 fw-bold text-white"><?php echo $br["order_id"]; ?></span>
                                    </div>
                                    <?php
                                    $product_details = Database::search("SELECT * FROM `product` WHERE `id` = '" . $product_id . "'");
                                    $pd = $product_details->fetch_assoc();
                                    ?>
                                    <div class="col-6 col-lg-2 col-lg-3 bg-danger pt-2 pb-2 text-center">
                                        <span class="fs-5 fw-bold text-white"><?php echo $pd["title"]; ?></span>
                                    </div>
                                    <?php
                                    $user_r = Database::search("SELECT * FROM `user` WHERE `email` = '" . $br["user_email"] . "' ");
                                    $userd = $user_r->fetch_assoc();
                                    ?>
                                    <div class="col-4 col-lg-3 bg-secondary pt-2 pb-2">
                                        <span class="fs-5 fw-bold text-white"><?php echo $userd["fname"] . " " . $userd["lname"]; ?></span>
                                    </div>
                                    <div class="col-6  col-lg-2 bg-danger pt-2 pb-2 d-none d-lg-block">
                                        <span class="fs-5 fw-bold text-white"><?php echo $pd["price"]; ?></span>
                                    </div>
                                    <div class="col-2 bg-secondary pt-2 pb-2 d-none d-lg-block">
                                        <span class="fs-5 fw-bold text-white"><?php echo $br["qty"]; ?></span>
                                    </div>
                                </div>
                            </div>

                        <?php

                        }
                    }
                } else if (empty($from) && empty($to)) {
                    echo "<h5 class = 'mt-5 mb-5 fw-bold text-center' style = 'color:brown;'> Please Select Date Range To Display Selling History</h5>";
                    
                    $todayrs = Database::search("SELECT * FROM `invoice`");
                    $tn = $todayrs->num_rows;

                    

                    for ($z = 0; $z < $tn; $z++) {

                        $tr = $todayrs->fetch_assoc();
                        $nodate = $tr["date"];
                        $product_id = $tr["product_id"];

                        $splitdate = explode(" ", $nodate);
                        $date = $splitdate[0];

                        $today = date("Y-m-d");

                        if ($today == $date) {

                        ?>

                            <div class="col-12 mb-2">
                                <div class="row">
                                    <div class="col-2 bg-primary pt-2 pb-2 text-end">
                                        <span class="fs-5 fw-bold text-white"><?php echo $tr["order_id"]; ?></span>
                                    </div>
                                    <?php
                                    $product_details = Database::search("SELECT * FROM `product` WHERE `id` = '" . $product_id . "'");
                                    $pd = $product_details->fetch_assoc();
                                    ?>
                                    <div class="col-6 col-lg-2 col-lg-3 bg-light pt-2 pb-2 text-center">
                                        <span class="fs-5 fw-bold"><?php echo $pd["title"]; ?></span>
                                    </div>
                                    <?php
                                    $user_r = Database::search("SELECT * FROM `user` WHERE `email` = '" . $tr["user_email"] . "' ");
                                    $userd = $user_r->fetch_assoc();
                                    ?>
                                    <div class="col-4 col-lg-3 bg-primary pt-2 pb-2">
                                        <span class="fs-5 fw-bold text-white"><?php echo $userd["fname"] . " " . $userd["lname"]; ?></span>
                                    </div>
                                    <div class="col-6 col-lg-2 bg-light pt-2 pb-2 d-none d-lg-block">
                                        <span class="fs-5 fw-bold">Rs. <?php echo $pd["price"]; ?> .00</span>
                                    </div>
                                    <div class="col-2 bg-primary pt-2 pb-2 d-none d-lg-block">
                                        <span class="fs-5 fw-bold text-white"><?php echo $tr["qty"]; ?></span>
                                    </div>
                                </div>
                            </div>

                <?php

                        }
                    }
                } else {
                    echo "<h5 class = 'mt-4 mb-4 fw-bold text-center' style = 'color:brown;'> You haven't sell anything this day..  </h5>";
                }

                ?>


                


                <div class="col-12 fs-6 fw-bold mt-3 mb-3">
                    <div class="pagination d-flex justify-content-center">
                        <a href="#">&laquo;</a>
                        <a href="#" class="active bg-primary">1</a>
                        <a href="#">&raquo;</a>
                    </div>
                </div>
            </div>

            <!-- Search Product -->
            <div class="col-12 mb-2">
                <div class="row" id="product_div">



                </div>
            </div>
            <!-- Search Product -->



        </div>
    </div>

    <script src="other/script.js"></script>
</body>

</html>