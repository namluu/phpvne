<?php
require_once('lib/db_connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <header class="top-header">
        <div class="container">
            <h1><a href=""><img src="images/logo.svg" alt="VnExpress - Bao tieng Viet nhieu nguoi xem nhat"></a></h1>
        </div>
    </header>

    <nav class="main-nav">
        <div class="container">
            <?php require_once('blocks/menu.php'); ?>
        </div>
    </nav>

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
                <article class="item-news">
                    <h3 class="title_news"><a href="">Chiến dịch tiêm vaccine Covid-19 toàn dân bắt đầu</a></h3>
                    <p class="description"><a href="">Để chủ động ứng phó tình huống xấu nhất, TP HCM có kế hoạch chuẩn bị 50.000 giường điều trị Covid-19 theo yêu cầu của Ban chỉ đạo chống Covid-19 quốc gia.</a></p>
                </article>
                <article class="item-news">
                    <h3 class="title_news"><a href="">Chiến dịch tiêm vaccine Covid-19 toàn dân bắt đầu</a></h3>
                    <p class="description"><a href="">Để chủ động ứng phó tình huống xấu nhất, TP HCM có kế hoạch chuẩn bị 50.000 giường điều trị Covid-19 theo yêu cầu của Ban chỉ đạo chống Covid-19 quốc gia.</a></p>
                </article>
                <article class="item-news">
                    <h3 class="title_news"><a href="">Chiến dịch tiêm vaccine Covid-19 toàn dân bắt đầu</a></h3>
                    <p class="description"><a href="">Để chủ động ứng phó tình huống xấu nhất, TP HCM có kế hoạch chuẩn bị 50.000 giường điều trị Covid-19 theo yêu cầu của Ban chỉ đạo chống Covid-19 quốc gia.</a></p>
                </article>
                <article class="item-news">
                    <h3 class="title_news"><a href="">Chiến dịch tiêm vaccine Covid-19 toàn dân bắt đầu</a></h3>
                    <p class="description"><a href="">Để chủ động ứng phó tình huống xấu nhất, TP HCM có kế hoạch chuẩn bị 50.000 giường điều trị Covid-19 theo yêu cầu của Ban chỉ đạo chống Covid-19 quốc gia.</a></p>
                </article>
                <article class="item-news">
                    <h3 class="title_news"><a href="">Chiến dịch tiêm vaccine Covid-19 toàn dân bắt đầu</a></h3>
                    <p class="description"><a href="">Để chủ động ứng phó tình huống xấu nhất, TP HCM có kế hoạch chuẩn bị 50.000 giường điều trị Covid-19 theo yêu cầu của Ban chỉ đạo chống Covid-19 quốc gia.</a></p>
                </article>
            </div>
            <div class="col-right"></div>
        </div>
    </section>

    <section>
        <div class="box_business">
            <div class="container">
                <?php require_once('blocks/box_business.php'); ?>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <?php require_once('blocks/footer.php'); ?>
        </div>
    </footer>
</body>
</html>