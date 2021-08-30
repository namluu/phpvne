<?php require_once('header.php'); ?>

<h1>Danh sách bài viết</h1>
<a href="./post-add.php">Add new</a>
<table class="tb-content">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Image</th>
        <th>Category</th>
        <th>Section</th>
        <th>Created</th>
        <th>View</th>
        <th>Feature</th>
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
        <td><strong>{title}</strong><br><br><small>{description}</small></td>
        <td><img src="../upload/{image}" alt="" width="150"></td>
        <td>{category_name}</td>
        <td>{section_name}</td>
        <td>{created}</td>
        <td>{view_count}</td>
        <td>{is_feature}</td>
        <td>{is_active}</td>
        <td><a href="post-edit.php?id={id}">Edit</a> | <a href="post-delete.php?id={id}" onclick="return !!confirm('Delete this item?');">Delete</a></td>
    </tr>
    <?php
        $s = ob_get_clean();
        $s = str_replace('{id}', $row['id'], $s);
        $s = str_replace('{title}', $row['title'], $s);
        $s = str_replace('{description}', $row['description'], $s);
        $s = str_replace('{image}', $row['image'], $s);
        $s = str_replace('{category_name}', $row['category_name'], $s);
        $s = str_replace('{section_name}', $row['section_name'], $s);
        $s = str_replace('{created}', $row['created'], $s);
        $s = str_replace('{view_count}', $row['view_count'], $s);
        $s = str_replace('{is_feature}', $row['is_feature'], $s);
        $s = str_replace('{is_active}', $row['is_active'], $s);
        echo $s;
    endwhile;
    ?>
</table>

<?php require_once('footer.php'); ?>