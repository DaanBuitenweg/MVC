<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <INPUT type="checkbox" onchange="checkAll(this)" name="chk[]" />
        <label for="deleteSelect1">select all</label><br>
        <input type="checkbox" name="chk[]" id="deleteSelect" value ="2">
        <label for="deleteSelect2">checkbox 2</label><br>
        <input type="checkbox" name="chk[]" id="deleteSelect" value="3">
        <label for="deleteSelect3">checkbox 3</label><br>
        <input type="checkbox" name="chk[]" id="deleteSelect" value="4">
        <label for="deleteSelect4">checkbox 4</label><br>
        <input type="checkbox" name="chk[]" id="deleteSelect" value="5">
        <label for="deleteSelect5">checkbox 5</label><br>
        <input type="submit" value="submit" name="submit">
    </form>

    <script type="text/javascript">
         function checkAll(ele) {
            var checkboxes = document.getElementsByTagName('input');
            if (ele.checked) {
                for (var i = 0; i < checkboxes.length; i++) {
                    if (checkboxes[i].type == 'checkbox') {
                        checkboxes[i].checked = true;
                    }
                }
            } else {
                for (var i = 0; i < checkboxes.length; i++) {
                    console.log(i)
                    if (checkboxes[i].type == 'checkbox') {
                        checkboxes[i].checked = false;
                    }
                }
            }
        }
    </script>

    <?php
    // if(isset($_POST['submit'])) {
    //     var_dump($_POST);
    // }
    ?>
</body>
</html> -->

<!-- <!DOCTYPE html>
<html>
<body>
<form action="" method="post">
  <label for="date1">date:</label>
  <input type="date" id="date1" name="date1"><br>

  <label for="date2">date:</label>
  <input type="date" id="date2" name="date2"><br>
  <input type="submit" value="Submit" name="Submit">
</form>

</body>
</html>

<?php
// if(isset($_POST['Submit'])) {
//     var_dump($_POST);
// }

?> -->

<?php

$list = array (array('een' => 'aaa', 'twee' => 'bbb', 'drie' => 'ccc', 'vier' => 'dddd'),);

$fp = fopen('file.csv', 'w');

foreach ($list as $fields) {
    fputcsv($fp, $fields);
}

fclose($fp);

$file = 'file.csv';

if (file_exists($file)) {
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    readfile($file);
    exit;
}