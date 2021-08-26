<?php
session_start();

if (isset($_SESSION['User']->id)) {
    if ($_SESSION['User']->admins == 3) {
        //    echo 'bad';
        // session_start();
        session_unset();
        session_destroy();
        header('Location: ');
    } else {
        include '../includes/fun.php';
        $count1 = fetch_all("SELECT item_id FROM item");
        $count2 = fetch_all("SELECT cat_id FROM categories");
        $newUsers = fetch_all("SELECT * FROM users WHERE admins=3 order by reg_date limit 11");
        $feeds = fetch_all("SELECT * FROM feedback order by feed_id desc ");

?>
        <div class="sidebar">
            <div class="logo_content">
                <div class="logo">
                    <i class="fas fa-cog"></i>
                    <div class="logo_name">Dashboard</div>
                </div>
                <i class="fa fas fa-bars" id="btn" onclick="toggleClass('.sidebar','active')"></i>
            </div>
            <ul class="nav_list">
                <li>
                    <i class="fas fas fa-search" onclick="toggleClass('.sidebar','active')"></i>
                    <input type="text" name="" id="" class="search" placeholder="Search">
                    <span class="tooltip">Search</span>
                </li>
                <li>
                    <button onclick="home()">
                        <i class="fas fa-home"></i>
                        <span class="links_name">Home</span>
                    </button>
                    <span class="tooltip">Home</span>
                </li>
                <li>
                    <button id="users" onclick="users()">
                        <i class="fas fas fa-users"></i>
                        <span class="links_name">Users</span>
                    </button>

                    <span class="tooltip">Users</span>
                </li>
                <li>
                    <button id='items' onclick="items()">
                        <i class="fas fa-sitemap"></i>
                        <span class="links_name">items</span>
                    </button>

                    <span class="tooltip">items</span>
                </li>
                <li>
                    <button id="cats" onclick="cats()">
                        <i class="fas fa-th-large"></i>
                        <span class="links_name">Categories</span>
                    </button>

                    <span class="tooltip">Categories</span>
                </li>


            </ul>
            <div class="profile_content">
                <div class="profile">
                    <div class="profile_details" onclick="profile(<?= $_SESSION['User']->id ?>)">
                        <img src="includes/uploads/<?php echo $_SESSION['User']->img; ?>" id="profile_pc" alt="">
                        <div class="name-box">
                            <div class="name"><?php echo $_SESSION['User']->username; ?></div>
                        </div>
                    </div>
                    <a href="http://localhost/tut/backend/includes/api.php?do=logout">
                        <i class="fas fas fa-sign-out-alt" id="logout"></i>
                    </a>
                </div>
            </div>
        </div>
        <div id="contentss">
            <div class="header">
                <div class="text">Home</div>
            </div>

            <div class="content">
                <div class="home">

                    <div class="cards">
                        <div class="card" style="background:#e74c3c;color:#FFF;cursor: pointer;" onclick="users()">
                            <h2><?= count($newUsers) ?></h2>
                            <em>
                                User
                            </em>
                        </div>
                        <div class="card" style="background:#16a085;color:#FFF;cursor: pointer;" onclick="items()">
                            <h2><?= count($count1); ?></h2>
                            <em>ItemNumb</em>
                        </div>
                        <div class="card" style="background:#3498db;color:#FFF;cursor: pointer;" onclick="cats()">
                            <h2><?= count($count2); ?></h2>
                            <em>CatNumb</em>
                        </div>
                        <div class="card" style="background:#2c3e50;color:#FFF;cursor: pointer;" onclick="feed()">
                            <h2><?= count($feeds) ?></h2>
                            <em>FeedBacksNumb</em>
                        </div>
                    </div>
                    <div class="reload">
                        <span class="reBtn">
                            <i class="fas fa-sync"></i>
                        </span>
                    </div>
                    <div class="moreStatus">
                        <div class="feedBacks">
                            <h1>feedback</h1>
                            <?php

                            foreach ($feeds as $feed) {

                            ?>
                                <span class="feedBox">
                                    <h2>
                                        <?= $feed->feedback_title; ?>
                                    </h2>
                                    <span class="rating-stars">

                                        <?php theLazyFunction($feed->stars); ?>
                                    </span>
                                </span>
                            <?php

                            }
                            ?>

                        </div>

                        <div class="regStatus">
                            <h1>The Newest Users</h1>
                            <?php

                            foreach ($newUsers as $newUser) :
                            ?>
                                <div class="regStatusUser">
                                    <span class="regBox">

                                        <img src="includes/uploads/<?php if(!empty($newUser->img)){echo $newUser->img;}else{echo 'user.png';} ?>" alt="" srcset="">
                                        <span class="u-name"> <?= $newUser->username; ?></span>
                                        <span class="u-email"><?= $newUser->email; ?></span>
                                    </span>
                                    <br>
                                </div>
                            <?php
                            endforeach;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>








    <?php
    }
} else {
    ?>
    <div class="container">
        <div class="left">
            <div class="login-content">
                <form class="login" id="loginBox" onsubmit="return false;">
                    <h1>login</h1>
                    <input type="email" placeholder="username" name="email" id="email" value="<?php if (isset($_COOKIE['email'])) {
                                                                                                    echo $_COOKIE['email'];
                                                                                                }
                                                                                                ?>">
                    <input type="password" placeholder="password" name="password" id="password" value="<?php if (isset($_COOKIE['password'])) {
                                                                                                            echo $_COOKIE['password'];
                                                                                                        } ?>">
                    <span class="loginEye">
                        <i class="fas fa-eye-slash" onclick="toggleVisability()" id="togglePassword"></i>
                    </span>
                    <div>
                        <ul id='result'></ul>
                    </div>
                    <input type="submit" value="login" id="login" onclick="fetchData()">
                    <span class="forgot">
                        <button onclick="forgotPass()">forgot password</button>
                        <span class="remember">
                            <label for="remember"> remeber me </label>
                            <input type="checkbox" id="remember" name="remember" value="remember" <?php if (isset($_COOKIE['email'])) {
                                                                                                        echo 'checked';
                                                                                                    } ?>>
                        </span>
                    </span>
                </form>
                <form></form>
                <form class="forgot-box hidden" id="forgotBox" onsubmit="return false;">
                    <h1 class="backward" onclick="forgotPass()">
                        <i class="fas fa-arrow-left"></i>
                    </h1>
                    <h1 class="">Email recovery</h1>
                    <div class="recov">
                        <em class="">write your email address here and the submit the form then please check your email inbox to recover your account</em>
                        <input type="email" class="" placeholder="email" name="email" id="forgotEmail">
                        <input type="submit" class="" value="submit" onclick="recoverPass()">
                        <div class="forgot">
                            <button onclick="forgotPass()">ready to login ?</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="right">
            <img src="imgs/back.jpg" alt="">
        </div>
    </div>
<?php
}
