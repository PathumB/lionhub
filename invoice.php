<?php

session_start();

require "connection.php";

if (isset($_SESSION["u"])) {
    $umail = $_SESSION["u"]["email"];

    if (isset($_GET["id"])) {

        $oid = $_GET["id"];





?>

        <!DOCTYPE html>

        <html>

        <head>

            <title>LION HUB | Invoice</title>

            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale-1">

            <link href="other/icon.png" rel="icon">
            <link rel="stylesheet" href="other/bootstrap.css" />
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
            <link rel="stylesheet" href="invoice.css" />

        </head>

        <body class="mt-2" style="background-color: white;">


            <div class="container-fluid">
                <div class="row">






                    <script>
                        function createPDF() {
                            var element = document.getElementById('element-to-print');
                            html2pdf(element, {
                                margin: 1,
                                padding: 0,
                                filename: 'LION HUB invoice.pdf',
                                image: {
                                    type: 'jpeg',
                                    quality: 1
                                },
                                html2canvas: {
                                    scale: 2,
                                    logging: true
                                },
                                jsPDF: {
                                    unit: 'in',
                                    format: 'A2',
                                    orientation: 'P'
                                },
                                class: createPDF
                            });
                        };
                    </script>
                    <div id="element-to-print">
                        <div class="col-12">
                            <hr />
                        </div>

                        <div id="GFG">

                            <div class="col-12">
                                <div class="row">

                                    <div class="col-6">
                                        <div class="row">

                                            <img style="width: 150px; height: auto;" src="other/icon.png" alt="">

                                        </div>
                                    </div>


                                    <div class="col-6">
                                        <div class="row">

                                            <div class="col-12">
                                                <div class="invoiceheaderimg"></div>
                                            </div>

                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-12 text-end  text-danger">
                                                        <h5>LION HUB</h5>
                                                    </div>
                                                    <div class="col-12 text-end fw-bold">
                                                        <span>9th mile post, Udawaththakumbura, Hanguranketha</span><br>
                                                        <span>+94728125203</span><br>
                                                        <span>pathumbandara@gmail.com</span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>




                                </div>
                            </div>

                            <div class="col-12">
                                <hr class="border border-1 border-primary" />
                            </div>


                            <div class="col-12 mb-4">
                                <div class="row">

                                    <div class="col-6">
                                        <h6>INVOICE TO :</h6>
                                        <?php

                                        $addressrs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email` = '" . $umail . "'");
                                        $ar = $addressrs->fetch_assoc();

                                        ?>
                                        <h2><?php echo $_SESSION["u"]["fname"] . " " . $_SESSION["u"]["lname"]; ?></h2>
                                        <span class="fw-bold"><?php echo $ar["line1"] . "," . $ar["line2"]; ?></span>
                                        <br>
                                        <span class="fw-bold"><?php echo $umail; ?></span>
                                    </div>

                                    <?php

                                    $invoicers = Database::search("SELECT * FROM `invoice` WHERE `order_id` = '" . $oid . "'");
                                    $in = $invoicers->num_rows;

                                    ?>

                                    <div class="col-6 text-end mt-4">
                                        <?php
                                        // for ($x = 0; $x < $in; $x++) {
                                        $ir = $invoicers->fetch_assoc();
                                        ?>
                                        <h1 class="text-primary">INVOICE 0<?php echo $ir["id"]; ?></h1>
                                        <span class="fw-bold">Date and Time of Invoice :</span>&nbsp;
                                        <span class="fw-bold"><?php echo $ir["date"] ?></span>
                                        <?php
                                        // }
                                        ?>

                                    </div>

                                </div>
                            </div>


                            <div style="overflow-x: scroll;" class="col-12">
                                <table class="table">
                                    <thead>
                                        <tr class="text-center border border-1 border-white">
                                            <th>#</th>
                                            <th>Order ID</th>
                                            <th>Product</th>
                                            <th class="text-center">Unit Price</th>
                                            <th class="text-center">Quantity</th>
                                            <th class="text-center">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $invoices = Database::search("SELECT * FROM `invoice` WHERE `order_id` = '" . $oid . "'");
                                        $ind = $invoices->num_rows;

                                        $subtotal = "0";

                                        for ($i = 0; $i < $ind; $i++) {
                                            $irs = $invoices->fetch_assoc();
                                            $pid = $irs["product_id"];

                                            $subtotal = $subtotal + $irs["total"];

                                            $productrs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $pid . "'");
                                            $pr = $productrs->fetch_assoc();
                                        ?>
                                            <tr class="text-center" style="height: 70px;">
                                                <td class="bg-dark text-white fs-3 text-center "><?php echo $irs["id"]; ?></td>
                                                <td style="background-color: rgb(199, 199, 199);">
                                                    <a class="fs-6 fw-bold text-danger text-center text-decoration-none pt-3"><?php echo $irs["order_id"]; ?></a>
                                                </td>
                                                <td style="background-color: rgb(199, 199, 199);">
                                                    <a class="fs-6 fw-bold  text-center text-decoration-none pt-3"><?php echo $pr["title"]; ?></a>
                                                </td>
                                                <td class="fs6 text-center  pt-3" style="background-color: rgb(199, 199, 199);">Rs.<?php echo $pr["price"]; ?>.00</td>
                                                <td class="fs6 text-center pt-3" style="background-color: rgb(199, 199, 199);"><?php echo $irs["qty"]; ?></td>
                                                <td class="fs6 text-center pt-3 bg-dark text-white" style="background-color: rgb(199, 199, 199);">Rs.<?php echo $irs["total"]; ?>.00</td>
                                            </tr>
                                        <?php
                                        }

                                        ?>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="3" class="border-0"></td>
                                            <td colspan="2" class="fs-5 text-end">SUBTOTAL</td>
                                            <td class="fs-5 text-end">Rs.<?php echo $subtotal; ?>.00</td>
                                        </tr>
                                        <!-- <tr>
                                    <td colspan="2" class="border-0"></td>
                                    <td colspan="2" class="fs-5 text-end border-primary">Discount</td>
                                    <td class="fs-5 text-end border-primary">Rs.00.00</td>
                                </tr> -->
                                        <tr>
                                            <td colspan="3" class="border-0"></td>
                                            <td colspan="2" class="fs-4 text-end border-0 text-primary">GRAND TOTAL</td>
                                            <td class="fs-5 text-end border-0 text-primary">Rs.<?php echo $subtotal; ?>.00</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>




                            <div class="col-12 mt-3 mb-3 border border-start border-end-0 border-top-0 border-bottom-0 border-5 border-primary rounded" style="background-color: #e7f2ff;">
                                <div class="row">
                                    <div class="col-12 mt-3 mb-3">
                                        <label class="form-label fs-5 fw-bold"></label>
                                        <label class="form-label fs-6">Thank you for purchasing electronic items from us.</label>
                                    </div>
                                </div>
                            </div>




                            <div class="col-12">
                                <hr class="border border-1 border-primary" />
                            </div>



                            <div class="col-12 mb-3 text-center">
                                <label class="form-label fs-6 text-black-50">Invoice was created on a computer and is valid without the Signature and Seal.</label>
                            </div>



                        </div>
                    </div>
                    <div class="col-12 btn-toolbar justify-content-end">


                    </div>

                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 offset-0 col-md-2 offset-lg-3 mb-5 d-grid">
                                <button class="btn btn-primary me-2" onclick="printDiv();"><i class="bi bi-printer-fill"></i>&nbsp;&nbsp;Print</button>
                            </div>
                            <div class="col-12 offset-0 col-md-2 mb-5 d-grid">
                                <a href="index.php" class="btn btn-dark">Back To Home</a>
                            </div>
                            <div class="col-12 offset-0 col-md-2  mb-5 d-grid">
                                <button class="btn btn-danger me-2 html2PdfConverter" onclick="createPDF()"><i class="bi bi-file-earmark-pdf-fill"></i>&nbsp;&nbsp;&nbsp;&nbsp;Save as PDF</button>
                            </div>
                        </div>
                    </div>


                    <div id="editor"></div>


                </div>
            </div>


            <script src="js/all.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.1/html2pdf.bundle.min.js"></script>
        </body>

        </html>
    <?php
    } else {
    ?>
        <script>
            window.location = "product.php";
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