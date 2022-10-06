<?php
// require "connection.php";

// $brand_id = $_GET["id"];

// $model = Database::search("SELECT model_has_brand.id AS `mb_id`, model_has_brand.model_id, model_has_brand.brand_id, model.id AS `mid`, model.name AS `m_name`, brand.id AS `bid`, brand.name AS `b_name`  
// FROM `model_has_brand` 
// INNER JOIN model ON `model_has_brand`.`model_id` = `model`.`id` 
// INNER JOIN brand ON model_has_brand.brand_id = brand.id 
// WHERE brand.`id` = '".$brand_id."' ;");

// $model_fetch = $model->fetch_assoc();

// echo $model_fetch["mid"];

?>

<?php
require "connection.php";
$cat_id = $_GET["cid"];
$brand_id_eka = $_GET["id"];
// echo $model_id_eka;


$model = Database::search("SELECT model_has_brand.id AS `mb_id`, model_has_brand.model_id, model_has_brand.brand_id, model.id AS `mid`, model.name AS `m_name`, brand.id AS `bid`, brand.name AS `b_name`  
FROM `model_has_brand` 
INNER JOIN model ON `model_has_brand`.`model_id` = `model`.`id` 
INNER JOIN brand ON model_has_brand.brand_id = brand.id 
INNER JOIN category_has_model_and_brand ON category_has_model_and_brand.model_has_brand_id=model_has_brand.id
WHERE brand.`id` = '".$brand_id_eka."' AND category_has_model_and_brand.category_id = '" . $cat_id . "' ;");

$model_rows = $model->num_rows;
?>
<select  class="form-select" id="mo">
<option value="0">Select Model</option>
    <?php

    for ($x = 0; $x < $model_rows; $x++) {
        $model_d = $model->fetch_assoc();
        $model_id = $model_d["mid"];
        $model_name = $model_d["m_name"];

    ?>
        <option value="<?php echo $model_id; ?>"><?php echo $model_name; ?></option>
    <?php
    }
    ?>

</select>
<?php


?>