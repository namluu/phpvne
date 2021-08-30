<?php require_once('header.php'); ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $row = load_category($id);
    $cat = mysqli_fetch_array($row);
    if ($cat) {
        delete_category($id);
    }
}
header('location:category-list.php');
?>