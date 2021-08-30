<?php require_once('header.php'); ?>

<h1>Danh sách bài viết</h1>
<a href="./post-add.php">Add new</a>
<table class="tb-content">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Category</th>
        <th>Section</th>
        <th>Created</th>
        <th>Active</th>
        <th>Action</th>
    </tr>
    <?php
    $posts = get_posts();
    while ($row = mysqli_fetch_array($posts)) :
        ob_start();
    ?>
    <tr>
        <td>{id}</td>
        <td>{title}</td>
        <td>{category_name}</td>
        <td>{section_name}</td>
        <td>{created}</td>
        <td>{is_active}</td>
        <td><a href="post-edit.php?id={id}">Edit</a> | <a href="post-delete.php?id={id}">Delete</a></td>
    </tr>
    <?php
        $s = ob_get_clean();
        $s = str_replace('{id}', $row['id'], $s);
        $s = str_replace('{title}', $row['title'], $s);
        $s = str_replace('{category_name}', $row['category_name'], $s);
        $s = str_replace('{section_name}', $row['section_name'], $s);
        $s = str_replace('{created}', $row['created'], $s);
        $s = str_replace('{is_active}', $row['is_active'], $s);
        echo $s;
    endwhile;
    ?>
</table>

<?php require_once('footer.php'); ?>