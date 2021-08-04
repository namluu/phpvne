<footer>
    <div class="container">
        <div class="inner-footer">
            <?php
            $categories = get_categories();
            while ($row = mysqli_fetch_array($categories)) :
                $link = 'index.php?p=category&id='.$row['id'];
                ?>
                <a href=""><?= $row['title'] ?></a>
            <?php endwhile; ?>
        </div>
        <div class="social">
            <a href=""><img src="images/logo.svg" alt="VnExpress - Bao tieng Viet nhieu nguoi xem nhat"></a>

        </div>
        <div class="copyright">
            <p><strong>Báo tiếng Việt nhiều người xem nhất</strong><br>Thuộc Bộ Khoa học Công nghệ<br>Số giấy phép: 06/GP-BTTTT ngày 03/01/2014</p>
            <p>Tổng biên tập: Phạm Hiếu<br>Địa chỉ: Tầng 5, Tòa nhà FPT, 17 phố Duy Tân, Cầu Giấy, Hà Nội<br>Điện thoại: 024 7300 8899 - máy lẻ 4500</p>
            <p style="text-align: right;">© 1997-2021. Toàn bộ bản quyền thuộc VnExpress</p>
        </div>
    </div>
</footer>