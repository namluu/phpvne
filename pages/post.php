<?php
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $row = load_post($id);
    $post = mysqli_fetch_array($row);

    if (!$post) {
        header('location:index.php');
    }
} else {
    header('location:index.php');
}
?>
<section class="section_page-detail">
    <div class="container flexbox">
        <div class="col-main">
            <div class="header-content">
                <a href=""><?= $post['section_name'] ?></a> / <a href=""><?= $post['category_name'] ?></a>
                <span class="date"><?= $post['created'] ?></span>
            </div>
            <h1 class="title-detail"><?= $post['title'] ?></h1>
            <p class="description"><?= $post['description'] ?></p>
            <article><?= $post['content'] ?></article>
        </div>
        <div class="col-sub">
            <h2 class="parent-cate"><a href="" class="inner-title">Xem nhiều</a></h2>
        </div>
    </div>
</section>