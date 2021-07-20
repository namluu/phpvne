<article class="article-topstory">
    <?php 
    $post = get_latest_post_one();
    $row = mysqli_fetch_array($post);
    if ($row): 
        $link = 'index.php?p=post&id='.$row['id'];
    ?>
    <div class="thumb-art">
        <a href="<?= $link ?>" class="thumb thumb-5x3" title="<?= $row['title'] ?>">
            <img alt="<?= $row['title'] ?>" src="upload/<?= $row['image'] ?>">
        </a>
    </div>
    <h3 class="title-news"><a href="<?= $link ?>"><?= $row['title'] ?></a></h3>
    <div class="description"><a href="<?= $link ?>"><?= $row['description'] ?></a></div>
    <p class="meta-news"><a href="">Sức khỏe</a> <a href="">187</a></p>
    <?php endif; ?>
</article>
<div class="sub-news-top">
    <ul class="list-sub-feature">
        <?php
        $posts = get_latest_post_three();
        while ($row = mysqli_fetch_array($posts)) : 
            $link = 'index.php?p=post&id='.$row['id'];
        ?>
        <li>
            <h3 class="title-news"><a href="<?= $link ?>"><?= $row['title'] ?></a></h3>
            <div class="description"><a href="<?= $link ?>"><?= $row['description'] ?></a></div>
        </li>
        <?php endwhile; ?>
    </ul>
</div>