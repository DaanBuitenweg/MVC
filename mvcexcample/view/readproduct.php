<?php require 'header.php';?>

<div class="row">
    <?php require 'sidebar.php'; ?>
    <div class="main">
        <ul>
            <li>id: <?= $products['product_id']; ?></li>
            <li>type code: <?= $products['product_type_code']; ?></li>
            <li>supplier: <?= $products['supplier_id']; ?></li>
            <li>name: <?= $products['product_name']; ?></li>
            <li>price: <?= $products['product_price']; ?></li>
            <li>details: <?= $products['other_product_details']; ?></li>
        </ul>
    </div>
</div>


<?php require 'footer.php'; ?>