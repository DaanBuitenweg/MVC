<?php require 'header.php';?>

<div class="row">
    <?php require 'sidebar.php'; ?>
    <div class="main">
      <form method="POST">
        <label for="name">name:</label><br>
        <input type="text" id="name" name="name" value=""required><br>
        <label for="phone">phone:</label><br>
        <input type="text" id="phone" name="phone" value=""required><br>
        <label for="email">email:</label><br>
        <input type="text" id="email" name="email" value=""required><br>
        <label for="adres">adres:</label><br>
        <input type="text" id="adres" name="adres" value=""required><br>
        <input type="submit" name="submit" value="submit">
      </form>
    </div>
</div>


<?php require 'footer.php'; ?>