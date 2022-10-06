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
    <title>LION HUB | Home</title>

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
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="css/nouislider.css">
    <!-- Theme color -->
    <link id="switcher" href="css/theme-color/lite-blue-theme.css" rel="stylesheet">
    <!-- <link id="switcher" href="css/theme-color/bridge-theme.css" rel="stylesheet"> -->
    <!-- Top Slider CSS -->
    <link href="css/sequence-theme.modern-slide-in.css" rel="stylesheet" media="all">

    <!-- Alerts -->
    <link rel="stylesheet" href="other/snackbar.min.css">

    <!-- Main style sheet -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script> -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>


    <script>
        (function(w, d) {
            w.CollectId = "618b7f3e11c7462f21dec261";
            var h = d.head || d.getElementsByTagName("head")[0];
            var s = d.createElement("script");
            s.setAttribute("type", "text/javascript");
            s.async = true;
            s.setAttribute("src", "https://collectcdn.com/launcher.js");
            h.appendChild(s);
        })(window, document);
    </script>
</head>

<body id="quick_view">

    <!-- wpf loader Two -->
    <div style="background-color: #F6FBFF;" id="wpf-loader-two">
        <div class="wpf-loader-two-inner">


            <div style="z-index: 99999999999;" class="wrapper">
                <div id="loader-wrapper">
                    <div id="loader">
                        <video style="margin-top: -200px; margin-left: -200px;" width="560" height="560" autoplay loop muted playsinline>
                            <source src="other/pingpong_animation_render.mp4" type="video/mp4" />
                        </video>
                        <p style="text-align: center; margin-top: -100px; margin-left: 20px; font-weight: bolder;">LOADING..</p>
                    </div>
                    <div class="loader-section section-left"></div>
                    <div class="loader-section section-right"></div>
                </div>
            </div>


        </div>
    </div>







    <!-- / wpf loader Two -->
    <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
    <!-- END SCROLL TOP BUTTON -->




    <?php
    require "header.php";
    ?>



    <!-- Start slider -->
    <section id="aa-slider">
        <div class="aa-slider-area">
            <div id="sequence" class="seq">
                <div class="seq-screen">
                    <ul class="seq-canvas">
                        <!-- single slide item -->
                        <li>
                            <div class="seq-model">

                            <?php
                                $slider1 = Database::search("SELECT * FROM `banner_update` WHERE `banner_name` LIKE '%slider1%' ");
                                $sliderd = $slider1->fetch_assoc();
                            ?>

                                <img data-seq src="<?php echo $sliderd["banner_name"]; ?>" />
                            </div>
                            <div style="margin-top: -50px;" class="seq-title">
                                <!-- <span data-seq>Save Up to 75% Off</span>
                                <h2 data-seq>Men Collection</h2>
                                <p data-seq>Just having satisfied customers isn't good enough anymore.</p>
                                <a data-seq href="product.php" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a> -->
                            </div>
                        </li>
                        <!-- single slide item -->
                        <li>
                            <div class="seq-model">
                            <?php
                                $slider2 = Database::search("SELECT * FROM `banner_update` WHERE `banner_name` LIKE '%slider2%' ");
                                $sliderd2 = $slider2->fetch_assoc();
                            ?>

                                <img data-seq src="<?php echo $sliderd2["banner_name"]; ?>" />
                            </div>
                            <div class="seq-title">
                                <!-- <span data-seq>Save Up to 40% Off</span> -->
                                <!-- <h2 data-seq>Wristwatch Collection</h2>
                                <p data-seq>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.</p> -->
                                <br />
                                <!-- <a data-seq href="#" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a> -->
                            </div>
                        </li>
                        <!-- single slide item -->
                        <li>
                            <div class="seq-model">
                            <?php
                                $slider3 = Database::search("SELECT * FROM `banner_update` WHERE `banner_name` LIKE '%slider3%' ");
                                $sliderd3 = $slider3->fetch_assoc();
                            ?>

                                <img data-seq src="<?php echo $sliderd3["banner_name"]; ?>" />
                            </div>
                            <div class="seq-title">
                                <!-- <span data-seq>Save Up to 75% Off</span>
                                <h2 data-seq>Headset Collection</h2>
                                <p data-seq>Looks so Good on the Outside, It'll Make You Feel Good Inside.</p>
                                <a data-seq href="#" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a> -->
                            </div>
                        </li>
                        <!-- single slide item -->
                        <li>
                            <div class="seq-model">
                            <?php
                                $slider4 = Database::search("SELECT * FROM `banner_update` WHERE `banner_name` LIKE '%slider4%' ");
                                $sliderd4 = $slider4->fetch_assoc();
                            ?>

                                <img data-seq src="<?php echo $sliderd4["banner_name"]; ?>" />
                            </div>
                            <div class="seq-title">
                                <!-- <span data-seq>Save Up to 75% Off</span>
                                <h2 data-seq>Exclusive Laptops</h2>
                                <p data-seq>The greatest glory in living lies not in never falling, but in rising every time we fall.</p>
                                <a data-seq href="product.php" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a> -->
                            </div>
                        </li>
                        <!-- single slide item -->
                        <li>
                            <div class="seq-model">
                            <?php
                                $slider5 = Database::search("SELECT * FROM `banner_update` WHERE `banner_name` LIKE '%slider5%' ");
                                $sliderd5 = $slider5->fetch_assoc();
                            ?>

                                <img data-seq src="<?php echo $sliderd5["banner_name"]; ?>" />
                            </div>
                            <!-- <div class="seq-title">
                                <span data-seq>Save Up to 50% Off</span>
                                <h2 data-seq>Best Collection</h2>
                                <p data-seq>Communication is at the heart of ecommerce and community</p>
                                <a data-seq href="product.php" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>
                            </div> -->
                        </li>
                    </ul>
                </div>
                <!-- slider navigation btn -->
                <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
                    <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
                    <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
                </fieldset>
            </div>
        </div>
    </section>
    <!-- / slider -->








    <!-- Products section -->
    <section id="aa-product">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="aa-product-area">
                            <div class="aa-product-inner">
                                <!-- start prduct navigation -->



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Products section -->
    <!-- banner section -->
    <section id="aa-banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="aa-banner-area" style="margin-top: 20px; margin-bottom: 20px; ">
                            <a href="#"><img src="resources/1200x200img.jpeg" alt="fashion banner img"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- popular section -->
    <section id="aa-popular-category">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="aa-popular-category-area">
                            <!-- start prduct navigation -->
                            <ul class="nav nav-tabs aa-products-tab">
                                <!-- <li class="active"><a href="#popular" data-toggle="tab">Popular</a></li>
                                <li><a href="#featured" data-toggle="tab">Featured</a></li> -->
                                <li class="active"><a href="#latest" data-toggle="tab">Latest Products</a></li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">

                                <?php

                                $cat = Database::search("SELECT * FROM category WHERE `name` <> 'Select Category' ;");
                                $n = $cat->num_rows;
                                $product;
                                $product_id;
                                $img2;
                                $img3;


                                for ($x = 0; $x < $n; $x++) {
                                    $d = $cat->fetch_assoc();
                                    $product_id;

                                ?>

                                    <h2><?php echo $d["name"]; ?></h2>
                                    <!-- Start men popular category -->
                                    <div class="tab-pane fade in active" id="popular">
                                        <ul class="aa-product-catg aa-popular-slider">
                                            <!-- start single product item -->

                                            <?php
                                            $resultset = Database::search("SELECT * FROM `product` WHERE `qty` >= '1' AND `category_id`= '" . $d["id"] . "' AND `status_id` = '1' ORDER BY `datetime_added` DESC LIMIT 10 OFFSET 0");
                                            $norow = $resultset->num_rows;

                                            for ($y = 0; $y < $norow; $y++) {
                                                $product = $resultset->fetch_assoc();
                                                $product_id = $product["id"];
                                            ?>

                                                <li style="height: 400px;">
                                                    <figure>

                                                        <?php
                                                        $pimage = Database::search("SELECT * FROM `images` WHERE `code` LIKE '%img1%' AND `product_id`='" . $product["id"] . "'");
                                                        $img = $pimage->fetch_assoc();
                                                        $pimage2 = Database::search("SELECT * FROM `images` WHERE `code` LIKE '%img2%' AND `product_id`='" . $product["id"] . "'");
                                                        $img2 = $pimage2->fetch_assoc();
                                                        $pimage3 = Database::search("SELECT * FROM `images` WHERE `code` LIKE '%img3%' AND `product_id`='" . $product["id"] . "'");
                                                        $img3 = $pimage3->fetch_assoc();
                                                        ?>

                                                        <a class="aa-product-img"><img style="margin-right: auto; margin-left: auto; display: block; width: 250px; height: 300px; object-fit: cover;" src="<?php echo $img["code"] ?>" alt="polo shirt img"></a>
                                                        <a style="cursor: pointer;" onclick="addToCart(<?php echo $product['id'] ?>);" class="aa-add-card-btn"><span class="fa fa-shopping-cart"></span>Add To Cart</a>

                                                        <figcaption>
                                                            <h4 style="font-weight: bolder; margin-top: 15px;" class="aa-product-title"><a href="#"><?php echo $product["title"] ?></a></h4>

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

                                                            <span style="display: inline; font-weight: bold; color: #0090CC;">Rs. <?php echo $product["price"] ?> .00 &nbsp;</span> &nbsp;&nbsp;<span style="font-weight: bolder;"> x </span>&nbsp;&nbsp;
                                                            <span><input style="text-align: center; display: inline;  width: 25%; background-color: transparent; color: black; border-color: #0090CC; border-width: 2px; height: 20px;" min="1" id="qtytxt<?php echo $product["id"]; ?>" type="number" class="form-control mb-1 " value="1"></span>

                                                        </figcaption>
                                                    </figure>
                                                    <div style="margin-top: 25px;" class="aa-product-hvr-content">

                                                        <a style="cursor: pointer; background-color: #FF2424; color: white; font-size: 1.5em;" onclick="addToWishList(<?php echo $product['id'] ?>);" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                                                        <a style="cursor: pointer; background-color: #000000; color: white; font-size: 1.5em;" href="<?php echo "product-detail.php?id=" . ($product['id']); ?>" data-toggle="tooltip" data-placement="top" title="Buy Now"><span class="fa fa-eye"></span></a>
                                                        <a style="cursor: pointer; background-color: #000000; color: white; font-size: 1.5em;" href="product.php" data-toggle="tooltip" data-placement="top" title="Search Product"><span class="fa fa-list-alt"></span></a>

                                                    </div>
                                                    <!-- product badge -->
                                                    <?php
                                                    if ((int)$product["qty"] > 0) {

                                                    ?>
                                                        <span style="border-radius: 6px;" class="aa-badge aa-sold-out" href="#">In Stock</span>

                                                    <?php

                                                    } else {
                                                    ?>
                                                        <span style="border-radius: 6px;" class="aa-badge aa-sale" href="#">Out Of Stock</span>

                                                    <?php
                                                    }
                                                    ?>


                                                </li>


                                            <?php
                                            }
                                            ?>


                                        </ul>
                                        <a style="margin-bottom: 100px;" class="aa-browse-btn" href="product.php">Browse all Product <span class="fa fa-long-arrow-right"></span></a>
                                    </div>
                                    <!-- / popular product category -->





                                <?php
                                }
                                ?>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / popular section -->

    <!-- Testimonial -->
    <section id="aa-testimonial">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-testimonial-area">
                        <ul class="aa-testimonial-slider">

                            <?php
                            //most sold item
                            $item_rs = Database::search("SELECT `user_email`, `product_id` , COUNT(`product_id`) AS `max_product` FROM invoice GROUP BY `product_id` ORDER BY `max_product` DESC LIMIT 1;");
                            $item_d = $item_rs->fetch_assoc();
                            $max_product = $item_d["max_product"];
                            $pr_id = $item_d["product_id"];
                            $uemail = $item_d["user_email"];

                            //user info
                            $user_rs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $uemail . "' ");
                            $user_data = $user_rs->fetch_assoc();
                            //user info
                            $ppic = Database::search("SELECT * FROM `profile_img` WHERE `user_email` = '" . $uemail . "' ");
                            $ppd = $ppic->fetch_assoc();
                            ?>

                            <!-- single slide -->
                            <li>
                                <div class="aa-testimonial-single">
                                    <img class="aa-testimonial-img" src="<?php echo $ppd["code"]; ?>" alt="testimonial img">
                                    <span class="fa fa-quote-left aa-testimonial-quote"></span>
                                    <p>Investigates the moderating effect of firm and environmental variables on the importance of a strategic element, customer service, in explaining satisfaction.</p>
                                    <div class="aa-testimonial-info">
                                        <p><?php echo $user_data["fname"] ?></p>
                                        <span><?php echo $user_data["lname"] ?></span>
                                        <a href="#"><?php echo $user_data["email"]; ?></a>
                                    </div>
                                </div>
                            </li>
                            <!-- single slide -->
                            <li>
                                <div class="aa-testimonial-single">
                                    <img class="aa-testimonial-img" src="<?php echo $ppd["code"]; ?>" alt="testimonial img">
                                    <span class="fa fa-quote-left aa-testimonial-quote"></span>
                                    <p>Investigates the moderating effect of firm and environmental variables on the importance of a strategic element, customer service, in explaining satisfaction.</p>
                                    <div class="aa-testimonial-info">
                                        <p><?php echo $user_data["fname"] ?></p>
                                        <span><?php echo $user_data["lname"] ?></span>
                                        <a href="#"><?php echo $user_data["email"]; ?></a>
                                    </div>
                                </div>
                            </li>
                            <!-- single slide -->
                            <li>
                                <div class="aa-testimonial-single">
                                    <img class="aa-testimonial-img" src="<?php echo $ppd["code"]; ?>" alt="testimonial img">
                                    <span class="fa fa-quote-left aa-testimonial-quote"></span>
                                    <p>Investigates the moderating effect of firm and environmental variables on the importance of a strategic element, customer service, in explaining satisfaction.</p>
                                    <div class="aa-testimonial-info">
                                        <p><?php echo $user_data["fname"] ?></p>
                                        <span><?php echo $user_data["lname"] ?></span>
                                        <a href="#"><?php echo $user_data["email"]; ?></a>
                                    </div>
                                </div>
                            </li>
                            <!-- single slide -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Testimonial -->


    <!-- Support section -->
    <section style="margin-top: 50px;" id="aa-support">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-support-area">
                        <!-- single support -->
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="aa-support-single">
                                <span class="fa fa-truck"></span>
                                <h4>FREE SHIPPING</h4>
                                <P>We have an option for free shipping in sri lanka. You need to pay only the amount of item.</P>
                            </div>
                        </div>
                        <!-- single support -->
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="aa-support-single">
                                <span class="fa fa-clock-o"></span>
                                <h4>30 DAYS MONEY BACK</h4>
                                <P>If you return any item we'll Refund your money back within 30 days.</P>
                            </div>
                        </div>
                        <!-- single support -->
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="aa-support-single">
                                <span class="fa fa-phone"></span>
                                <h4>HELP & SUPPORT</h4>
                                <P>You can go through our contact page and tell your problem to us.</P>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / Support section -->


    <!-- Client Brand -->
    <!-- <section id="aa-client-brand">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="aa-client-brand-area">
                        <ul class="aa-client-brand-slider">
                            <li>
                                <a href="#"><img src="img/client-brand-java.png" alt="java img"></a>
                            </li>
                            <li>
                                <a href="#"><img src="img/client-brand-jquery.png" alt="jquery img"></a>
                            </li>
                            <li>
                                <a href="#"><img src="img/client-brand-html5.png" alt="html5 img"></a>
                            </li>
                            <li>
                                <a href="#"><img src="img/client-brand-css3.png" alt="css3 img"></a>
                            </li>
                            <li>
                                <a href="#"><img src="img/client-brand-wordpress.png" alt="wordPress img"></a>
                            </li>
                            <li>
                                <a href="#"><img src="img/client-brand-joomla.png" alt="joomla img"></a>
                            </li>
                            <li>
                                <a href="#"><img src="img/client-brand-java.png" alt="java img"></a>
                            </li>
                            <li>
                                <a href="#"><img src="img/client-brand-jquery.png" alt="jquery img"></a>
                            </li>
                            <li>
                                <a href="#"><img src="img/client-brand-html5.png" alt="html5 img"></a>
                            </li>
                            <li>
                                <a href="#"><img src="img/client-brand-css3.png" alt="css3 img"></a>
                            </li>
                            <li>
                                <a href="#"><img src="img/client-brand-wordpress.png" alt="wordPress img"></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- / Client Brand -->


    <!-- tankyou section -->
    <?php
    require "other/thankyou.php";
    ?>
    <!-- tankyou section -->


    <!-- footer -->
    <?php
    require "footer.php";
    ?>
    <!-- / footer -->

    <!-- Login Modal -->
    <?php
    require "loginmodel.php";
    ?>



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
    <script type="text/javascript" src="js/nouislider.js"></script>
    <!-- Custom js -->
    <script src="js/custom.js"></script>
    <script src="js/all.js"></script>
    <!-- Alerts -->
    <script src="other/snackbar.min.js"></script>
</body>

</html>