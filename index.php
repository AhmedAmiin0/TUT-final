<?php include 'pages/components/header.php';
navbar('fsafas'); ?>
<?php include 'backend/includes/fun.php'; ?>
<?php
$result = fetch_all("SELECT * from item LIMIT 6");
$feeds = fetch_all("SELECT  * from feedback ORDER BY stars  DESC LIMIT 6");
$user = $feeds[0]->user_id;

$selectUser = fetchUser("SELECT * from users where id= $user", []);
// $rated= fetch_all("SELECT * from feedback ORDER BY stars desc  ")


?>
<div id="app">
    <div class="loading">
        <svg width="259" height="105" viewBox="0 0 259 105" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path class="path" d="M79.6172 11.7344H46.7109V103H33.2812V11.7344H0.445312V0.625H79.6172V11.7344Z" stroke="#dfb45899" stroke-width="5" />
            <path class="path" stroke="#dfb45899" stroke-width="5" d="M166.875 0.625V70.2344C166.828 79.8906 163.781 87.7891 157.734 93.9297C151.734 100.07 143.578 103.516 133.266 104.266L129.68 104.406C118.477 104.406 109.547 101.383 102.891 95.3359C96.2344 89.2891 92.8594 80.9688 92.7656 70.375V0.625H106.125V69.9531C106.125 77.3594 108.164 83.125 112.242 87.25C116.32 91.3281 122.133 93.3672 129.68 93.3672C137.32 93.3672 143.156 91.3281 147.188 87.25C151.266 83.1719 153.305 77.4297 153.305 70.0234V0.625H166.875Z" />
            <path class="path" d="M258.914 11.7344H226.008V103H212.578V11.7344H179.742V0.625H258.914V11.7344Z" stroke="#dfb45899" stroke-width="5" />
        </svg>
    </div>
    <main class="img">
        <div class="swiper-container swiper1" id="swiper1">

            <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="images/photo.jpeg" alt="" class="img-slide"></div>
                <div class="swiper-slide"><img src="images/nile.jpg" alt="" class="img-slide"></div>
                <div class="swiper-slide"><img src="images/Egypt1.jpg" alt="" class="img-slide"></div>
                <div class="swiper-slide"><img src="images/egypt.jpg" alt="" class="img-slide"></div>
            </div>
            <!-- <div class="subtitle" data-swiper-parallax="-200">Subtitle</div>  -->


        </div>
        <h1 class="text-animation">

        </h1>
    </main>
    <div class="container">
        <section class="wow  animate__fadeInUp" data-wow-duration="1s">
            <div class="recom">
                <div class="rec-text">
                    <h4>
                        Recomended Destinations
                    </h4>
                    <p>Search our website for the best destinations in the world, where you can enjoy the best
                        vacations.</p>
                </div>

                <div class="rec" id="row1">
                    <?php
                    foreach ($result as $row) :
                    ?>
                        <a class="boxes" href="https://localhost/TUT/pages/details.php?itemid=<?= $row->item_id ?>">
                            <img src="backend/includes/uploads/<?= explode(',', $row->item_image)[0] ?>" class="wow bounceInUp  img-box" alt="">
                            <span class="text-box">
                                <span class="text">
                                    <?= $row->item_name ?>
                                </span>
                                <em class="paragraph"><?= $row->item_desc ?></em>
                            </span>
                        </a>
                    <?php
                    endforeach;
                    ?>

                </div>
            </div>
        </section>
    </div>
    <section class="wow  animate__fadeIn" data-wow-duration="1s">
        <div class="feedback">
            <div class="container">
                <div class="feedback-box">
                    <div class="feedback-content">
                        <span class="background">

                        </span>
                        <h3>
                            feedback

                        </h3>
                        <p>
                            <?= trim($feeds[0]->feedback_content); ?>

                        </p>
                        <span class="feedImg">
                            <img src="backend/includes/uploads/<?= $selectUser['lol']->img ?>" alt="">
                        </span>
                        <em>
                            <?= $selectUser['lol']->username ?>
                        </em>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="wow  animate__fadeInUp" data-wow-duration="1s">
        <div class="container">
            <div class="toprated">
                <div class="toprated text-rate">
                    <h3>Top Rated places</h3>
                    <p>Discover the most reviewed places in Egypt based on ratings of Google Maps..</p>
                </div>
                <div class="swiper-container mySwiper" id="mySwiper1">
                    <div class="swiper-wrapper">
                        <?php
                        foreach ($feeds as $feed) {
                            $item = $feed->item_id;
                            $selectItems = fetch_all("SELECT DISTINCT  * from item WHERE item_id = $item  LIMIT 6");
                            foreach ($selectItems as $selectItem) {
                                // echo $selectItem->item_name;
                                // echo 
                        ?>
                                <a href="https://localhost/TUT/pages/details.php?itemid=<?= $selectItem->item_id ?>" class="swiper-slide"><img src="backend/includes/uploads/<?= explode(',', $selectItem->item_image)[0]; ?>" class="ratedImages" alt=""><span class="rating-content">
                                        <h5><?= $selectItem->item_name ?></h5>
                                        <div class="rattings">
                                            <h6 class="number"><?= array_sum(explode(',', $feed->stars)) ?></h6>
                                            <ul class="stars">
                                                <?php

                                                theLazyFunction($feed->stars);
                                                ?>
                                            </ul>
                                        </div> <em><?php
                                                    $text = $selectItem->item_desc ;
                                                    if (strlen($text ) > 150) {
                                                        $new_text = substr($text, 0, 150);
                                                        $new_text = trim($new_text);
                                                      echo   $new_text . "...";
                                                    }
                                                    ?></em>
                                    </span></a>

                        <?php     }
                        } ?>


                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>


    <section class="wow  animate__fadeInLeft" data-wow-duration="1s">
        <div class="container">
            <div class="eventBoxes">
                <div>
                    <h3>Running events</h3>
                    <p>Discover the most reviewed places in Egypt based on ratings of Google Maps..</p>
                </div>
                <div class="eventImage">
                    <img src="images/dahab3.jpg" alt="">
                </div>
                <div class="infoBox">
                    <div class="info-head">
                        <em>date</em>
                        <h4>20 August</h4>
                    </div>

                    <div class="info-content">
                        <span>Our Next Tour To Dahab</span>
                    </div>
                    <div class="info-footer">
                        <span>Book Your Seat Now!</span>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
<?php include 'pages/components/footer.php';
footer('good'); ?>