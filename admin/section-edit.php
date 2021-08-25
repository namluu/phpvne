<?php require_once('header.php'); ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $row = load_section($id);
    $section = mysqli_fetch_array($row);

    if (!$section) {
        header('location:section-list.php');
    }

    if (isset($_POST['btnEdit'])) {
        $errors = validate_section_form();
        if (!$errors) {
            $data = prepare_section_data();
            update_section($data, $id);
            header('location:section-list.php');
        }
    }
}
?>

<h1>Sửa thể loại</h1>

<form action="" method="post">
    <?php if (isset($errors) && is_array($errors)): ?>
    <ul style="color: red">
        <?php foreach ($errors as $error): ?>
        <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>
    <?php endif ?>
    <table>
        <tr>
            <td>Title</td>
            <td><input type="text" name="title" value="<?= $section['title'] ?>"></td>
        </tr>
        <tr>
            <td>Sort</td>
            <td><input type="text" name="sort_order" value="<?= $section['sort_order'] ?>"></td>
        </tr>
        <tr>
            <td>Active</td>
            <td>
                <select name="is_active">
                    <option value="1" <?= $section['is_active'] == 1 ? 'selected' : '' ?>>Active</option>
                    <option value="0" <?= $section['is_active'] == 0 ? 'selected' : '' ?>>Disable</option>
                </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="btnEdit">
                <a href="./section-list.php">Back</a>
            </td>
        </tr>
    </table>
</form>

<?php require_once('footer.php'); ?>