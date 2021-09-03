<?php require_once('header.php'); ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $row = load_post($id);
    $post = mysqli_fetch_array($row);
    if ($post) {
        delete_post($id);
    }
}
header('location:post-list.php');
?>