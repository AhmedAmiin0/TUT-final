<?php include 'components/header.php';
navbar(); ?>
<?php include '../backend/includes/fun.php';
$page_id = $_GET['itemid'];
$result = fetchUser("SELECT * FROM item WHERE item_id = $page_id", []);
$cat_id = $result['lol']->cat_id;
$cat_name = fetchUser("SELECT cat_name FROM categories WHERE cat_id = $cat_id", []);
$rating= fetch_all("SELECT AVG(stars) FROM feedback WHERE item_id = $page_id", []);
?>
<div class="notification" id="notify">
    <p>Thank you for booking !</p>
</div>
<div id="app">
    <div class="loading">
        <svg width="259" height="105" viewBox="0 0 259 105" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path class="path" d="M79.6172 11.7344H46.7109V103H33.2812V11.7344H0.445312V0.625H79.6172V11.7344Z" stroke="#dfb45899" stroke-width="5" />
            <path class="path" stroke="#dfb45899" stroke-width="5" d="M166.875 0.625V70.2344C166.828 79.8906 163.781 87.7891 157.734 93.9297C151.734 100.07 143.578 103.516 133.266 104.266L129.68 104.406C118.477 104.406 109.547 101.383 102.891 95.3359C96.2344 89.2891 92.8594 80.9688 92.7656 70.375V0.625H106.125V69.9531C106.125 77.3594 108.164 83.125 112.242 87.25C116.32 91.3281 122.133 93.3672 129.68 93.3672C137.32 93.3672 143.156 91.3281 147.188 87.25C151.266 83.1719 153.305 77.4297 153.305 70.0234V0.625H166.875Z" />
            <path class="path" d="M258.914 11.7344H226.008V103H212.578V11.7344H179.742V0.625H258.914V11.7344Z" stroke="#dfb45899" stroke-width="5" />
        </svg>
    </div>
    <section>
        <div class="container">
            <div class="details">
                <div class="details-content">
                    <h2 class="title"><?= $result['lol']->item_name; ?></h2>
                    <em class="dcat"><?= $cat_name['lol']->cat_name; ?></em>
                    <p class="desc"><?= $result['lol']->item_desc; ?></p>
                    <div class="details-ratings">
                     <h6 class="number"><?= round($rating[0]->{'AVG(stars)'},1);?></h6> 
                        <ul class="stars">
                            <?php  theLazyFunction(round($rating[0]->{'AVG(stars)'},0)); ?>

                        </ul>
                    </div>
                    <?php if (isset($_SESSION['User']->id)) : ?>

                        <button id="myBtn" class="myBtn" onclick="openModal('#myModal')">Book Now</button>
                        <form class="frm" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                            <input type="text" id="feedbackTitle" name="feedbackTitle" placeholder="feedback title">
                            <textarea id="fdbak" name="feedbackk" rows="18" cols="50" placeholder="feedback"></textarea>
                            <div class="rate">
                                <input type="radio" id="star5" name="rate" value="10" />
                                <label for="star5" title="text">5 stars</label>
                                <input type="radio" id="star4" name="rate" value="8" />
                                <label for="star4" title="text">4 stars</label>
                                <input type="radio" id="star3" name="rate" value="6" />
                                <label for="star3" title="text">3 stars</label>
                                <input type="radio" id="star2" name="rate" value="4" />
                                <label for="star2" title="text">2 stars</label>
                                <input type="radio" id="star1" name="rate" value="2" />
                                <label for="star1" title="text">1 star</label>
                            </div>
                            <input class="sbmt" type="submit" value="Submit" name="submit">
                        </form>
                        <div class="addToHeart">
                            <p>Or add it to the wishlist to find it easily later</p><span style="    line-height: 4;
                        "><i class="far fa-heart"></i></span>
                        </div>
                    <?php else : ?>

                        <a id="myBtn" href="UserLogin.php" class="myBtn">Book Now</a>

                    <?php endif; ?>

                </div>
                <div class="details-slider">

                    <div class="swiper-container mySwiper" id="swipper">
                        <div class="swiper-wrapper">
                            <?php
                            $res = explode(',', $result['lol']->item_image);
                            foreach ($res as $lol) :
                            ?>
                                <div class="swiper-slide"><img src="../backend/includes/uploads/<?= $lol; ?>" class="slide-image" alt="" srcset=""></div>
                            <?php
                            endforeach;
                            ?>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>

                </div>

            </div>
        </div>
    </section>
</div>
<div id="myModal" class="modal" style="z-index: 5;">
    <div class="modal-content">
        <div class="modal-header" style="background-color: #fff;">
            <span class="close">&times;</span>
        </div>
        <div class="modal-body">
            <label for="quantity" style="font-size: 20px;">Number of people:</label>
            <input type="number" id="quantity" name="quantity" style="font-size: 20px" min="1" max="10">
        </div>
        <div class="modal-footer" style="background-color: #fff;">
            <button type="button" class="boton" onclick="notify()">Book</button>
        </div>
    </div>
</div>
<div class="location"><?= $result['lol']->location; ?></div>
<?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($_POST['submit']) {
                if (isset($_POST['feedbackTitle']) && isset($_POST['rate'])) :
                    $feedbackTitle = filter_var($_POST['feedbackTitle'], FILTER_SANITIZE_STRING);
                    $feedback =filter_var($_POST['feedbackk'], FILTER_SANITIZE_STRING);
                    $rate = $_POST['rate'];
                    $user_id = $_SESSION['User']->id;
                    $item_id = $page_id;
                    insert("INSERT INTO feedback (feedback_title,feedback_content,stars,user_id,item_id) VALUES ('$feedbackTitle','$feedback',$rate,$user_id,$item_id)");
                else :
                    return false;     
                endif;
            }
            
        }
                        ?>
<?php include 'components/footer.php';
footer(); ?>