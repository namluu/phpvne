<?php
ob_start();
session_start();
if (isset($_POST['btnLogout'])) {
    unset($_SESSION['userId']);
    unset($_SESSION['username']);
    unset($_SESSION['name']);
    unset($_SESSION['group']);
}
if (!isset($_SESSION['userId']) || $_SESSION['group'] != 1) {
    header('location:../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="layout.css">
</head>
<body>

<table>
    <tr>
        <td class="title">
            <div>MANAGEMENT</div>
            <div class="user-panel">
                Hello <?= $_SESSION['name'] ?>
                <form action="" method="post" class="form_logout">
                    <button type="submit" name="btnLogout">Logout</button>
                </form>
            </div>
        </td>
    </tr>
    <tr>
        <td class="menu"><?php require_once 'menu.php'?></td>
    </tr>
    <tr>
        <td>

        </td>
    </tr>
</table>

</body>
</html>