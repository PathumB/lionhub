<?php
session_start();
require "connection.php";

if (isset($_SESSION["u"])) {
    if (isset($_SESSION["a"])) {

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
        <!-- Alerts -->
        <link rel="stylesheet" href="other/snackbar.min.css">
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
                                        <a href="adminPannel.php">
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
                                        <a href="banner_update.php" class="mm-active ">
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

                            <div class="row ">
                                <div class="col-md-12 ">


                                    <div class="app-page-title">
                                        <div class="page-title-wrapper">
                                            <div class="page-title-heading">
                                                <div class="page-title-icon">
                                                    <i class="fa fa-download icon-gradient bg-malibu-beach">
                                                    </i>
                                                </div>
                                                <div>Customize Banners
                                                    <div class="page-title-subheading">Update banners / sliders / images in website.
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

                                    <!-- -------------------------------------------------------- banner update --------------------------------------------------------  -->

                                    <div class="main-card mb-3 card ">
                                        <div class="card-header">Home Slider </div>
                                        <div class="table-responsive">
                                            <table class="align-middle mb-0 table table-borderless table-striped table-hover">


                                                <thead>

                                                    <tr>
                                                        <th class="text-center">#</th>
                                                        <th>Slider Number</th>
                                                        <th class="text-center">Image Path</th>
                                                        <th class="text-center">Image Size (px)</th>
                                                        <th class="text-center">Uploaded Date</th>
                                                        <th class="text-center">Uploaded Time</th>
                                                        <th style="cursor: pointer; font-size: x-large;" class="text-center"><i style="transform: scale(1,-1);" onclick="update_banner('home_sliders');" class="fa fa-download icon-gradient bg-malibu-beach"> </i></th>
                                                    </tr>
                                                </thead>

                                                <tbody>


                                                    <tr>
                                                        <?php
                                                        $hs1r = Database::search("SELECT * FROM `banner_update` WHERE `banner_name` LIKE '%slider1%' ");
                                                        $hs1d = $hs1r->fetch_assoc();
                                                        ?>
                                                        <td class="text-center text-muted">1</td>
                                                        <td>
                                                            <div class="widget-content p-0">
                                                                <div class="widget-content-wrapper">

                                                                    <div class="widget-content-left flex2">
                                                                        <div class="widget-heading">Slider - 1</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>

                                                        <td class="text-center text-black-50"><?php echo $hs1d["banner_name"]; ?></td>

                                                        <td class="text-center">1920 x 700 px</td>
                                                        <td class="text-center">

                                                            <?php
                                                            $d1 = $hs1d["date_time"];
                                                            $splitdate1 = explode(" ", $d1); // character eka , data eka
                                                            $pdate1 = $splitdate1[0];
                                                            $ptime1 = $splitdate1[1];
                                                            ?>

                                                            <div class="badge badge-success"><?php echo $pdate1; ?></div>
                                                        </td>

                                                        <td class="text-center">
                                                            <div class="badge badge-warning"><?php echo $ptime1; ?></div>
                                                        </td>
                                                        <td class="text-center">
                                                            <input accept="image/png, image/jpg, image/PNG, image/jpeg" style="background-color: #000000; color: white;" class="" type="file" name="" id="hs1">
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <?php
                                                        $hs2r = Database::search("SELECT * FROM `banner_update` WHERE `banner_name` LIKE '%slider2%' ");
                                                        $hs2d = $hs2r->fetch_assoc();
                                                        ?>
                                                        <td class="text-center text-muted">2</td>
                                                        <td>
                                                            <div class="widget-content p-0">
                                                                <div class="widget-content-wrapper">

                                                                    <div class="widget-content-left flex2">
                                                                        <div class="widget-heading">Slider - 2</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>

                                                        <td class="text-center text-black-50"><?php echo $hs2d["banner_name"]; ?></td>

                                                        <td class="text-center">1920 x 700 px</td>
                                                        <td class="text-center">

                                                            <?php
                                                            $d2 = $hs2d["date_time"];
                                                            $splitdate2 = explode(" ", $d2); // character eka , data eka
                                                            $pdate2 = $splitdate2[0];
                                                            $ptime2 = $splitdate2[1];
                                                            ?>

                                                            <div class="badge badge-success"><?php echo $pdate2; ?></div>
                                                        </td>

                                                        <td class="text-center">
                                                            <div class="badge badge-warning"><?php echo $ptime2; ?></div>
                                                        </td>
                                                        <td class="text-center">
                                                            <input accept="image/png, image/jpg, image/PNG, image/jpeg" style="background-color: #000000; color: white;" class="" type="file" name="" id="hs2">
                                                        </td>
                                                    </tr>



                                                    <tr>
                                                        <?php
                                                        $hs3r = Database::search("SELECT * FROM `banner_update` WHERE `banner_name` LIKE '%slider3%' ");
                                                        $hs3d = $hs3r->fetch_assoc();
                                                        ?>
                                                        <td class="text-center text-muted">3</td>
                                                        <td>
                                                            <div class="widget-content p-0">
                                                                <div class="widget-content-wrapper">

                                                                    <div class="widget-content-left flex2">
                                                                        <div class="widget-heading">Slider - 3</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>

                                                        <td class="text-center text-black-50"><?php echo $hs3d["banner_name"]; ?></td>

                                                        <td class="text-center">1920 x 700 px</td>
                                                        <td class="text-center">

                                                            <?php
                                                            $d3 = $hs3d["date_time"];
                                                            $splitdate3 = explode(" ", $d3); // character eka , data eka
                                                            $pdate3 = $splitdate3[0];
                                                            $ptime03 = $splitdate3[1];
                                                            ?>

                                                            <div class="badge badge-success"><?php echo $pdate3; ?></div>
                                                        </td>

                                                        <td class="text-center">
                                                            <div class="badge badge-warning"><?php echo $ptime03; ?></div>
                                                        </td>
                                                        <td class="text-center">
                                                            <input accept="image/png, image/jpg, image/PNG, image/jpeg" style="background-color: #000000; color: white;" class="" type="file" name="" id="hs3">
                                                        </td>
                                                    </tr>



                                                    <tr>
                                                        <?php
                                                        $hs4r = Database::search("SELECT * FROM `banner_update` WHERE `banner_name` LIKE '%slider4%' ");
                                                        $hs4d = $hs4r->fetch_assoc();
                                                        ?>
                                                        <td class="text-center text-muted">4</td>
                                                        <td>
                                                            <div class="widget-content p-0">
                                                                <div class="widget-content-wrapper">

                                                                    <div class="widget-content-left flex2">
                                                                        <div class="widget-heading">Slider - 4</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>

                                                        <td class="text-center text-black-50"><?php echo $hs4d["banner_name"]; ?></td>

                                                        <td class="text-center">1920 x 700 px</td>
                                                        <td class="text-center">

                                                            <?php
                                                            $d4 = $hs4d["date_time"];
                                                            $splitdate4 = explode(" ", $d4); // character eka , data eka
                                                            $pdate4 = $splitdate4[0];
                                                            $ptime04 = $splitdate4[1];
                                                            ?>

                                                            <div class="badge badge-success"><?php echo $pdate4; ?></div>
                                                        </td>

                                                        <td class="text-center">
                                                            <div class="badge badge-warning"><?php echo $ptime04; ?></div>
                                                        </td>
                                                        <td class="text-center">
                                                            <input accept="image/png, image/jpg, image/PNG, image/jpeg" style="background-color: #000000; color: white;" class="" type="file" name="" id="hs4">
                                                        </td>
                                                    </tr>



                                                    <tr>
                                                        <?php
                                                        $hs5r = Database::search("SELECT * FROM `banner_update` WHERE `banner_name` LIKE '%slider5%' ");
                                                        $hs5d = $hs5r->fetch_assoc();
                                                        ?>
                                                        <td class="text-center text-muted">5</td>
                                                        <td>
                                                            <div class="widget-content p-0">
                                                                <div class="widget-content-wrapper">

                                                                    <div class="widget-content-left flex2">
                                                                        <div class="widget-heading">Slider - 5</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>

                                                        <td class="text-center text-black-50"><?php echo $hs5d["banner_name"]; ?></td>

                                                        <td class="text-center">1920 x 700 px</td>
                                                        <td class="text-center">

                                                            <?php
                                                            $d5 = $hs5d["date_time"];
                                                            $splitdate5 = explode(" ", $d5); // character eka , data eka
                                                            $pdate5 = $splitdate5[0];
                                                            $ptime05 = $splitdate5[1];
                                                            ?>

                                                            <div class="badge badge-success"><?php echo $pdate5; ?></div>
                                                        </td>

                                                        <td class="text-center">
                                                            <div class="badge badge-warning"><?php echo $ptime05; ?></div>
                                                        </td>
                                                        <td class="text-center">
                                                            <input accept="image/png, image/jpg, image/PNG, image/jpeg" style="background-color: #000000; color: white;" class="" type="file" name="" id="hs5">
                                                        </td>
                                                    </tr>







                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                    <!--  -------------------------------------------------------- banner update  --------------------------------------------------------   -->



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
            <!-- Alerts -->
            <script src="other/snackbar.min.js"></script>
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
} else {
    ?>
    <script>
        window.location = "signinSignUp.php";
    </script>
<?php
}
?>