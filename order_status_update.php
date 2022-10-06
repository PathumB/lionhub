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

                                    <div class="col-12">
                                        <div class="app-page-title">
                                            <div class="page-title-wrapper">
                                                <div class="page-title-heading">
                                                    <div class="page-title-icon">
                                                        <i class="fa fa-download icon-gradient bg-malibu-beach">
                                                        </i>
                                                    </div>
                                                    <div>Manage Orders
                                                        <div class="page-title-subheading">Delivery system can be managed by here.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="page-title-actions">
                                                    <button onclick="history_back1();" type="button" data-toggle="tooltip" title="" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark" data-original-title="Back">
                                                        <i style="color: white;" class="fa fa-fw" aria-hidden="true" title="Copy to use angle-double-left"></i>
                                                    </button>
                                                    <a href="adminPannel.php"><button type="button" data-toggle="tooltip" title="" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark" data-original-title="Dashboard">
                                                            <i class="fa fa-ship icon-gradient bg-love-kiss"> </i>
                                                        </button></a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                    $track_rs = Database::search("SELECT * FROM `ordertrack`");
                                    $trackrows = $track_rs->num_rows;

                                    for ($x = 0; $x < $trackrows; $x++) {
                                        $track_data = $track_rs->fetch_assoc();

                                    ?>
                                        <div class="col-md-6 col-xl-6">
                                            <div class="card mb-3 widget-content">
                                                <div class="widget-content-outer">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left">
                                                            <div class="widget-heading">Tracking id - <?php echo $track_data["trackid"]; ?></div>
                                                            <div class="widget-subheading">Order id - <?php echo $track_data["order_id"]; ?></div>
                                                            <div class="widget-subheading">Customer Email - <?php echo $track_data["user_email"]; ?></div>
                                                        </div>

                                                        <div class="widget-content-right">
                                                            <select onchange="order_status_change();" class="form-control">

                                                                <?php
                                                                $order_status_r = Database::search("SELECT * FROM `order_status`");
                                                                $status_rows = $order_status_r->num_rows;

                                                                for ($y = 0; $y < $status_rows; $y++) {
                                                                    $sd = $order_status_r->fetch_assoc();
                                                                ?>
                                                                    <option value="<?php echo $sd["id"]; ?>"><?php echo $sd["status"]; ?></option>
                                                                <?php
                                                                }
                                                                ?>


                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php

                                    }
                                    ?>





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