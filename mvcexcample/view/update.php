<?php

require 'header.php';
?>
<div class="row">
    <?php
    require 'sidebar.php';
    ?>
    <div class="main">
        <form method="POST" action="<?= $operation?>">
        <label for="name">name:</label><br>
        <input type="text" id="name" name="name" value="<?php echo $name?>"required><br>
        <label for="phone">phone:</label><br>
        <input type="text" id="phone" name="phone" value="<?php echo $phone?>"required><br>
        <label for="email">email:</label><br>
        <input type="text" id="email" name="email" value="<?php echo $email?>"required><br>
        <label for="adres">adres:</label><br>
        <input type="text" id="adres" name="adres" value="<?php echo $adres?>"required><br>
        <input type="submit" name="submit" value="submit">
        </form>
    </div>
</div>

<?php require 'footer.php'; ?>