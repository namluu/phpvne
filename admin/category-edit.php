<?php require_once('header.php'); ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $row = load_category($id);
    $cat = mysqli_fetch_array($row);

    if (!$cat) {
        header('location:category-list.php');
    }

    if (isset($_POST['btnEdit'])) {
        $errors = validate_category_form();
        if (!$errors) {
            $data = prepare_category_data();
            update_category($data, $id);
            header('location:category-list.php');
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
            <td>Section</td>
            <td>
                <select name="section_id" id="">
                    <?php
                    $sections = get_sections();
                    while ($row = mysqli_fetch_array($sections)) :
                        ?>
                        <option value="<?= $row['id'] ?>" <?= ($row['id'] == $cat['section_id']) ? 'selected' : '' ?>><?= $row['title'] ?></option>
                    <?php endwhile; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Title</td>
            <td><input type="text" name="title" value="<?= $cat['title'] ?>"></td>
        </tr>
        <tr>
            <td>Sort</td>
            <td><input type="text" name="sort_order" value="<?= $cat['sort_order'] ?>"></td>
        </tr>
        <tr>
            <td>Active</td>
            <td>
                <select name="is_active">
                    <option value="1" <?= $cat['is_active'] == 1 ? 'selected' : '' ?>>Active</option>
                    <option value="0" <?= $cat['is_active'] == 0 ? 'selected' : '' ?>>Disable</option>
                </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="btnEdit">
                <a href="./category-list.php">Back</a>
            </td>
        </tr>
    </table>
</form>

<?php require_once('footer.php'); ?>