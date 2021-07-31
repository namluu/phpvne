<nav class="main-nav ddsmoothmenu" id="smoothmenu1">
    <ul class="parent">
        <li><a href="./">Trang chủ</a></li>
        <?php
        $sections = get_sections();
        while ($row = mysqli_fetch_array($sections)) : 
            $link = 'index.php?p=section&id='.$row['id'];
        ?>
        <li><a href="<?= $link ?>"><?= $row['title'] ?></a>
            <ul>
                <?php
                $categories = get_categories_by_section($row['id']);
                while ($cat = mysqli_fetch_array($categories)) : 
                    $link = 'index.php?p=category&id='.$cat['id'];
                ?>
                <li><a href="<?= $link ?>"><?= $cat['title'] ?></a></li>
                <?php endwhile; ?>
            </ul>
        </li>
        <?php endwhile; ?>
    </ul>
</nav>


