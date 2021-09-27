<?php
$postShowed = []; // we make sure only show a post one time
?>

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
        <div class="col-sub">
            <?php
            $posts = get_most_view_posts();
            while ($row = mysqli_fetch_array($posts)) :
                $link = 'chi-tiet/'.$row['slug'].'-'.$row['id'].'.html';
                $postShowed[] = $row['id'];
            ?>
            <article class="item-news item-news-common">
                <h3 class="title-news"><a href="<?= $link ?>"><?= $row['title'] ?></a></h3>
                <div class="thumb-art">
                    <a href="<?= $link ?>" class="" title="">
                    <picture>
                        <img alt="" class="g" src="<?= $row['image'] ?>">
                    </picture> </a>
                </div>
                <p class="description"><a href="<?= $link ?>"><?= $row['description'] ?></a></p>
            </article>
            <?php endwhile; ?>
        </div>
        <div class="col-main">
        <?php
            $sections = get_sections();
            while ($row = mysqli_fetch_array($sections)) : 
                #$link = 'index.php?p=section&id='.$row['id'];
                $link = 'the-loai/'.$row['slug'].'-'.$row['id'].'.html';
            ?>
            <div class="box-category">
                <hgroup class="title-box-category">
                    <h2 class="parent-cate"><a href="<?= $link ?>" class="inner-title"><?= $row['title'] ?></a></h2>
                    <?php
                    $categories = get_categories_by_section($row['id']);
                    while ($cat = mysqli_fetch_array($categories)) : 
                        #$link = 'index.php?p=category&id='.$cat['id'];
                        $link = 'danh-muc/'.$cat['slug'].'-'.$cat['id'].'.html';
                    ?>
                    <span class="sub-cate"><a href="<?= $link ?>"><?= $cat['title'] ?></a></span>
                    <?php endwhile; ?>
                </hgroup>
                <div class="content-box-category">
                    <?php 
                    $post = get_latest_post_by_section($row['id']);
                    $first = mysqli_fetch_array($post);
                    if ($first):
                        $link = 'chi-tiet/'.$first['slug'].'-'.$first['id'].'.html';
                    ?>
                    <article class="item-news full-thumb flexbox">
                        <div class="thumb-art">
                            <a href="<?= $link ?>" title="<?= $first['title'] ?>">
                                <picture>
                                    <img alt="<?= $first['title'] ?>" src="<?= $first['image'] ?>">
                                </picture>
                            </a>
                        </div>
                        <div class="wrap-sum-news">
                            <h3 class="title-news"><a href="<?= $link ?>" title="<?= $first['title'] ?>"><?= $first['title'] ?></a></h3>
                            <p class="description">
                                <a href="<?= $link ?>" title="<?= $first['title'] ?>">
                                    <?= $first['description'] ?>
                                </a>
                                <span class="meta-news">
                                    <a class="count_cmt" href="<?= $link ?>" style="white-space: nowrap; display: none;">
                                        <svg class="ic ic-comment"><use xlink:href="#Comment-Reg"></use></svg>
                                        <span class="font_icon widget-comment-4328974-1"></span>
                                    </a>
                                </span>
                            </p>
                        </div>
                    </article>
                    <?php endif; ?>
                    <?php 
                    $post = get_second_post_by_section($row['id']);
                    $second = mysqli_fetch_array($post);
                    if ($second):
                        $link = 'chi-tiet/'.$second['slug'].'-'.$second['id'].'.html';
                    ?>
                    <article class="article-sub-right">
                        <h3 class="title-news"><a href="<?= $link ?>"><?= $second['title'] ?></a></h3>
                        <p class="description">
                            <a href="<?= $link ?>" title="<?= $second['title'] ?>" data-itm-added="1">
                                <?= $second['description'] ?>
                            </a>
                            <span class="meta-news">
                                <a class="count_cmt" href="<?= $link ?>" style="white-space: nowrap; display: none;">
                                    <svg class="ic ic-comment"><use xlink:href="#Comment-Reg"></use></svg>
                                    <span class="font_icon widget-comment-4328905-1">2</span>
                                </a>
                            </span>
                        </p>
                    </article>
                    <?php endif; ?>
                    <div class="sub-news-cate flexbox">
                    <?php
                        $posts = get_three_post_by_section($row['id']);
                        while ($row = mysqli_fetch_array($posts)) :
                            $link = 'chi-tiet/'.$row['slug'].'-'.$row['id'].'.html';
                        ?>
                        <article class="item-news">
                            <h3 class="title-news"><a href="<?= $link ?>" title="<?= $row['title'] ?>"><?= $row['title'] ?></a></h3>
                        </article>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>
