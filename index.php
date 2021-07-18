<?php
require_once('lib/db_connection.php');
if (isset($_GET['p'])) {
    $p = $_GET['p'];
} else {
    $p = '';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <header class="top-header">
        <div class="container">
            <h1><a href=""><img src="images/logo.svg" alt="VnExpress - Bao tieng Viet nhieu nguoi xem nhat"></a></h1>
        </div>
    </header>

    <?php require_once('blocks/menu.php'); ?>

    <?php
    switch ($p) {
        case 'category': require_once('pages/category.php'); break;
        case 'post': require_once('pages/post.php'); break;
        default: require_once('pages/home.php');
    }
    ?>
    
    <?php require_once('blocks/box_business.php'); ?>

    <?php require_once('blocks/footer.php'); ?>
    
</body>
</html>