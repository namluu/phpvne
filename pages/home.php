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
        <?php
            $sections = get_sections();
            while ($row = mysqli_fetch_array($sections)) : 
                $link = 'index.php?p=section&id='.$row['id'];
            ?>
            <div class="box-category">
                <hgroup class="title-box-category">
                    <h2 class="parent-cate"><a href="" class="inner-title"><?= $row['title'] ?></a></h2>
                    <?php
                    $categories = get_categories_by_section($row['id']);
                    while ($cat = mysqli_fetch_array($categories)) : 
                        $link = 'index.php?p=category&id='.$cat['id'];
                    ?>
                    <span class="sub-cate"><a href=""><?= $cat['title'] ?></a></span>
                    <?php endwhile; ?>
                </hgroup>
                <div class="content-box-category">
                    <?php 
                    $post = get_latest_post_by_section($row['id']);
                    $row = mysqli_fetch_array($post);
                    if ($row): 
                        $link = 'index.php?p=post&id='.$row['id'];
                    ?>
                    <article class="item-news full-thumb flexbox">
                        <div class="thumb-art">
                            <a href="" title="<?= $row['title'] ?>">
                                <picture>
                                    <img alt="<?= $row['title'] ?>" src="upload/<?= $row['image'] ?>">
                                </picture>
                            </a>
                        </div>
                        <div class="wrap-sum-news">
                            <h3 class="title-news"><a href="" title="<?= $row['title'] ?>"><?= $row['title'] ?></a></h3>
                            <p class="description">
                                <a href="" title="<?= $row['title'] ?>">
                                    <?= $row['description'] ?>
                                </a>
                                <span class="meta-news">
                                    <a class="count_cmt" href="" style="white-space: nowrap; display: none;">
                                        <svg class="ic ic-comment"><use xlink:href="#Comment-Reg"></use></svg>
                                        <span class="font_icon widget-comment-4328974-1"></span>
                                    </a>
                                </span>
                            </p>
                        </div>
                    </article>
                    <?php endif; ?>
                    <article class="article-sub-right">
                        <h3 class="title-news"><a href="https://vnexpress.net/chung-khoan-tang-manh-4328905.html" data-itm-source="#vn_source=Home&amp;vn_campaign=Box-KinhDoanh&amp;vn_medium=Item-2&amp;vn_term=Desktop&amp;vn_thumb=0" data-itm-added="1">Chứng khoán tăng mạnh</a></h3>
                        <p class="description">
                            <a href="https://vnexpress.net/chung-khoan-tang-manh-4328905.html" data-itm-source="#vn_source=Home&amp;vn_campaign=Box-KinhDoanh&amp;vn_medium=Item-2&amp;vn_term=Desktop&amp;vn_thumb=0" title="Chứng khoán tăng mạnh" data-itm-added="1">
                                Sau khi đảo chiều từ giảm thành tăng vào đầu phiên, VN-Index duy trì sắc xanh đến lúc đóng cửa và tích luỹ thêm 22,88 điểm so với tham chiếu.
                            </a>
                            <span class="meta-news">
                                <a class="count_cmt" href="https://vnexpress.net/chung-khoan-tang-manh-4328905.html#box_comment_vne" style="white-space: nowrap; display: none;">
                                    <svg class="ic ic-comment"><use xlink:href="#Comment-Reg"></use></svg>
                                    <span class="font_icon widget-comment-4328905-1">2</span>
                                </a>
                            </span>
                        </p>
                    </article>
                    <div class="sub-news-cate flexbox">
                        <article class="item-news">
                            <h3 class="title-news"><a href="https://vnexpress.net/uy-ban-kinh-te-lo-ngai-bong-bong-tai-san-4328612.html" data-itm-source="#vn_source=Home&amp;vn_campaign=Box-KinhDoanh&amp;vn_medium=Item-3&amp;vn_term=Desktop&amp;vn_thumb=0" title="Uỷ ban Kinh tế: Lo ngại bong bóng tài sản" data-itm-added="1">Uỷ ban Kinh tế: Lo ngại bong bóng tài sản</a><span class="meta-news">
                                <a class="count_cmt" href="https://vnexpress.net/uy-ban-kinh-te-lo-ngai-bong-bong-tai-san-4328612.html#box_comment_vne" style="white-space: nowrap; display: none;">
                                <svg class="ic ic-comment"><use xlink:href="#Comment-Reg"></use></svg>
                                <span class="font_icon widget-comment-4328612-1"></span>
                                </a>
                                </span>
                            </h3>
                        </article>
                        <article class="item-news">
                            <h3 class="title-news"><a href="https://vnexpress.net/tp-hcm-hien-co-800-diem-ban-hang-luu-dong-4329039.html" data-itm-source="#vn_source=Home&amp;vn_campaign=Box-KinhDoanh&amp;vn_medium=Item-4&amp;vn_term=Desktop&amp;vn_thumb=0" title="TP HCM hiện có 800 điểm bán hàng lưu động" data-itm-added="1">TP HCM hiện có 800 điểm bán hàng lưu động</a><span class="meta-news">
                                <a class="count_cmt" href="https://vnexpress.net/tp-hcm-hien-co-800-diem-ban-hang-luu-dong-4329039.html#box_comment_vne" style="white-space: nowrap; display: none;">
                                <svg class="ic ic-comment"><use xlink:href="#Comment-Reg"></use></svg>
                                <span class="font_icon widget-comment-4329039-1"></span>
                                </a>
                                </span>
                            </h3>
                        </article>
                        <article class="item-news">
                            <h3 class="title-news"><a href="https://vnexpress.net/digiworld-lai-dam-4328786.html" data-itm-source="#vn_source=Home&amp;vn_campaign=Box-KinhDoanh&amp;vn_medium=Item-5&amp;vn_term=Desktop&amp;vn_thumb=0" title="Digiworld lãi đậm" data-itm-added="1">Digiworld lãi đậm</a><span class="meta-news">
                                <a class="count_cmt" href="https://vnexpress.net/digiworld-lai-dam-4328786.html#box_comment_vne" style="white-space: nowrap; display: none;">
                                <svg class="ic ic-comment"><use xlink:href="#Comment-Reg"></use></svg>
                                <span class="font_icon widget-comment-4328786-1"></span>
                                </a>
                                </span>
                            </h3>
                        </article>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>
