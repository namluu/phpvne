<?php
session_start();
require_once('lib/db_connection.php');
require_once('lib/frontend.php');
require_once('lib/user.php');

if (isset($_GET['p'])) {
    $p = $_GET['p'];
} else {
    $p = '';
}

user_handle();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <base href="http://phpvne.local/" />
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />
</head>
<body>
    <header class="top-header">
        <div class="container">
            <h1 class="logo"><a href="./"><img src="images/logo.svg" alt="VnExpress - Bao tieng Viet nhieu nguoi xem nhat"></a></h1>
            <div class="right">
                <?php
                if (isset($_SESSION['userId']))
                    require_once('blocks/form_hello.php');
                else
                    require_once('blocks/form_login.php');
                ?>
            </div>
        </div>
    </header>

    <?php require_once('blocks/menu.php'); ?>

    <?php
    switch ($p) {
        case 'section': require_once('pages/section.php'); break;
        case 'category': require_once('pages/category.php'); break;
        case 'post': require_once('pages/post.php'); break;
        default: require_once('pages/home.php');
    }
    ?>
    
    <?php require_once('blocks/box_business.php'); ?>

    <?php require_once('blocks/footer.php'); ?>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
    <script type="text/javascript" src="js/ddsmoothmenu.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>