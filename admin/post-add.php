<?php require_once('header.php'); ?>

<?php
if (isset($_POST['btnAdd'])) {
    $errors = validate_post_form();
    if (!$errors) {
        $data = prepare_post_data();
        add_post($data);
        header('location:post-list.php');
    }
}
?>

<h1>Thêm bài viết</h1>

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
                <select name="section_id" id="section_id">
                    <option value="0">Please select ...</option>
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
            <td>Category</td>
            <td>
                <select name="category_id" id="category_id">
                </select>
            </td>
        </tr>
        <tr>
            <td>Title</td>
            <td><input type="text" name="title"></td>
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
                <a href="./post-list.php">Back</a>
            </td>
        </tr>
    </table>
</form>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        $("#section_id").change(function(){
            var id = $(this).val()
            $.get("./post-load-category.php", {section_id: id}, function(data) {
                $("#category_id").html(data);
            });
        });
    });
    </script>
<?php require_once('footer.php'); ?>