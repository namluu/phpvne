<article class="article-topstory">
    <?php
    $post = get_latest_post_one();
    $row = mysqli_fetch_array($post);
    if ($row): 
        $link = 'chi-tiet/'.$row['slug'].'-'.$row['id'].'.html';
        $postShowed[] = $row['id'];
    ?>
    <div class="thumb-art">
        <a href="<?= $link ?>" class="thumb thumb-5x3" title="<?= $row['title'] ?>">
            <img alt="<?= $row['title'] ?>" src="<?= $row['image'] ?>">
        </a>
    </div>
    <h3 class="title-news"><a href="<?= $link ?>"><?= $row['title'] ?></a></h3>
    <div class="description"><a href="<?= $link ?>"><?= $row['description'] ?></a></div>
    <p class="meta-news"><a href=""><?= $row['section_title'] ?></a></p>
    <?php endif; ?>
</article>

<div class="sub-news-top">
    <ul class="list-sub-feature">
        <?php
        $posts = get_latest_post_three();
        while ($row = mysqli_fetch_array($posts)) :
            $link = 'chi-tiet/'.$row['slug'].'-'.$row['id'].'.html';
            $postShowed[] = $row['id'];
        ?>
        <li>
            <h3 class="title-news"><a href="<?= $link ?>"><?= $row['title'] ?></a></h3>
            <div class="description"><a href="<?= $link ?>"><?= $row['description'] ?></a></div>
        </li>
        <?php endwhile; ?>
    </ul>
</div>