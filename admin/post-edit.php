<?php require_once('header.php'); ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $row = load_post($id);
    $post = mysqli_fetch_array($row);

    if (!$post) {
        header('location:post-list.php');
    }

    if (isset($_POST['btnEdit'])) {
        $errors = validate_post_form();
        if (!$errors) {
            $data = prepare_post_data();
            update_post($data, $id);
            header('location:post-list.php');
        }
    }
} else {
    header('location:post-list.php');
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
                <td width="200">Section</td>
                <td>
                    <select name="section_id" id="section_id" required>
                        <option value="">Please select ...</option>
                        <?php
                        $sections = get_sections();
                        while ($row = mysqli_fetch_array($sections)) :
                            ?>
                            <option value="<?= $row['id'] ?>" <?= ($row['id'] == $post['section_id']) ? 'selected' : '' ?>><?= $row['title'] ?></option>
                        <?php endwhile; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Category</td>
                <td>
                    <select name="category_id" id="category_id">
                        <?php
                        $cats = get_categories();
                        while ($row = mysqli_fetch_array($cats)) :
                            ?>
                            <option value="<?= $row['id'] ?>" <?= ($row['id'] == $post['category_id']) ? 'selected' : '' ?>><?= $row['title'] ?></option>
                        <?php endwhile; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Title</td>
                <td><input type="text" name="title" value="<?= $post['title'] ?>" required></td>
            </tr>
            <tr>
                <td>Description</td>
                <td><textarea name="description" id="description" cols="100" rows="10" required><?= $post['description'] ?></textarea></td>
            </tr>
            <tr>
                <td>Image</td>
                <td><input type="text" name="image" id="image" value="<?= $post['image'] ?>">
                    <input onclick="BrowseServer('Images:/','image')" type="button" name="btnChonFile" id="btnChonFile" value="Chọn file" /></td>
            </tr>
            <tr>
                <td>Content</td>
                <td><textarea name="content" id="content" cols="100" rows="10"><?= $post['content'] ?></textarea></td>
            </tr>
            <tr>
                <td>Feature</td>
                <td>
                    <select name="is_feature">
                        <option value="0" <?= $post['is_feature'] == 0 ? 'selected' : '' ?>>No</option>
                        <option value="1" <?= $post['is_feature'] == 1 ? 'selected' : '' ?>>Yes</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Active</td>
                <td>
                    <select name="is_active">
                        <option value="1" <?= $post['is_active'] == 1 ? 'selected' : '' ?>>Active</option>
                        <option value="0" <?= $post['is_active'] == 0 ? 'selected' : '' ?>>Disable</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="btnEdit">
                    <a href="./post-list.php">Back</a>
                </td>
            </tr>
        </table>
    </form>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="ckfinder/ckfinder.js"></script>
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
    <script type="text/javascript">
var editor = CKEDITOR.replace( 'content',{
	uiColor : '#9AB8F3',
	language:'vi',
	skin:'v2',
	filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?Type=Images',
    filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?Type=Flash',
    filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
	toolbar:[
	['Source','-','Save','NewPage','Preview','-','Templates'],
	['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print'],
	['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
	['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'],
	['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
	['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
	['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
	['Link','Unlink','Anchor'],
	['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],
	['Styles','Format','Font','FontSize'],
	['TextColor','BGColor'],
	['Maximize', 'ShowBlocks','-','About']
	]
});
</script>
    <script type="text/javascript">
function BrowseServer( startupPath, functionData ){
	var finder = new CKFinder();
	finder.basePath = 'ckfinder/';
	finder.startupPath = startupPath;
	finder.selectActionFunction = SetFileField;
	finder.selectActionData = functionData;
	//finder.selectThumbnailActionFunction = ShowThumbnails;
	finder.popup();
} //BrowseServer

function SetFileField( fileUrl, data ){
	document.getElementById( data["selectActionData"] ).value = fileUrl;
}
function ShowThumbnails( fileUrl, data ){
	var sFileName = this.getSelectedFile().name; // this = CKFinderAPI
	document.getElementById( 'thumbnails' ).innerHTML +=
	'<div class="thumb">' +
	'<img src="' + fileUrl + '" />' +
	'<div class="caption">' +
	'<a href="' + data["fileUrl"] + '" target="_blank">' + sFileName + '</a> (' + data["fileSize"] + 'KB)' +
	'</div>' +
	'</div>';
	document.getElementById( 'preview' ).style.display = "";
	return false;
}
</script>
<?php require_once('footer.php'); ?>