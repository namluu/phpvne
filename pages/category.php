<?php
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $row = load_category($id);
    $cat = mysqli_fetch_array($row);

    if (!$cat) {
        header('location:index.php');
    }
} else {
    header('location:index.php');
}
?>
<section class="section_page-list">
    <div class="container flexbox has_border">
        <div class="col-main">
            <?php
            $posts = load_post_by_category($cat['id']);
            while ($post = mysqli_fetch_array($posts)) :
                $link = 'index.php?p=post&id='.$post['id'];
                ?>
                <article class="item-news">
                    <div class="thumb-art">
                        <a href="<?= $link ?>" title="<?= $post['title'] ?>">
                            <picture>
                                <img itemprop="contentUrl" alt="<?= $post['title'] ?>" src="<?= $post['image'] ?>">
                            </picture>
                        </a>
                    </div>
                    <h3 class="title_news"><a href=""><?= $post['title'] ?></a></h3>
                    <p class="description"><a href=""><?= $post['description'] ?></a></p>
                </article>
            <?php endwhile; ?>
        </div>
        <div class="col-sub">

        </div>
    </div>
</section>