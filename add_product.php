<?php
session_start();
require "connection.php";

if (isset($_SESSION["u"])) {
    $umail1 = $_SESSION["u"]["email"];

    $status_check = Database::search("SELECT * FROM `user` WHERE `status_id` = '3' AND `email` = '" . $umail1 . "' ");
    $sr = $status_check->num_rows;

    if ($sr == 1) {




?>


        <!DOCTYPE html>
        <html>

        <head>
            <title>LION HUB | Add Product</title>

            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <link href="other/icon.png" rel="icon">
            <link rel="stylesheet" href="other/bootstrap.css" />
            <link rel="stylesheet" href="other/invoice.css" />
            <link rel="stylesheet" href="css/style.css" />
            <!-- Alerts -->
            <link rel="stylesheet" href="other/snackbar.min.css">
            <!-- Font awesome -->
            <link href="css/font-awesome.css" rel="stylesheet">
          


        </head>

        <body onload="disble_select_tags();">

            <?php
            require "header2.php";
            ?>

            <div class="container-fluid">
                <div class="row gy-3">

                    <!-- heading -->


                    <div id="addproductbox">
                        <div class="col-12 mb-5 mt-2">
                            <h1 style="font-family: 'calibri';" class=" text-center text-danger mb-5 fw-bolder"> List Your Product </h1>
                        </div>
                        <!-- heading -->
                        <!-- <img style="width: 150px; margin-left: auto; margin-right: auto; display: block; margin-bottom: 30px;" src="other/icon.png" /> -->


                        <!-- category,brand,model -->
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-12 col-lg-4">
                                    <div class="row">
                                        <div class="col-12 ">
                                            <label class="form-label lbl1 ">Select Product Category</label>
                                        </div>
                                        <div class="col-12">
                                            <select onclick="disable_brand_model();" onchange="auto_category();" class="form-select" id="ca">

                                                <?php
                                                $rs1 = Database::search("SELECT * FROM `category`");
                                                $numrow1 = $rs1->num_rows;

                                                for ($x = 0; $x < $numrow1; $x++) {
                                                    $row1 = $rs1->fetch_assoc();

                                                ?>
                                                    <option value="<?php echo $row1["id"] ?>"><?php echo $row1["name"]; ?></option>
                                                <?php
                                                }
                                                ?>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label lbl1">Select Product Brand</label>
                                        </div>
                                        <div id="brand_div" class="col-12">

                                            <select onchange="brand_set();" class="form-select" id="br">

                                                <?php
                                                $rs2 = Database::search("SELECT * FROM `brand`");
                                                $numrow2 = $rs2->num_rows;

                                                for ($x = 0; $x < $numrow2; $x++) {
                                                    $row2 = $rs2->fetch_assoc();

                                                ?>
                                                    <option value="<?php echo $row2["id"] ?>"><?php echo $row2["name"]; ?></option>
                                                <?php
                                                }
                                                ?>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label lbl1">Select Product Model</label>
                                        </div>
                                        <div id="model_div" class="col-12">

                                            <select class="form-select" id="mo">

                                                <?php
                                                $rs3 = Database::search("SELECT * FROM `model`");
                                                $numrow3 = $rs3->num_rows;

                                                for ($x = 0; $x < $numrow3; $x++) {
                                                    $row3 = $rs3->fetch_assoc();

                                                ?>
                                                    <option value="<?php echo $row3["id"] ?>"><?php echo $row3["name"]; ?></option>
                                                <?php
                                                }
                                                ?>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- category,brand,model -->

                        <hr class="hrbreak" />

                        <!--START title -->
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label lbl1">Add a Title To Your Product</label>
                                </div>
                                <div class="offset-lg-2 col-12 col-lg-8">
                                    <input class="form-control" type="text" id="ti" />
                                </div>
                            </div>
                        </div>
                        <!--END title -->


                        <hr class="hrbreak" />



                        <!-- condition,color,qty -->
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 col-lg-4">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label lbl1">Select Product Condition</label>
                                        </div>
                                        <div class="offset-1 offset-lg-1 col-10 col-lg-3 form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="bn" checked>
                                            <label class="form-check-label" for="bn">
                                                Brandnew
                                            </label>
                                        </div>
                                        <div class="offset-1 offset-lg-1 col-10 col-lg-3 form-check ">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="us">
                                            <label class="form-check-label" for="us">
                                                Used
                                            </label>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-12 col-lg-4">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label lbl1">Select Product Color</label>
                                        </div>
                                        <div id="model_div" class="col-12">

                                            <select class="form-select" id="clr">

                                                <?php
                                                $color_rs = Database::search("SELECT * FROM `color`");
                                                $color_rows = $color_rs->num_rows;

                                                for ($x = 0; $x < $color_rows; $x++) {
                                                    $color_data = $color_rs->fetch_assoc();

                                                ?>
                                                    <option value="<?php echo $color_data["id"] ?>"><?php echo $color_data["name"]; ?></option>
                                                <?php
                                                }
                                                ?>

                                            </select>
                                        </div>
                                    </div>
                                </div>



                                <div class="col-12 col-lg-4">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label lbl1">Add Product Quantity</label>
                                            <input class="form-control" type="number" value="0" min="0" required id="qty" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- condition,color,qty -->


                        <!-- cost,payment method -->
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 col-lg-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label lbl1">Cost Per Item</label>
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Rs.</span>
                                            <input type="text" class="form-control" aria-label="Amount (to the nearest rupee)" id="cost">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="col-12 col-lg-6">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label lbl1">Approved Payment Methods</label>
                                            <img src="img/paypal.jpg" alt="">
                                        </div>
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="offset-2 col-2 pm1"></div>
                                                <div class=" col-2 pm2"></div>
                                                <div class=" col-2 pm3"></div>
                                                <div class=" col-2 pm4"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->

                            </div>
                        </div>
                        <!-- cost,payment method -->

                        <hr class="hrbreak1" />




                        <!-- START delivery cost -->
                        <div class="col-12 col-lg-6">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label lbl1">Delivery Cost</label>
                                </div>
                                <div class="offset-lg-1 col-12 col-lg-3">
                                    <label class="form-label">Delivery Cost Within Colombo</label>
                                </div>
                                <div class="col-12 col-lg-7">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Rs.</span>
                                        <input type="text" class="form-control" aria-label="Amount (to the nearest rupee)" id="dwc">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-6">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label lbl1"></label>
                                </div>
                                <div class="offset-lg-1 col-12 col-lg-3 mt-lg-3">
                                    <label class="form-label">Delivery Cost Out Of Colombo</label>
                                </div>
                                <div class="col-12 col-lg-7 mt-lg-3">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Rs.</span>
                                        <input type="text" class="form-control" aria-label="Amount (to the nearest rupee)" id="doc">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END delivery cost -->


                        <hr class="hrbreak1" />


                        <!-- START Description -->

                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label lbl1">Product Description</label>
                                </div>
                                <div class="col-12">
                                    <textarea cols="100" rows="10" class="form-control" style="background-color: #EAEAEA;" id="desc"></textarea>
                                    
                                </div>
                            </div>
                        </div>

                        <!-- END Description -->

                        <hr class="hrbreak1" />


                        <!-- START Product Image -->
                        <!-- <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <label class="form-label lbl1">Add Product Image</label>
                        </div>

                        <img style="width: 255px; height: auto;" class="col-6 col-lg-2 ms-2 ms-lg-3 img-thumbnail" src="resources/addproductimg.svg" id="prev" />
                        <img style="width: 255px; height: auto;" class="col-6 col-lg-2 ms-2 ms-lg-3 img-thumbnail" src="resources/addproductimg.svg" id="prev1" />
                        <img style="width: 255px; height: auto;" class="col-6 col-lg-2 ms-2 ms-lg-3 img-thumbnail" src="resources/addproductimg.svg" id="prev2" />

                        <div class="col-12 ">
                            <div class="row mt-2">

                                <div class="col-3 ms-1 ms-lg-3 col-lg-2 d-grid">
                                    <input class="d-none" type="file" accept="image/*" id="imguploader" />
                                    <label class="btn btn-primary" for="imguploader" onclick="changeImg();">Upload</label>
                                </div>
                            
                                <div class="col-3 ms-1 ms-lg-3 col-lg-2 d-grid">
                                    <input class="d-none" type="file" accept="image/*" id="imguploader1" />
                                    <label class="btn btn-primary " for="imguploader1" onclick="changeImg1();">Upload</label>
                                </div>

                                <div class="col-3 ms-1 ms-lg-3 col-lg-2 d-grid">
                                    <input class="d-none" type="file" accept="image/*" id="imguploader2" />
                                    <label class="btn btn-primary " for="imguploader2" onclick="changeImg2();">Upload</label>
                                </div>

                            </div>
                        </div>


                    </div>
                </div> -->
                        <!-- END Product Image -->






                        <!-- product img -->
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label lbl1">Add Product Image</label>
                                </div>
                                <img class="col-4 col-lg-2 ms-lg-2 img-thumbnail" id="prev" src="resources/productimg.jpg" />
                                <img class="col-4 col-lg-2 ms-lg-2 img-thumbnail" id="prev1" src="resources/productimg.jpg" />
                                <img class="col-4 col-lg-2 ms-lg-2 img-thumbnail" id="prev2" src="resources/productimg.jpg" />
                                <div class="col-12 mb-3">
                                    <div class="row">
                                        <div class="col-4 col-lg-2 mt-2">
                                            <div class="row">
                                                <div class="col-12 ms-1 ms-lg-1 pb-1">
                                                    <input type="file" accept="image/*" id="imguploader" class="d-none" />
                                                    <label class="btn btn-primary col-12 col-lg-12" for="imguploader" onclick="changeImg();">Upload</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 col-lg-2 mt-2">
                                            <div class="row">
                                                <div class="col-12 ms-lg-3 pb-1">
                                                    <input type="file" accept="image/*" id="imguploader1" class="d-none" />
                                                    <label class="btn btn-primary col-12 col-lg-12" for="imguploader1" onclick="changeImg1();">Upload</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 col-lg-2 mt-2">
                                            <div class="row">
                                                <div class="col-12 ms-lg-4 pb-1">
                                                    <input type="file" accept="image/*" id="imguploader2" class="d-none" />
                                                    <label class="btn btn-primary col-12 col-lg-12" for="imguploader2" onclick="changeImg2();">Upload</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product img -->









                        <hr class="hrbreak1" />

                        <!-- START notice -->
                        <div class="col-12">
                            <label class="form-label lbl1">Notice...</label>
                            <br />
                            <label class="form-label">We are taking 5% of the product price from every product as a service charge.</label>
                        </div>
                        <!-- END notice -->



                        <!-- START save btn -->


                        <div class="col-12">
                            <div class="row">
                                <div class="offset-0 offset-lg-2 col-12 col-lg-4 d-grid ">
                                    <button class="btn btn-danger searchbtn" onclick="addProduct();">Add Product</button>
                                </div>
                                <div class="col-12 col-lg-4 mt-0 mt-lg-0 d-grid">
                                    <a href="index.php" class="btn btn-dark searchbtn">Back To Home</a>
                                </div>
                            </div>
                        </div>


                        <!-- END save btn -->
                    </div>


                    <!-- *********************************************************************************************  -->
                    <!-- *********************************************************************************************  -->
                    <!-- *********************************************************************************************  -->
                    <!-- *********************************************************************************************  -->
                    <!-- *********************************************************************************************  -->



                    <!-- Footer -->
                    <?php
                    require "footer.php";
                    ?>
                    <!-- Footer -->

                </div>
            </div>






            <script src="https://design.sleekr.id/assets/scripts/main.js"></script>
            <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
            <!-- <script src="script.js"></script> -->
            <script src="other/bootstrap.bundle.js"></script>
            <script src="js/all.js"></script>
            <!-- Alerts -->
            <script src="other/snackbar.min.js"></script>
           
        </body>

        </html>

    <?php
    } else {
    ?>
        <script>
            alert("You Cannot Sell Items. Please Register As a Seller!");
            window.location = "signinSignUp.php";
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