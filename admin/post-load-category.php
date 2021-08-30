<?php
ob_start();
session_start();

require_once('../lib/db_connection.php');
require_once('../lib/admin.php');

admin_handle();

$sectionId = (int)$_GET['section_id'];
$cats = get_categories_by_section($sectionId);
while ($row = mysqli_fetch_array($cats)) :
    ?>
    <option value="<?= $row['id'] ?>"><?= $row['title'] ?></option>
<?php endwhile; ?>
