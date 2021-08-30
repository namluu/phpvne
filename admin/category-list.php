<?php require_once('header.php'); ?>

<h1>Danh sách danh mục</h1>
<a href="./category-add.php">Add new</a>
<table class="tb-content">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Slug</th>
        <th>Section</th>
        <th>Sort</th>
        <th>Active</th>
        <th>Action</th>
    </tr>
    <?php
    $cats = get_categories();
    while ($row = mysqli_fetch_array($cats)) :
        ob_start();
    ?>
    <tr>
        <td>{id}</td>
        <td>{title}</td>
        <td>{slug}</td>
        <td>{section_name}</td>
        <td>{sort_order}</td>
        <td>{is_active}</td>
        <td><a href="category-edit.php?id={id}">Edit</a> | <a href="category-delete.php?id={id}" onclick="return !!confirm('Delete this item?');">Delete</a></td>
    </tr>
    <?php
        $s = ob_get_clean();
        $s = str_replace('{id}', $row['id'], $s);
        $s = str_replace('{title}', $row['title'], $s);
        $s = str_replace('{slug}', $row['slug'], $s);
        $s = str_replace('{section_name}', $row['section_name'], $s);
        $s = str_replace('{sort_order}', $row['sort_order'], $s);
        $s = str_replace('{is_active}', $row['is_active'], $s);
        echo $s;
    endwhile;
    ?>
</table>

<?php require_once('footer.php'); ?>