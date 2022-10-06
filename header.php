<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>

    <?php
    $email = "";
    ?>

    <!-- Start header section -->
    <header id="aa-header">
        <!-- start header top  -->
        <div class="aa-header-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="aa-header-top-area">
                            <!-- start header top left -->
                            <div class="aa-header-top-left">
                                <div style="cursor: pointer;" class="cellphone font-weight-hover">

                                    <?php
                                    if (isset($_SESSION["u"])) {
                                        $f_name = $_SESSION["u"]["fname"];
                                        $l_name = $_SESSION["u"]["lname"];
                                        $email = $_SESSION["u"]["email"];

                                    ?>
                                        <div onclick="account();" style="cursor: pointer;" class="cellphone  font-weight-hover">
                                            <p><span class="fa fa-user"></span><?php echo $f_name . " " . $l_name; ?></p>
                                        </div>
                                    <?php

                                    } else {

                                    ?>
                                        <div onclick="goToSigninSignup();" style="cursor: pointer; color: blue;" class="cellphone  font-weight-hover">
                                            <p><span class="fa fa-user"></span>Login or Register</p>
                                        </div>
                                    <?php

                                    }
                                    ?>


                                </div>
                                <div onclick="contact()" ; style="cursor: pointer;" class="cellphone hidden-xs font-weight-hover">
                                    <p><span class="fa fa-question-circle"></span>Help & Contact</p>
                                </div>
                                <div style="cursor: pointer;" class="cellphone  font-weight-hover">
                                    <p onclick="goToSell()" ;><span class="fa fa-shopping-basket"></span>Sell on LION HUB</p>
                                </div>

                                <!-- start cellphone -->
                                <div class="cellphone hidden-xs font-weight-hover">
                                    <p><span class="fa fa-phone"></span>+94 728125203</p>
                                </div>
                                <!-- / cellphone -->
                            </div>
                            <!-- / header top left -->
                            <div class="aa-header-top-right">
                                <ul class="aa-head-top-nav-right">
                                    <!-- <li class="font-weight-hover"><a href="account.php">My Account</a></li> -->
                                    <li class="hidden-xs font-weight-hover"><a href="wishlist.php">Wishlist</a></li>
                                    <li class="hidden-xs font-weight-hover"><a href="cart.php">My Cart</a></li>
                                    <li class="hidden-xs font-weight-hover"><a href="checkout.php">Checkout</a></li>

                                    <?php
                                    if (isset($_SESSION["u"])) {
                                    } else {
                                    ?>
                                        <li class="font-weight-hover"><a href="" data-toggle="modal" data-target="#login-modal">Login</a></li>
                                    <?php
                                    }
                                    ?>


                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / header top  -->

        <!-- start header bottom  -->
        <div class="aa-header-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="aa-header-bottom-area">
                            <!-- logo  -->
                            <div class="aa-logo">
                                <!-- Text based logo -->
                                <a href="index.php">
                                    <span class="fa fa-shopping-cart"></span>
                                    <p>Lion<strong>Hub</strong> <span>Your Shopping Partner</span></p>
                                </a>
                                <!-- img based logo -->
                                <!-- <a href="index.html"><img src="img/logo.jpg" alt="logo img"></a> -->
                            </div>
                            <!-- / logo  -->
                            <!-- cart box -->

                            <script>
                                $(document).ready(function() {
                                    setInterval(function() {
                                        $("#cart").load(window.location.href + " #cart");
                                    }, 950);
                                });
                            </script>

                            <div class="aa-cartbox">
                                <a id="cart" class="aa-cart-link" href="cart.php">
                                    <span class="fa fa-shopping-basket"></span>
                                    <span class="aa-cart-title">Shopping Cart</span>



                                    <?php
                                    $cart = Database::search("SELECT * FROM `cart` WHERE `user_email` = '" . $email . "' ");
                                    $cn = $cart->num_rows;

                                    if ($cn >= 1) {
                                    ?>
                                        <span class="aa-cart-notify"><?php echo $cn; ?></span>



                                </a>

                                
                                <div style="height: 130px; overflow-y: scroll; border-bottom-style: solid; border-width: 4px; " class="aa-cartbox-summary">
                                    <ul>

                                        <?php

                                        $cart_model = Database::search("SELECT * FROM `cart` INNER JOIN `product` ON cart.`product_id` = product.`id` WHERE cart.`user_email` = '" . $email . "' ORDER BY product.`datetime_added` DESC ");
                                        $cart_details = $cart_model->num_rows;
                                        for ($x = 0; $x < $cart_details; $x++) {
                                            $cart_data = $cart_model->fetch_assoc();


                                            $c_img1 = Database::search("SELECT * FROM `images` WHERE images.`code` LIKE '%img1%' AND images.`product_id` = '" . $cart_data["id"] . "' ");
                                            $imgr1 = $c_img1->fetch_assoc();

                                        ?>
                                            <li>
                                                <a class="aa-cartbox-img" href="#"><img src="<?php echo $imgr1["code"]; ?>" alt="img"></a>
                                                <div class="aa-cartbox-info">

                                                    <p style="font-weight: bolder; font-family: 'calibri';"><a href="#"><?php echo $cart_data["title"]; ?></a></p>

                                                    <?php
                                                    $cart_qty = Database::search("SELECT `qty` FROM `cart` WHERE `product_id` = '" . $cart_data["id"] . "' ");
                                                    $cqr = $cart_qty->fetch_assoc();
                                                    ?>

                                                    <p><span style="color: gray;">Price: </span> <?php echo $cart_data["price"] ?></p>
                                                    <p><span style="color: gray;">Quantity: </span> <?php echo $cqr["qty"] ?> </p>
                                                </div>
                                                <a class="aa-remove-product" href="cart.php"><span class="fa fa-search"></span></a>
                                            </li>
                                        <?php

                                        }
                                        ?>

                                    </ul>

                                </div>
                            <?php
                                    } else {
                            ?>
                                <span class="aa-cart-notify">0</span>
                            <?php
                                    }
                            ?>
                            </div>
                            <div class="aa-cartbox Wishlist1">
                                <a id="date" class="aa-cart-link" href="wishlist.php">
                                    <span class="fa fa-heart"></span>
                                    <span class="aa-cart-title">Wishlist</span>

                                    <script>
                                        $(document).ready(function() {
                                            setInterval(function() {
                                                $("#date").load(window.location.href + " #date");
                                            }, 950);
                                        });
                                    </script>

                                    <?php
                                    $wish = Database::search("SELECT * FROM `watchlist` WHERE `user_email` = '" . $email . "' ");
                                    $wishn = $wish->num_rows;

                                    if ($wishn >= 1) {
                                    ?>
                                        <span class="wishclass aa-cart-notify "><?php echo $wishn; ?></span>
                                    <?php
                                    } else {
                                    ?>
                                        <span class="wishclass aa-cart-notify">0</span>
                                    <?php
                                    }
                                    ?>




                                </a>
                            </div>

                            

                            <!-- / cart box -->
                            <!-- search box -->

                            <div class="aa-search-box">

                                <div>
                                    <input onclick="searchRedirect();" class="form-control" type="text" aria-label="Text input with dropdown button" id="s" placeholder="Search your favour.. ">
                                    <button onclick="productSearch('1');" type="submit"><span class="fa fa-search"></span></button>
                                </div>
                            </div>

                            <!-- / search box -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- / header bottom  -->
    </header>
    <!-- / header section -->
    <!-- menu -->
    <section id="menu">
        <div class="container">
            <div class="menu-area">
                <!-- Navbar -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="navbar-collapse collapse">
                        <!-- Left nav -->
                        <ul class="nav navbar-nav">
                            <li style="margin-left: 10px;" class="submenu1"><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;&nbsp;Home</a></li>
                            <li style="margin-left: 10px;"  class="submenu1"><a href="signinSignUp.php"><i class="fa fa-sitemap" aria-hidden="true"></i>&nbsp;&nbsp;Sign in / Sign Up</a></li>
                            <li style="margin-left: 10px;"  class="submenu1"><a href="account.php"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;My Profile</a></li>

                            <!-- <li class="submenu1"><a href="purchasehistory.php"><i class="fa fa-history" aria-hidden="true"></i>&nbsp;&nbsp;Purchase History</a></li> -->

                            <li style="margin-left: 10px;"  class="submenu1"><a href="wishlist.php"><i class="fa fa-heart" aria-hidden="true"></i>&nbsp;&nbsp;My Wishlist</a></li>

                            <li style="margin-left: 10px;"  class="submenu1"><a href="contact.php"><i class="fa fa-info-circle" aria-hidden="true"></i>&nbsp;&nbsp;Help & Contact</a></li>
                            

                            <!-- <li class="submenu1"><a href="product.php"><i class="fa fa-search" aria-hidden="true"></i>&nbsp;&nbsp;Advance Search</a></li> -->
                            <!-- <li class="submenu1"><a href="message.php"><i class="fa fa-commenting" aria-hidden="true"></i>&nbsp;&nbsp;Messages<span><i style="color: yellow; font-size: x-small; padding-left: 5px; position: absolute;;" class="fa fa-circle" aria-hidden="true"></i></span></a></li> -->
                            <li style="margin-left: 10px;"  class="submenu1"><a href="#"><i class="fa fa-th-list" aria-hidden="true"></i>&nbsp;&nbsp;More <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                            <li><a href="product.php">Advance Search</a></li>
                            <li><a href="message.php">My Messages</a></li>
                            <li><a href="track.php">Track My Orders</a></li>
                            </ul>
                            </li>
                            <li   class="submenu1"><a href="contact.php"><i class="fa fa-info-circle" aria-hidden="true"></i>&nbsp;&nbsp;Help & Contact</a></li>
                            <li style="margin-left: 10px;"  onclick="signOut();" class="submenu1"><a href="#"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;&nbsp;Log Out</span></a>
                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
    </section>
    <!-- / menu -->





</body>

</html>