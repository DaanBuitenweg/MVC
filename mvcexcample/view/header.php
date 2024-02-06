<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/style.css">

    <div class="header">
    <h1>My Website</h1>
    <p>A website created by me.</p>
    <?= isset($msg) ? "<div class='full-button'>".$msg."</div>" :NULL; ?>
    </div>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <?php include 'navbar.php'; ?>
</head>
<body>