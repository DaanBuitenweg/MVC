<?php

require 'header.php';
?>
<div class="row">
    <?php
    require 'sidebar.php';
    ?>
    <div class="main">
    <a href="index.php?op=create"> <button>create new contact</button> </a>

    <form method="POST" action="index.php?&op=search">
        <input type="text" id="search" name="search" placeholder="search">
        <input type="submit" name="submit" value="search">
    </form>
    <a href="index.php?op=createJSON"> <button>export to json</button> </a>
    <?php
    echo $result;

    ?>
    </div>
</div>
<?php require 'footer.php'; ?>