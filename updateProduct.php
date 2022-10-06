<?php
session_start();
require "connection.php";

if (isset($_SESSION["u"])) {



    if (isset($_SESSION["p"])) {
        $product = $_SESSION["p"];

        $product1 = Database::search("SELECT * FROM `product` WHERE `id`='" . $product["id"] . "' ");
        $product_r = $product1->fetch_assoc();
    } else {
?>

        <script>
            alert("Please Select an Item to Update");
            window.location = "sellerProductView.php";
        </script>
    <?php
    }

    if (isset($product)) {
    ?>



        <!DOCTYPE html>
        <html lang="en">

        <head>
            <title>Update Product</title>

            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <link href="other/icon.png" rel="icon">
            <!-- Font awesome -->
            <link href="css/font-awesome.css" rel="stylesheet">
            <link rel="stylesheet" href="other/bootstrap.css" />
            <link rel="stylesheet" href="css/style.css" />
            <link rel="stylesheet" href="other/invoice.css" />
            <!-- Alerts -->
            <link rel="stylesheet" href="other/snackbar.min.css">
        </head>

        <body>

        <?php
            require "header2.php";
            ?>

            <div class="container-fluid">
                <div class="row">

                    <div class="" id="updateproductbox">
                        <div class="col-12 mb-2">
                            <h3 style="font-family: 'calibri';" class="fw-bold h1 text-center text-danger mt-5">Update Product </h3>
                        </div>

                        <br class="hrbreak1" />


                        <!--START category,brand,model -->
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-12 col-lg-4">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label lbl1" id="category">Select Product Category</label>
                                        </div>
                                        <div class="col-12">
                                            <select class="form-select" id="ca" disabled>


                                                <?php
                                                $category  = Database::search("SELECT * FROM `category` WHERE `id` = '" . $product["category_id"] . "'");
                                                $cd = $category->fetch_assoc();
                                                ?>


                                                <option value="0"><?php echo $cd["name"]; ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label lbl1 " id="product">Select Product Brand</label>
                                        </div>
                                        <div class="col-12">
                                            <select class="form-select" id="br" disabled>
                                                <?php
                                                $brand  = Database::search("SELECT product.`model_has_brand_id` FROM product WHERE `id` = '".$product_r["id"]."' ");
                                                $b1 = $brand->fetch_assoc();
                                                $br = $b1["model_has_brand_id"];
                                                
                                                $brand2 = Database::search("SELECT * FROM `model_has_brand` WHERE  id = '".$br."' ");
                                                $b2 = $brand2->fetch_assoc();
                                                $br2 = $b2["brand_id"];

                                                $brand3 = Database::search("SELECT * FROM `brand` WHERE `id` = '".$br2."' ");
                                                $b3 = $brand3->fetch_assoc();
                                                $br3 = $b3["name"];

                                                ?>


                                                <option value=""><?php echo $br3; ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label lbl1" id="model">Select Product Model</label>
                                        </div>
                                        <div class="col-12">
                                            <select class="form-select" id="mo" disabled>
                                            <?php
                                                $model  = Database::search("SELECT product.`model_has_brand_id` FROM product WHERE `id` = '".$product_r["id"]."' ");
                                                $m1 = $model->fetch_assoc();
                                                $mr = $m1["model_has_brand_id"];
                                                
                                                $model2 = Database::search("SELECT * FROM `model_has_brand` WHERE  id = '".$mr."' ");
                                                $m2 = $model2->fetch_assoc();
                                                $mr2 = $m2["model_id"];

                                                $model3 = Database::search("SELECT * FROM `model` WHERE `id` = '".$mr2."' ");
                                                $m3 = $model3->fetch_assoc();
                                                $mr3 = $m3["name"];

                                                ?>


                                                <option value=""><?php echo $mr3; ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--END category,brand,model -->

                        <hr class="hrbreak" />

                        <!--START title -->
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label lbl1">Add a Title To Your Product</label>
                                </div>
                                <div class="offset-lg-2 col-12 col-lg-8">
                                    <input class="form-control" type="text" id="u_title" value="<?php echo $product_r['title']; ?>" ?>
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
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="bn" checked disabled <?php if ($product["condition_id"] == '1') {
                                                                                                                                                echo ' checked ';
                                                                                                                                            } ?> />
                                            <label class="form-check-label" for="bn">
                                                Brandnew
                                            </label>
                                        </div>
                                        <div class="offset-1 offset-lg-1 col-10 col-lg-3 form-check ">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="us" disabled <?php if ($product["condition_id"] == '2') {
                                                                                                                                        echo ' checked ';
                                                                                                                                    } ?> />
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

                                        <div class="col-12">
                                            <div class="row">
                                                <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                    <input class="form-check-input" type="radio" value="" name="colorRadio" id="clr1" checked disabled <?php if ($product["color_id"] == '1') {
                                                                                                                                                            echo ' checked ';
                                                                                                                                                        } ?> />
                                                    <label class="form-check-label" for="clr1">
                                                        Gold
                                                    </label>
                                                </div>
                                                <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                    <input class="form-check-input" type="radio" value="" name="colorRadio" id="clr2" disabled <?php if ($product["color_id"] == '2') {
                                                                                                                                                    echo ' checked ';
                                                                                                                                                } ?> />
                                                    <label class="form-check-label" for="clr2">
                                                        Silver
                                                    </label>
                                                </div>
                                                <div class="offset-1 offset-lg-0  col-5 col-lg-4 form-check">
                                                    <input class="form-check-input" type="radio" value="" name="colorRadio" id="clr3" disabled <?php if ($product["color_id"] == '3') {
                                                                                                                                                    echo ' checked ';
                                                                                                                                                } ?> />
                                                    <label class="form-check-label" for="clr3">
                                                        Graphite
                                                    </label>
                                                </div>
                                                <div class=" offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                    <input class="form-check-input" type="radio" value="" name="colorRadio" id="clr4" disabled <?php if ($product["color_id"] == '4') {
                                                                                                                                                    echo ' checked ';
                                                                                                                                                } ?> />
                                                    <label class="form-check-label" for="clr4">
                                                        Pacific Blue
                                                    </label>
                                                </div>
                                                <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                    <input class="form-check-input" type="radio" value="" name="colorRadio" id="clr5" disabled <?php if ($product["color_id"] == '5') {
                                                                                                                                                    echo ' checked ';
                                                                                                                                                } ?> />
                                                    <label class="form-check-label" for="clr5">
                                                        Jet Black
                                                    </label>
                                                </div>
                                                <div class="offset-1 offset-lg-0 col-5 col-lg-4 form-check">
                                                    <input class="form-check-input" type="radio" value="" name="colorRadio" id="clr6" disabled <?php if ($product["color_id"] == '6') {
                                                                                                                                                    echo ' checked ';
                                                                                                                                                } ?> />
                                                    <label class="form-check-label" for="clr6">
                                                        Rose Gold
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-4">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label lbl1">Product Quantity</label>
                                            <input class="form-control" type="number" value="<?php echo $product_r["qty"] ?>" min="0" required id="u_qty" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- condition,color,qty -->


                        <!-- cost,payment method -->
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label lbl1">Cost Per Item</label>
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Rs.</span>
                                            <input type="text" class="form-control" aria-label="Amount (to the nearest rupee)" id="cost" disabled value="<?php echo $product["price"]; ?>" />
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-6">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label lbl1">Approved Payment Methods</label>
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
                                </div>

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
                                        <input type="text" class="form-control" aria-label="Amount (to the nearest rupee)" id="u_dwc" value="<?php echo $product_r["delivery_fee_colombo"]; ?>" />
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
                                        <input type="text" class="form-control" aria-label="Amount (to the nearest rupee)" id="u_doc" value="<?php echo $product_r["delivery_fee_other"]; ?>" />
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
                                    <textarea cols="100" rows="10" class="form-control" style="background-color: honeydew;" id="u_desc"><?php echo $product_r["description"]; ?></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- END Description -->

                        <hr class="hrbreak1" />


                        <!-- START Product Image -->
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label lbl1">Add Product Image</label>
                                </div>

                                <?php
                                $img = Database::search("SELECT * FROM `images` WHERE `product_id` = '" . $product["id"] . "'");
                                $img_r = $img->num_rows;
                                $img_array;

                                for ($x = 0; $x < $img_r; $x++) {
                                    $img_fetch = $img->fetch_assoc();
                                    $img_array[$x] = $img_fetch["code"];
                                }

                                if (empty($img_array[0]) && ($img_array[1]) && empty($img_array[2])) {
                                ?>
                                    <img class="col-5 col-lg-2 ms-2 img-thumbnail" src="resources/addproductimg.svg" id="u_prev" />
                                    <img class="col-5 col-lg-2 ms-2 img-thumbnail" src="resources/addproductimg.svg" id="u_prev1" />
                                    <img class="col-5 col-lg-2 ms-2 img-thumbnail" src="resources/addproductimg.svg" id="u_prev2" />
                                <?php
                                } else {
                                ?>
                                    <img class="col-5 col-lg-2 ms-2 img-thumbnail" src="<?php echo $img_array[0]; ?>" id="u_prev" />
                                    <img class="col-5 col-lg-2 ms-2 img-thumbnail" src="<?php echo $img_array[1]; ?>" id="u_prev1" />
                                    <img class="col-5 col-lg-2 ms-2 img-thumbnail" src="<?php echo $img_array[2]; ?>" id="u_prev2" />
                                <?php
                                }

                                ?>


                                <div class="col-12">
                                    <div class="row mt-2">

                                        <div class="col-3 ms-1 ms-lg-2 col-lg-2 d-grid">
                                            <input class="d-none" type="file" accept="image/*" id="img1" />
                                            <label class="btn btn-primary " for="img1" onclick="u_changeImg();">Upload</label>
                                        </div>
                                        <div class="col-3 ms-1 ms-lg-2 col-lg-2 d-grid">
                                            <input class="d-none" type="file" accept="image/*" id="img2" />
                                            <label class="btn btn-primary " for="img2" onclick="u_changeImg1();">Upload</label>
                                        </div>
                                        <div class="col-3 ms-1 ms-lg-2 col-lg-2 d-grid">
                                            <input class="d-none" type="file" accept="image/*" id="img3" />
                                            <label class="btn btn-primary " for="img3" onclick="u_changeImg2();">Upload</label>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Product Image -->

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
                                <div class="offset-0 col-12 offset-lg-1 col-lg-4 d-grid ">
                                    <button class="btn btn-success searchbtn mb-3" onclick="updateProduct(<?php echo $product['id']; ?>);">Update Product</button>
                                </div>
                                <div class="offset-0 col-12 offset-lg-2 col-lg-4 d-grid ">
                                    <a href="sellerProductView.php" class="btn btn-danger searchbtn mb-3">Back To My Products</a>
                                </div>
                            </div>
                        </div>


                        <!-- END save btn -->
                    </div>

                    <!-- Footer -->
                    <?php
                    require "footer.php";
                    ?>
                    <!-- Footer -->

                </div>
            </div>











            <script src="other/script.js"></script>
            <!-- <script src="bootstrap.bundle.js"></script> -->
            <!-- Alerts -->
            <script src="js/all.js"></script>
            <script src="other/snackbar.min.js"></script>
        </body>

        </html>

<?php
    }
}else{
    ?>
    <script>
        window.location = "signinSignUp.php";
    </script>
<?php
}
?>