<?php require_once('header.php'); ?>

<?php
if (isset($_POST['btnAdd'])) {
    $errors = validate_category_form();
    if (!$errors) {
        $data = prepare_category_data();
        add_category($data);
        header('location:category-list.php');
    }
}
?>

<h1>Thêm danh mục</h1>

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
                    <option value="<?= $row['id'] ?>"><?= $row['title'] ?></option>
                    <?php endwhile; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Title</td>
            <td><input type="text" name="title"></td>
        </tr>
        <tr>
            <td>Sort</td>
            <td><input type="text" name="sort_order"></td>
        </tr>
        <tr>
            <td>Active</td>
            <td>
                <select name="is_active">
                    <option value="1">Active</option>
                    <option value="0">Disable</option>
                </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="btnAdd">
                <a href="./category-list.php">Back</a>
            </td>
        </tr>
    </table>
</form>

<?php require_once('footer.php'); ?>