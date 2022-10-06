<?php
session_start();
require "connection.php";

if (isset($_SESSION["u"])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>LION HUB | My Account</title>

        <link href="other/icon.png" rel="icon">
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">
        <!-- Theme color -->
        <link id="switcher" href="css/theme-color/lite-blue-theme.css" rel="stylesheet">
        <!-- CSS Libraries -->
        <link href="css/font-awesome.css" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.css" rel="stylesheet">

        <link href="lib/slick/slick.css" rel="stylesheet">
        <link href="lib/slick/slick-theme.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link id="switcher" href="css/theme-color/lite-blue-theme.css" rel="stylesheet">
        <!-- Alerts -->
        <link rel="stylesheet" href="other/snackbar.min.css">
        <!--  Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
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

    <body style="background-image: url('resources/profilebackground.jpg'); background-repeat: no-repeat; background-size: cover;">

        <!-- background: rgb(2,0,36); background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(255,255,255,1) 0%, rgba(0,203,255,1) 100%); -->

        <?php
        require "header2.php";
        ?>
        <!-- / menu -->

        <!-- My Account Start -->
        <div class="my-account ">
            <div class="container-fluid">
                <div class="row">
                    <div style="border-right-style: solid; border-color: rgb(0, 0, 0, 0.3) ;" class="col-md-3 mt-5">
                        <img style="width: 100px; height: auto; margin-left: auto; margin-right: auto; display: block;" class="mb-3 mt-5" src="other/icon.png" />
                        <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">

                            <a class="nav-link active" id="account-nav" data-toggle="pill" href="#account-tab" role="tab"><i class="fa fa-user"></i>&nbsp;&nbsp;Account Details</a><br />
                            <a href="index.php" class="nav-link" id="orders-nav"><i class="fa fa-home"></i>&nbsp;&nbsp;Home Page</a><br />
                            <!-- <a class="nav-link " id="dashboard-nav" data-toggle="pill" href="#dashboard-tab" role="tab"><i class="fa fa-tachometer-alt"></i>Dashboard</a> -->
                            <a href="purchasehistory.php" class="nav-link" id="orders-nav"><i class="fa fa-shopping-bag"></i>&nbsp;&nbsp;Purchase History</a><br />

                            <?php
                            $user1 = $_SESSION["u"];
                            $status_r = Database::search("SELECT * FROM `user` WHERE `status_id` = '3' AND `email` = '" . $user1["email"] . "' ");
                            $sr = $status_r->num_rows;

                            if ($sr == 1) {
                            ?>
                                <a href="sellerProductView.php" class="nav-link" id="orders-nav"><i class="fa fa-sitemap"></i>&nbsp;&nbsp;My Products</a><br />
                            <?php
                            } else {
                            }

                            ?>



                            <a href="cart.php" class="nav-link" id="orders-nav"><i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;My Cart</a><br />
                            <a href="wishlist.php" class="nav-link" id="orders-nav"><i class="fa fa-heart"></i>&nbsp;&nbsp;My Wishlist</a><br />
                            <!-- <a class="nav-link" id="payment-nav" data-toggle="pill" href="#payment-tab" role="tab"><i class="fa fa-credit-card"></i>Payment Method</a> -->
                            <!-- <a class="nav-link " id="address-nav" data-toggle="pill" href="#address-tab" role="tab"><i class="fa fa-map-marker-alt"></i>&nbsp;&nbsp;address</a> -->
                            <a href="#" onclick="signOut();" class="nav-link"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;Logout</a><br />
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content">




                            <div class="tab-pane fade show active" id="account-tab" role="tabpanel" aria-labelledby="account-nav">
                                <h1 class="mt-5">Account Settings</h1>
                                <div class="col-md-12 border-right">
                                    <div class="d-flex flex-column text-center mb-5">


                                        <?php
                                        $profileimg = Database::search("SELECT * FROM `profile_img` WHERE `user_email`='" . $_SESSION["u"]["email"] . "'");
                                        $pn = $profileimg->num_rows;

                                        if ($pn == 1) {
                                            $p = $profileimg->fetch_assoc();
                                        ?>
                                            <img style="margin-left: auto; margin-right: auto; display: block;" id="proImgPrev" class="rounded mt-5" width="150px" src="<?php echo $p["code"] ?>" />
                                        <?php
                                        } else {
                                        ?>
                                            <img style="margin-left: auto; margin-right: auto; display: block;" id="proImgPrev" class="rounded mt-5" width="150px" src="resources/feedback_user.jpg" />
                                        <?php
                                        }


                                        ?>


                                        <?php
                                        $user_details1 = Database::search("SELECT * FROM `user` WHERE `email`='" . $_SESSION["u"]["email"] . "'");
                                        $user_fetch = $user_details1->fetch_assoc();
                                        ?>


                                        <span class="font-weight-bold"><span class="text-danger">Name: </span> <?php echo $user_fetch["fname"] . " " . $user_fetch["lname"] ?></span>
                                        <span class="text-dark font-weight-bold"><span class="text-danger ">Email Address: </span><?php echo $_SESSION["u"]["email"] ?></span>
                                        <input id="profileimg" class="d-none" type="file" accept="img/* " />
                                        <label for="profileimg" class="btn btn-dark mt-3" onclick="profileImgUpdate();">Update Profile Image</label>
                                    </div>
                                </div>


                                <div class="row">




                                    <div class="col-md-6 mt-3">
                                        <label>First Name</label>
                                        <input value="<?php echo $user_fetch["fname"] ?>" id="fname" class="form-control" type="text" placeholder="Enter your First Name">
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label>Last Name</label>
                                        <input value="<?php echo $user_fetch["lname"] ?>" id="lname" class="form-control" type="text" placeholder="Enter your Last Name">
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label>Mobile Number</label>
                                        <input value="<?php echo $user_fetch["mobile"] ?>" id="mobile" class="form-control" type="text" placeholder="Enter your Mobile">
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label>Password</label>
                                        <input value="<?php echo $_SESSION["u"]["password"] ?>" disabled class="form-control" type="password" placeholder="Enter your password">
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label>Email address</label>
                                        <input value="<?php echo $_SESSION["u"]["email"] ?>" id="email" disabled class="form-control" type="email" placeholder="Enter your Email">
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label>Registered Date & Time</label>
                                        <input value="<?php echo $_SESSION["u"]["register_date"] ?>" disabled class="form-control" type="email">
                                    </div>

                                    <?php
                                    $usermail = $_SESSION["u"]["email"];
                                    $saddress = Database::search("SELECT * FROM `user_has_address` WHERE `user_email`='" . $usermail . "'");
                                    $n = $saddress->num_rows;

                                    if ($n == 1) {
                                        $d = $saddress->fetch_assoc();
                                    ?>

                                        <div class="col-md-6 mt-3">
                                            <label>Address Line 1</label>
                                            <input value="<?php echo $d["line1"] ?>" id="line1" class="form-control" type="text" placeholder="Enter Address line 1">
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <label>Address Line 2</label>
                                            <input value="<?php echo $d["line2"] ?>" id="line2" class="form-control" type="text" placeholder="Enter Address line 2">
                                        </div>

                                        <?php
                                        $locationid = $d["location_id"];

                                        $rs1 = Database::search("SELECT `location`.`id`, `province_id` , `district_id`, `city_id`, 
                                            city.id AS `cid`, city.name AS `c_name`, 
                                            city.postal_code, 
                                            district.id AS `did`, district.name AS `d_name`, 
                                            province.id AS `pid`, province.name AS `p_name` 
                                            FROM `location` JOIN `city` ON city.id=location.city_id
                                            JOIN `district` ON district.id=location.district_id
                                            JOIN `province` ON province.id=location.province_id WHERE `location`.id='" . $locationid . "';");

                                        $d1 = $rs1->fetch_assoc();
                                        ?>

                                        <div class="col-md-6 mt-3">
                                            <label>Province</label>
                                            <select id="provinceid" class="form-control">
                                                <option value="<?php echo $d1["pid"] ?>"><?php echo $d1["p_name"] ?></option>

                                                <?php
                                                $province = Database::search("SELECT * FROM `province` WHERE `name` != '" . $d1["p_name"] . "' AND `name`!='Select Your Province'");
                                                $pn = $province->num_rows;

                                                for ($i = 0; $i < $pn; $i++) {
                                                    $pr = $province->fetch_assoc();

                                                ?>
                                                    <option value="<?php echo $pr["id"] ?>"><?php echo $pr["name"] ?></option>
                                                <?php
                                                }
                                                ?>

                                            </select>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <label>District</label>
                                            <select id="districtid" class="form-control">
                                                <option value="<?php echo $d1["did"] ?>"><?php echo $d1["d_name"] ?></option>
                                                <?php
                                                $district = Database::search("SELECT * FROM `district` WHERE `name` != '" . $d1["d_name"] . "' AND `name`!='Select your district'");
                                                $dn = $district->num_rows;

                                                for ($i = 0; $i < $dn; $i++) {
                                                    $dr = $district->fetch_assoc();

                                                ?>
                                                    <option value="<?php echo $dr["id"] ?>"><?php echo $dr["name"] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mt-3">
                                            <label class="form-label">City</label>
                                            <select id="cityid" class="form-control">
                                                <option value="<?php echo $d1["cid"] ?>"><?php echo $d1["c_name"] ?></option>
                                                <?php
                                                $city = Database::search("SELECT * FROM `city` WHERE `name` != '" . $d1["c_name"] . "' AND `name`!='Select Your City'");
                                                $cn = $city->num_rows;

                                                for ($i = 0; $i < $cn; $i++) {
                                                    $cr = $city->fetch_assoc();

                                                ?>
                                                    <option value="<?php echo $cr["id"] ?>"><?php echo $cr["name"] ?></option>
                                                <?php
                                                }
                                                ?>

                                            </select>
                                        </div>

                                        <div class="col-md-6 mt-3">
                                            <label class="form-label">Postal Code</label>
                                            <input id="postalcodeid" type="text" class="form-control" placeholder="Enter your Postal Code" value="<?php echo $d1["postal_code"] ?>" />
                                        </div>

                                        <div class="col-md-6 mt-2">
                                            <label class="form-label">Gender</label>
                                            <?php
                                            $ugenderid = $_SESSION["u"]["gender_id"];
                                            $ugender = Database::search("SELECT * FROM `gender` WHERE `id`='" . $ugenderid . "'");
                                            $g = $ugender->fetch_assoc();
                                            ?>
                                            <input type="text" class="form-control" placeholder="Gender" readonly value="<?php echo $g["name"] ?>" />
                                        </div>

                                    <?php
                                    } else {







                                    ?>
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">Address Line 01</label>
                                            <input id="line1" type="text" class="form-control" placeholder="Address Line 01" value="" />
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">Address Line 02</label>
                                            <input id="line2" type="text" class="form-control" placeholder="Address Line 02" value="" />
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Province</label>
                                            <select id="provinceid" class="form-control">

                                                <?php
                                                $province2 = Database::search("SELECT * FROM `province`");
                                                $pr2 = $province2->num_rows;

                                                for ($x = 0; $x < $pr2; $x++) {
                                                    $prow = $province2->fetch_assoc();

                                                ?>
                                                    <option id="" value="<?php echo $prow["id"] ?>"><?php echo $prow["name"] ?></option>
                                                <?php

                                                }
                                                ?>

                                            </select>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">District</label>
                                            <select id="districtid" class="form-control">

                                                <?php
                                                $district2 = Database::search("SELECT * FROM `district`");
                                                $dr2 = $district2->num_rows;

                                                for ($x = 0; $x < $dr2; $x++) {
                                                    $drow = $district2->fetch_assoc();

                                                ?>
                                                    <option id="" value="<?php echo $drow["id"] ?>"><?php echo $drow["name"] ?></option>
                                                <?php

                                                }
                                                ?>

                                            </select>
                                        </div>

                                        <div class="col-md-6 mt-3">
                                            <label class="form-label">City</label>
                                            <select id="cityid" class="form-control">

                                                <?php
                                                $city2 = Database::search("SELECT * FROM `city`");
                                                $cr2 = $city2->num_rows;

                                                for ($x = 0; $x < $cr2; $x++) {
                                                    $crow = $city2->fetch_assoc();

                                                ?>
                                                    <option id="" value="<?php echo $crow["id"] ?>"><?php echo $crow["name"] ?></option>
                                                <?php

                                                }
                                                ?>

                                            </select>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <label class="form-label">Postal Code</label>
                                            <input id="postalcodeid" type="text" class="form-control" placeholder="Enter your Postal Code" value="" />
                                        </div>

                                        <div class="col-md-6 mt-2 ">
                                            <label class="form-label">Gender</label>
                                            <?php
                                            $ugenderid = $_SESSION["u"]["gender_id"];
                                            $ugender = Database::search("SELECT * FROM `gender` WHERE `id`='" . $ugenderid . "'");
                                            $g = $ugender->fetch_assoc();
                                            ?>
                                            <input type="text" class="form-control" placeholder="Gender" readonly value="<?php echo $g["name"] ?>" />
                                        </div>


                                    <?php

                                    }
                                    ?>



                                    <div class="col-md-12 mt-5">
                                        <button onclick="updateProfile();" style="margin-left: auto; margin-right: auto;" class="btn btn-danger ">Update My Account</button>
                                    </div>
                                </div>

                            </div>





                            <!-- <div class="tab-pane fade" id="address-tab" role="tabpanel" aria-labelledby="address-nav">
                                <h4>Address</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>Payment Address</h5>
                                        <p>123 Payment Street, Los Angeles, CA</p>
                                        <p>Mobile: 012-345-6789</p>
                                        <button class="btn">Edit Address</button>
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Shipping Address</h5>
                                        <p>123 Shipping Street, Los Angeles, CA</p>
                                        <p>Mobile: 012-345-6789</p>
                                        <button class="btn">Edit Address</button>
                                    </div>
                                </div>
                            </div> -->



                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- My Account End -->

        <!-- tankyou section -->
        <?php
        require "other/thankyou.php";
        ?>
        <!-- tankyou section -->

        <?php
        require "footer.php";
        ?>



        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.js"></script>
        <!-- SmartMenus jQuery plugin -->
        <script type="text/javascript" src="js/jquery.smartmenus.js"></script>
        <!-- SmartMenus jQuery Bootstrap Addon -->
        <script type="text/javascript" src="js/jquery.smartmenus.bootstrap.js"></script>



        <!-- Back to Top -->
        <!-- <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a> -->

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/slick/slick.min.js"></script>

        <!--  Javascript -->
        <script src="js/main.js"></script>
        <script src="js/all.js"></script>
        <!-- Alerts -->
        <script src="other/snackbar.min.js"></script>




    </body>

    </html>
<?php
} else {
?>
    <script>
        window.location = "signinSignUp.php";
    </script>
<?php
}
?>