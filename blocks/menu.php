<nav class="main-nav ddsmoothmenu" id="smoothmenu1">
    <ul class="parent">
        <li>
            <a href="./">
                <span class="ic-home">
                    <svg class="ic" viewBox="0 0 32 32">
                        <path d="M21.909 31.85h4c1.2 0 2-0.8 2-2v-14h2c0.6 0 1.2-0.2 1.6-0.6 0.8-0.8 0.6-2-0.2-2.8l-14-12c-0.8-0.6-1.8-0.6-2.6 0l-14 12c-0.8 0.8-1 2-0.2 2.8 0.2 0.4 0.8 0.6 1.4 0.6h2v14c0 1.2 0.8 2 2 2h4c1.2 0 2-0.8 2-2v-6h8v6c0 1.2 0.8 2 2 2z"></path>
                    </svg>
                </span>
                Trang chủ
            </a>
        </li>
        <?php
        $sections = get_sections();
        while ($row = mysqli_fetch_array($sections)) : 
            #$link = 'index.php?p=section&id='.$row['id'];
            $link = 'the-loai/'.$row['slug'].'-'.$row['id'].'.html';
        ?>
        <li><a href="<?= $link ?>"><?= $row['title'] ?></a>
            <ul>
                <?php
                $categories = get_categories_by_section($row['id']);
                while ($cat = mysqli_fetch_array($categories)) : 
                    #$link = 'index.php?p=category&id='.$cat['id'];
                    $link = 'danh-muc/'.$cat['slug'].'-'.$cat['id'].'.html';
                ?>
                <li><a href="<?= $link ?>"><?= $cat['title'] ?></a></li>
                <?php endwhile; ?>
            </ul>
        </li>
        <?php endwhile; ?>
    </ul>
</nav>


