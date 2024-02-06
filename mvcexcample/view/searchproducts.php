<?php

require 'header.php';
?>
<div class="row">
    <?php
    require 'sidebar.php';
    ?>
    <div class="main">
    <a href="index.php?act=products&op=create"><button>create new product</button></a>
    <form action="index.php?act=products&op=search" method="post">
    <input type="text" id="search" name="search" value="" placeholder="search">
    <input type="submit" name="submit" value="search">
    </form>
    <?php
    echo $products;

    ?>
    </div>
</div>
<?php require 'footer.php'; ?>