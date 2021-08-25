<?php require_once('header.php'); ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $row = load_section($id);
    $section = mysqli_fetch_array($row);
    if ($section) {
        delete_section($id);
    }
}
header('location:section-list.php');
?>