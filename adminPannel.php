<?php
session_start();
require "connection.php";

$admin_email = Database::search("SELECT * FROM `admin`");
$admin_email_data = $admin_email->fetch_assoc();
$admin_email_get = $admin_email_data["email"];

if (isset($_SESSION["u"])) {
    if (isset($_SESSION["a"])) {
        if (($_SESSION["u"]["email"]) == $admin_email_get) {



            $user = $_SESSION["u"];
            $fname = $_SESSION["u"]["fname"];
            $lname = $_SESSION["u"]["lname"];

            if (isset($_GET["page"])) {
                $pageno = $_GET["page"];
            } else {
                $pageno = 1;
            }

?>
            <!doctype html>
            <html lang="en">

            <head></head>
            <link href="other/icon.png" rel="icon">
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta http-equiv="Content-Language" content="en">
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <title>Admin Dashboard</title>
            <link href="css/font-awesome.css" rel="stylesheet">
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
            <meta name="description" content="This is an example dashboard created using build-in elements and components.">
            <meta name="msapplication-tap-highlight" content="no">
            <link href="https://demo.dashboardpack.com/architectui-html-free/main.css" rel="stylesheet">
            <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
            </head>

            <body>
                <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
                    <div class="app-header header-shadow">
                        <div class="app-header__logo">
                            <!-- <div class="logo-src"></div> -->
                            <img style="width: 50px;" src="other/icon.png" />
                            <div class="header__pane ml-auto">
                                <div>
                                    <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                        <span class="hamburger-box">
                                            <span class="hamburger-inner"></span>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="app-header__mobile-menu">
                            <div>
                                <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                        </div>

                        <div class="app-header__content">
                            <div class="app-header-left">

                                <ul class="header-menu nav">
                                    <li class="nav-item">
                                        <a href="javascript:void(0);" class="nav-link">
                                            <!-- <i class="nav-link-icon fa fa-database"> </i> -->
                                            Name: <?php echo $fname . " " . $lname ?>
                                        </a>
                                    </li>
                                    <li class="btn-group nav-item">
                                        <a href="javascript:void(0);" class="nav-link">
                                            <!-- <i class="nav-link-icon fa fa-edit"></i> -->
                                            Email: <?php echo $user["email"] ?>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                            <div class="app-header-right">
                                <div class="header-btn-lg pr-0">
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">

                                            </div>
                                            <div class="widget-content-left  ml-3 header-user-info">
                                                <div class="widget-heading">
                                                    <span>Admin Dashboard</span>&nbsp;&nbsp;&nbsp;&nbsp;

                                                    <?php
                                                    $profile_img = Database::search("SELECT * FROM `profile_img` WHERE `user_email` = '" . $user["email"] . "' ");
                                                    $pr = $profile_img->num_rows;
                                                    if ($pr == 0) {
                                                    ?>
                                                        <img src="resources/feedback_user.jpg" />
                                                    <?php
                                                    } else {
                                                        $pd = $profile_img->fetch_assoc();
                                                    ?>
                                                        <img style="width: 40px; height: 40px; border-style: solid; border-radius: 50%; border-color: white; box-shadow: 2px 2px 8px 2px black;" src="<?php echo $pd["code"]; ?>" />
                                                    <?php
                                                    }
                                                    ?>

                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="app-main">
                        <div class="app-sidebar sidebar-shadow">
                            <div class="app-header__logo">
                                <div class="logo-src"></div>
                                <div class="header__pane ml-auto">
                                    <div>
                                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                            <span class="hamburger-box">
                                                <span class="hamburger-inner"></span>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="app-header__mobile-menu">
                                <div>
                                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                        <span class="hamburger-box">
                                            <span class="hamburger-inner"></span>
                                        </span>
                                    </button>
                                </div>
                            </div>
                            <div class="app-header__menu">
                                <span>
                                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                        <span class="btn-icon-wrapper">
                                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                                        </span>
                                    </button>
                                </span>
                            </div>
                            <div style="overflow-y: scroll;" class="scrollbar-sidebar">
                                <div class="app-sidebar__inner">
                                    <ul class="vertical-nav-menu">
                                        <li class="app-sidebar__heading">Dashboard</li>
                                        <li>
                                            <a href="adminPannel.php" class="mm-active ">
                                                <i class="metismenu-icon fa fa-user-secret"></i>
                                                My Dashboard
                                            </a>
                                            <a href="manageUsers.php">
                                                <i class="metismenu-icon fa fa-user"></i>
                                                Manage Users
                                            </a>
                                            <a href="manageProduct.php">
                                                <i class="metismenu-icon fa fa-cubes"></i>
                                                Manage Products
                                            </a>
                                            <a href="message.php">
                                                <i style="font-weight: bolder;" class="metismenu-icon pe-7s-mail"> </i>
                                                My Inbox
                                            </a>
                                            <a href="banner_update.php">
                                                <i style="font-weight: bolder;" class="metismenu-icon pe-7s-tools"> </i>
                                                Manage Banners
                                            </a>

                                        </li>
                                        <li class="app-sidebar__heading">Selling History</li>
                                        <li>
                                            <label style="font-weight: bold;">From Date</label>
                                            <input id="fromDate" style="border: none; width: 100%; outline: none;" type="date" /> <br /><br />
                                            <label style="font-weight: bold;">To Date</label>
                                            <input id="toDate" style="border: none; width: 100%; outline: none;" type="date" /> <br /><br />

                                            <a onclick="dailySellings();" id="historylink" style="text-align: start; border: none; width: 60%; height: 40px; cursor: pointer; background-color: #005FFF; border-radius: 5px; color: white; margin-left: auto; margin-right: auto; display: block;">Search</a>

                                        </li>
                                        <li class="app-sidebar__heading">Manage Web Pages</li>
                                        <li>
                                            <a href="index.php">
                                                <i class="metismenu-icon fa fa-home"></i>
                                                Home Page
                                            </a>
                                            <a href="wishlist.php">
                                                <i class="metismenu-icon fa fa-heartbeat"></i>
                                                Wishlist Page
                                            </a>
                                            <a href="cart.php">
                                                <i class="metismenu-icon fa fa-shopping-cart"></i>
                                                Cart Page
                                            </a>
                                            <a href="checkout.php">
                                                <i class="metismenu-icon fa fa-credit-card"></i>
                                                Checkout Page
                                            </a>
                                            <a href="product.php">
                                                <i class="metismenu-icon fa fa-search-plus"></i>
                                                Product Search Page
                                            </a>
                                            <a href="account.php">
                                                <i class="metismenu-icon fa fa-user-circle"></i>
                                                User Profile Page
                                            </a>
                                            <a href="purchasehistory.php">
                                                <i class="metismenu-icon fa fa-history"></i>
                                                Purchase History Page
                                            </a>
                                            <a href="contact.php">
                                                <i class="metismenu-icon fa fa-question"></i>
                                                Help & Contact Page
                                            </a>

                                        </li>



                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="app-main__outer">
                            <div class="app-main__inner">

                                <div class="row">
                                    <div class="col-md-6 col-xl-4">
                                        <div class="card mb-3 widget-content bg-midnight-bloom">
                                            <div class="widget-content-wrapper text-white">
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">Daily Earnings</div>

                                                    <?php

                                                    $today = date("Y-m-d");
                                                    $thisMonth = date("m");
                                                    $thisyear = date("Y");

                                                    $a = "0";
                                                    $b = "0";
                                                    $c = "0";
                                                    $e = "0";
                                                    $f = "0";

                                                    $invoice_rs = Database::search("SELECT * FROM `invoice` ");
                                                    $in = $invoice_rs->num_rows;

                                                    for ($x = 0; $x < $in; $x++) {
                                                        $ir = $invoice_rs->fetch_assoc();

                                                        $f = $f + $ir["qty"];

                                                        $d = $ir["date"];
                                                        $splitdate = explode(" ", $d); // character eka , data eka
                                                        $pdate = $splitdate[0];


                                                        if ($pdate == $today) {
                                                            $a = $a + $ir["total"];
                                                            $c = $c + $ir["qty"];
                                                        }
                                                        $splitMonth = explode("-", $pdate);
                                                        $pyear = $splitMonth[0];
                                                        $pmonth = $splitMonth[1];

                                                        if ($pyear == $thisyear) {
                                                            if ($pmonth == $thisMonth) {
                                                                $b = $b + $ir["total"];
                                                                $e = $e + $ir["qty"];
                                                            }
                                                        }
                                                    }

                                                    ?>

                                                    <div class="widget-subheading">Realtime Updated Results</div>
                                                </div>
                                                <div class="widget-content-right">
                                                    <div class="widget-numbers text-white"><span>LKR <?php echo $a; ?> </span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card mb-3 widget-content bg-secondary">
                                            <div class="widget-content-wrapper text-white">
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">Monthly Earnings</div>
                                                    <div class="widget-subheading">Realtime Updated Results</div>
                                                </div>
                                                <div class="widget-content-right">
                                                    <div class="widget-numbers text-white"><span>LKR <?php echo $b; ?></span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xl-4">
                                        <div class="card mb-3 widget-content bg-arielle-smile">
                                            <div class="widget-content-wrapper text-white">
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">Today Sellings</div>
                                                    <div class="widget-subheading">Realtime Updated Results</div>
                                                </div>
                                                <div class="widget-content-right">
                                                    <div class="widget-numbers text-white"><span><?php echo $c; ?> Items</span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card mb-3 widget-content bg-night-fade">
                                            <div class="widget-content-wrapper text-white">
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">Monthly Sellings</div>
                                                    <div class="widget-subheading">Realtime Updated Results</div>
                                                </div>
                                                <div class="widget-content-right">
                                                    <div class="widget-numbers text-white"><span><?php echo $e; ?> Items</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xl-4">
                                        <div class="card mb-3 widget-content bg-grow-early">
                                            <div class="widget-content-wrapper text-white">
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">Total Sellings</div>
                                                    <div class="widget-subheading">Realtime Updated Results</div>
                                                </div>
                                                <div class="widget-content-right">
                                                    <div class="widget-numbers text-white"><span><?php echo $f; ?> Items</span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card mb-3 widget-content bg-danger">
                                            <div class="widget-content-wrapper text-white">
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">Total Engagements</div>

                                                    <?php
                                                    $users_rs = Database::search("SELECT * FROM `user`");
                                                    $number_of_users = $users_rs->num_rows;
                                                    ?>

                                                    <div class="widget-subheading">Realtime Updated Results</div>
                                                </div>
                                                <div class="widget-content-right">
                                                    <div class="widget-numbers text-white"><span><?php echo $number_of_users; ?> Members</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xl-12">
                                        <div class="card mb-3 widget-content bg-premium-dark">
                                            <div class="widget-content-wrapper text-white">
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">Admin</div>

                                                    <?php
                                                    $startdate = new DateTime("2021-10-01 00:00:00");
                                                    $tdate = new DateTime();
                                                    $tz = new DateTimeZone("Asia/Colombo");
                                                    $tdate->setTimezone($tz);
                                                    $endDate = new DateTime($tdate->format("Y-m-d H:i:s"));

                                                    $difference = $endDate->diff($startdate);

                                                    ?>

                                                    <script>
                                                        $(document).ready(function() {
                                                            setInterval(function() {
                                                                $("#date").load(window.location.href + " #date");
                                                            }, 500);
                                                        });
                                                    </script>

                                                    <div class="widget-subheading">Total Active Time</div>
                                                </div>
                                                <div class="widget-content-right">
                                                    <div style="font-size: large;" class="widget-numbers text-white"><span id="date">

                                                            <?php

                                                            echo $difference->format('%Y') . " : Years  &nbsp;&nbsp;" . $difference->format('%m') . " : Months &nbsp;&nbsp;" .
                                                                $difference->format('%d') . " : Days &nbsp;&nbsp;" . $difference->format('%H') . " : Hours &nbsp;&nbsp;" .
                                                                $difference->format('%i') . " : Minutes &nbsp;&nbsp;" . $difference->format('%s') . " : Seconds &nbsp;&nbsp;";

                                                            ?>

                                                        </span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-md-12 col-lg-6">
                                        <div class="mb-3 card">


                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-xl-4">
                                        <div class="card mb-3 widget-content">
                                            <div class="widget-content-outer">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left">
                                                        <div class="widget-heading">Total Orders</div>
                                                        <div class="widget-subheading">Customers are satisfied with us.</div>
                                                    </div>
                                                    <div class="widget-content-right">

                                                        <?php
                                                        $to = Database::search("SELECT * FROM `invoice`");
                                                        $tr = $to->num_rows;
                                                        ?>

                                                        <div class="widget-numbers text-success"><?php echo $tr; ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xl-4">
                                        <div class="card mb-3 widget-content">
                                            <div class="widget-content-outer">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left">
                                                        <div class="widget-heading">Total Feedbacks</div>
                                                        <div class="widget-subheading">All feedbacks given by customers</div>
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <?php
                                                        $to1 = Database::search("SELECT * FROM `feedback`");
                                                        $tr1 = $to1->num_rows;
                                                        ?>
                                                        <div class="widget-numbers text-warning">0<?php echo $tr1; ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-xl-4">
                                        <div class="card mb-3 widget-content">
                                            <div class="widget-content-outer">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left">
                                                        <div class="widget-heading">Total Complaints</div>
                                                        <div class="widget-subheading">People who send direct messages</div>
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <?php
                                                        $to2 = Database::search("SELECT * FROM `contact`");
                                                        $tr2 = $to2->num_rows;
                                                        ?>
                                                        <div class="widget-numbers text-danger">0<?php echo $tr2; ?> </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row ">
                                    <div class="col-md-12 ">
                                        <div class="main-card mb-3 card ">
                                            <div class="card-header">Active Users</div>
                                            <div class="table-responsive">
                                                <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                                    <thead>

                                                        <tr>
                                                            <th class="text-center">#</th>
                                                            <th>Name</th>
                                                            <th class="text-center">Mobile</th>
                                                            <th class="text-center">Status</th>
                                                            <th class="text-center">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <?php
                                                        $activeu = Database::search("SELECT * FROM `user` WHERE `status_id` = '1' ");
                                                        $activeur = $activeu->num_rows;

                                                        $results_per_page = 5;
                                                        $number_of_pages = ceil($activeur / $results_per_page);
                                                        $page_first_result = ((int)$pageno - 1) * $results_per_page;

                                                        $activeu = Database::search("SELECT * FROM `user` WHERE `status_id` = '1' LIMIT " . $results_per_page . " OFFSET " . $page_first_result . " ");
                                                        $activeur = $activeu->num_rows;


                                                        for ($x = 0; $x < $activeur; $x++) {
                                                            $activefetch = $activeu->fetch_assoc();
                                                        ?>

                                                            <tr>
                                                                <td class="text-center text-muted">#</td>
                                                                <td>
                                                                    <div class="widget-content p-0">
                                                                        <div class="widget-content-wrapper">
                                                                            <div class="widget-content-left mr-3">
                                                                                <div class="widget-content-left">

                                                                                    <?php
                                                                                    $pimg = Database::search("SELECT * FROM `profile_img` WHERE `user_email` = '" . $activefetch["email"] . "' ");
                                                                                    $pimgr = $pimg->num_rows;

                                                                                    if ($pimgr == 0) {
                                                                                    ?>
                                                                                        <img width="40" class="rounded-circle" src="resources/feedback_user.jpg">
                                                                                    <?php
                                                                                    } else {
                                                                                        $pimgf = $pimg->fetch_assoc();
                                                                                    ?>
                                                                                        <img width="40" class="rounded-circle" src="<?php echo $pimgf["code"] ?>" alt="">
                                                                                    <?php
                                                                                    }

                                                                                    ?>

                                                                                </div>
                                                                            </div>
                                                                            <div class="widget-content-left flex2">
                                                                                <div class="widget-heading"><?php echo $activefetch["fname"] . " " . $activefetch["lname"] ?></div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>

                                                                <?php
                                                                if (empty($activefetch["mobile"])) {
                                                                ?>
                                                                    <td class="text-center text-black-50">Profile not updated yet</td>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <td class="text-center"><?php echo $activefetch["mobile"] ?></td>
                                                                <?php
                                                                }
                                                                ?>


                                                                <td class="text-center">
                                                                    <div class="badge badge-danger">Active</div>
                                                                </td>
                                                                <td class="text-center">
                                                                    <a href="manageUsers.php" type="button" id="PopoverCustomT-3" class="btn btn-primary btn-sm text-white">Details</a>
                                                                </td>
                                                            </tr>

                                                        <?php
                                                        }
                                                        ?>



                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="d-block justify-content-justify-content-end d-flex text-center card-footer">
                                                <!-- pagination -->

                                                <div style="margin-left: auto; margin-right: auto; display: block;" id="sp" class="mb-3 text-center justify-content-center">

                                                    <div class="aa-product-catg-pagination">
                                                        <div class="pagination">
                                                            <a style="margin-left: 5px;" class="btn btn-light" href="
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
                                                                    <a style="margin-left: 5px;" href="<?php echo "?page=" . ($page); ?>" class="ms-1 active btn btn-primary bg-primary"><?php echo $page; ?></a>

                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <a style="margin-left: 5px;" href="<?php echo "?page=" . ($page); ?>" class="ms-1 btn btn-light"><?php echo $page; ?></a>

                                                            <?php
                                                                }
                                                            }

                                                            ?>
                                                            <a style="margin-left: 5px;" class="btn btn-light" href="
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
                                                <!-- <button class="btn-wide btn btn-success">Pagination</button> -->
                                            </div>
                                        </div>



                                        <div class="main-card mb-3 card">
                                            <div class="card-header">Most Sold Item</div>
                                            <div class="table-responsive">
                                                <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">#</th>
                                                            <th>Product Title</th>
                                                            <th class="text-center">Items Sold</th>
                                                            <th class="text-center">Item Cost</th>
                                                            <th class="text-center">Stock Status</th>
                                                            <th class="text-center">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <?php
                                                        //most sold item
                                                        $item_rs = Database::search("SELECT `user_email`, `product_id` , COUNT(`product_id`) AS `max_product` FROM invoice GROUP BY `product_id` ORDER BY `max_product` DESC LIMIT 1;");
                                                        $item_d = $item_rs->fetch_assoc();
                                                        $max_product = $item_d["max_product"];
                                                        $pr_id = $item_d["product_id"];
                                                        $uemail = $item_d["user_email"];
                                                        $product_rs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $pr_id . "' ");
                                                        $product = $product_rs->fetch_assoc();

                                                        //most sold item img
                                                        $img_rs = Database::search("SELECT * FROM `images` WHERE `code` LIKE '%img1%' AND `product_id` = '" . $pr_id . "' ");
                                                        $img = $img_rs->fetch_assoc();

                                                        ?>

                                                        <tr>
                                                            <td class="text-center text-muted">#</td>
                                                            <td>
                                                                <div class="widget-content p-0">
                                                                    <div class="widget-content-wrapper">
                                                                        <div class="widget-content-left mr-3">
                                                                            <div class="widget-content-left">
                                                                                <img width="40" class="rounded-circle" src="<?php echo $img["code"] ?>" alt="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="widget-content-left flex2">
                                                                            <div class="widget-heading"><?php echo $product["title"]; ?></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-center"><?php echo $max_product; ?> Items</td>
                                                            <td class="text-center">LKR <?php echo $product["price"]; ?> .00</td>
                                                            <td class="text-center">
                                                                <?php
                                                                if ((int)$product["qty"] > 0) {
                                                                ?>
                                                                    <div class="badge badge-success">In Stock</div>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <div class="badge badge-warning">Out Of Stock</div>
                                                                <?php
                                                                }
                                                                ?>

                                                            </td>
                                                            <td class="text-center">
                                                                <a href="manageProduct.php" type="button" id="PopoverCustomT-3" class="btn btn-primary btn-sm text-white">Details</a>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="d-block text-center card-footer">
                                                <!-- <button class="btn-wide btn btn-success">Pagination</button> -->
                                            </div>
                                        </div>




                                        <div class="main-card mb-3 card">
                                            <div class="card-header">Most Famouse Seller</div>
                                            <div class="table-responsive">
                                                <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">#</th>
                                                            <th>Seller Name</th>
                                                            <th class="text-center">Mobile Number</th>
                                                            <th class="text-center">Items Sold</th>
                                                            <th class="text-center">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        //user info
                                                        $user_rs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $uemail . "' ");
                                                        $user_data = $user_rs->fetch_assoc();
                                                        //user info
                                                        $ppic = Database::search("SELECT * FROM `profile_img` WHERE `user_email` = '" . $uemail . "' ");
                                                        $ppd = $ppic->fetch_assoc();

                                                        ?>
                                                        <tr>
                                                            <td class="text-center text-muted">#</td>
                                                            <td>
                                                                <div class="widget-content p-0">
                                                                    <div class="widget-content-wrapper">
                                                                        <div class="widget-content-left mr-3">
                                                                            <div class="widget-content-left">
                                                                                <img width="40" class="rounded-circle" src="<?php echo $ppd["code"]; ?>" alt="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="widget-content-left flex2">
                                                                            <div class="widget-heading"><?php echo $user_data["fname"] . " " . $user_data["lname"]; ?></div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="text-center"><?php echo $user_data["mobile"]; ?></td>
                                                            <!-- <td class="text-center">
                                                            <div class="badge badge-danger">Active</div>
                                                        </td> -->
                                                            <td class="text-center"><?php echo $max_product; ?> Items</td>
                                                            <td class="text-center">
                                                                <a href="manageProduct.php" type="button" id="PopoverCustomT-3" class="btn btn-primary text-light btn-sm">Details</a>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="d-block text-center card-footer">
                                                <!-- <button class="btn-wide btn btn-success">Pagination</button> -->
                                            </div>
                                        </div>



                                        <div class="col-12">
                                            <div class="row">

                                                <div class="mb-3 text-center card card-body col-12 col-md-4">
                                                    <h5 class="card-title">Update Website Banners</h5><span>You can update sliders , images , banners in website</span><br />
                                                    <button onclick="banner_update();" class="btn btn-focus"><i class="fa fa-wrench" aria-hidden="true"></i> &nbsp;&nbsp; Need To Update</button>
                                                </div>
                                                <div class="mb-3 text-center card card-body col-12 col-md-4">
                                                    <h5 class="card-title">Manage Seller Messages</h5><span>Messages of sellers can be manage by here</span><br />
                                                    <button onclick="goToMessags();" class="btn btn-alternate"><i class="fa fa-users" aria-hidden="true"></i> &nbsp;&nbsp; Go To Messages</button>
                                                </div>
                                                <div class="mb-3 text-center card card-body col-12 col-md-4">
                                                    <h5 class="card-title">Order Tracking System</h5><span>Manage customer order delivery system</span><br />
                                                    <button onclick="goTomanageOrders();" class="btn btn btn-warning"><i class="fa fa-ambulance" aria-hidden="true"></i> &nbsp;&nbsp; Manage Orders</button>
                                                </div>

                                            </div>
                                        </div>






                                    </div>
                                </div>

                            </div>

                        </div>



                        <!-- <script src="http://maps.google.com/maps/api/js?sensor=true"></script> -->

                    </div>
                </div>

                <script type="text/javascript" src="https://demo.dashboardpack.com/architectui-html-free/assets/scripts/main.js"></script>
                <script src="other/script.js"></script>
                <script src="js/all.js"></script>
            </body>

            </html>

        <?php
        } else {
        ?>
            <script>
                window.location = "adminSignin.php";
            </script>
        <?php
        }
        ?>


    <?php
    } else {
    ?>
        <script>
            window.location = "adminSignin.php";
        </script>
    <?php
    }
} else {
    ?>
    <script>
        window.location = "signinSignUp.php";
    </script>
<?php
}
?>