<section class="section_topstory">
    <div class="container flexbox">
        <div class="col-left-top">
            <?php require_once('blocks/top_story.php'); ?>
        </div>
        <div class="col-right-top">
            <?php require_once('blocks/banner_ads.php'); ?>
        </div>
    </div>
</section>

<section class="section_stream_home">
    <div class="container flexbox has_border">
        <div class="col-left">
            <?php
            $posts = get_most_view_posts();
            while ($row = mysqli_fetch_array($posts)) : 
                $link = 'index.php?p=post&id='.$row['id'];
            ?>
            <article class="item-news item-news-common">
                <h3 class="title-news"><a href=""><?= $row['title'] ?></a></h3>
                <div class="thumb-art">
                    <a href="" class="" title="">
                    <picture>
                        <img alt="" class="g" src="upload/<?= $row['image'] ?>">
                    </picture> </a>
                </div>
                <p class="description"><a href=""><?= $row['description'] ?></a></p>
            </article>
            <?php endwhile; ?>
        </div>
        <div class="col-right">
            <div class="box-category">
                <hgroup class="title-box-category">
                    <h2 class="parent-cate"><a href="">Kinh doanh</a></h2>
                    <span class="sub-cate"><a href="">Quốc tế</a></span>
                    <span class="sub-cate"><a href="">Doanh nghiệp</a></span>
                </hgroup>
                <div class="content-box-category">
                    <article class="item-news full-thumb flexbox"></article>
                    <article class="item-news article-sub-right"></article>
                    <div class="sub-news-cate"></div>
                </div>
            </div>
        </div>
    </div>
</section>