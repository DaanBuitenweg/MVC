<?php

require 'header.php';
?>
<div class="row">
    <?php
    require 'sidebar.php';
    ?>
    <div class="main">
        <form method="POST" action="<?= $operation?>">
        <label for="product_type_code">type:</label><br>
        <input type="text" id="product_type_code" name="product_type_code" value="<?php echo $type?>"required><br>
        <label for="supplier_id">supplier:</label><br>
        <input type="text" id="supplier_id" name="supplier_id" value="<?php echo $supplier?>"required><br>
        <label for="product_name">name:</label><br>
        <input type="text" id="product_name" name="product_name" value="<?php echo $name?>"required><br>
        <label for="product_price">price:</label><br>
        <input type="text" id="product_price" name="product_price" value="<?php echo $price?>"required><br>
        <label for="other_product_details">details:</label><br>
        <input type="text" id="other_product_details" name="other_product_details" value="<?php echo $details?>"required><br>
        <input type="submit" name="submit" value="submit">
        </form>
    </div>
</div>

<?php require 'footer.php'; ?>