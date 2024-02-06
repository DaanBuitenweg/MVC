<?php require 'header.php';?>

<div class="row">
    <?php require 'sidebar.php'; ?>
    <div class="main">
        <ul>
            <li>id: <?= $contacts['id']; ?></li>
            <li>name: <?= $contacts['name']; ?></li>
            <li>phone: <?= $contacts['phone']; ?></li>
            <li>email: <?= $contacts['email']; ?></li>
            <li>adres: <?= $contacts['address']; ?></li>
        </ul>
    </div>
</div>


<?php require 'footer.php'; ?>