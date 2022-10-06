<?php
require "connection.php";
$cat_id = $_GET["id"];


$brand_rs = Database::search("SELECT DISTINCT brand.id,brand.name FROM model_has_brand INNER JOIN brand ON brand.id=model_has_brand.brand_id INNER JOIN model ON model.id=model_has_brand.model_id INNER JOIN category_has_model_and_brand ON category_has_model_and_brand.model_has_brand_id=model_has_brand.id INNER JOIN category ON category.id=category_has_model_and_brand.category_id 
WHERE category_has_model_and_brand.category_id = '" . $cat_id . "';");
$brand_rows = $brand_rs->num_rows;
?>
<select onchange="brand_set();" class="form-select" id="br">
<option value="">Select Brand</option>
    <?php

    for ($x = 0; $x < $brand_rows; $x++) {
        $brand_d = $brand_rs->fetch_assoc();
        $brand_id = $brand_d["id"];
        $brand_name = $brand_d["name"];

    ?>
        <option value="<?php echo $brand_id; ?>"><?php echo $brand_name; ?></option>
    <?php
    }
    ?>

</select>
<?php


?>