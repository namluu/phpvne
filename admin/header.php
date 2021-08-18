<?php
ob_start();
session_start();

require_once('../lib/db_connection.php');
require_once('../lib/admin.php');

admin_handle();

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
        <td class="menu">
            <a href="./">Home</a>
            <a href="./list-section.php">Section</a>
            <a href="./list-category.php">Category</a>
            <a href="./list-post.php">Post</a>
            <a href="./list-banner.php">Banner</a>
        </td>
    </tr>
    <tr>
        <td>
