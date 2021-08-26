<?php 
session_start();
function navbar($lol=null){
    if ($lol==null) {        
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../images/IMG_6814.PNG" type="image/gif" sizes="16x16">
    <title>TUT</title>    
    <link rel="stylesheet" href="../css/all.css" />    
    <link rel="stylesheet" href="../css/swiper.css" />
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <header>
        <?php ?>
        <nav class="navbar scroll" id="navbar">
            <div class="logo-branName">
                <a class="logo" href="../index.php">
                    <img src="../images/IMG_6814.PNG" alt="">
                </a>
            </div>
            <div class="nav-content">
                <ul class="nav">
                    <a href="categories.php" class="nav-item"> Categories</a> 
                    <a href="tours.php" class="nav-item">Tours</a>
                    <a href="aboutus.php" class="nav-item">About</a>
                </ul>
                <div class="r-section">

                    <span class="nav-item lang" onclick="goDark()"><i class="fas fa-adjust"></i></span>
                    <?php
                    if(!isset($_SESSION['User'])){
                    ?>
                    <a class=" sheeh" href="UserLogin.php">
                        Login
                    </a> 
                    <?php }else{
                        ?>
                    <div class="dropDown">
                            <span onclick="heartFunction()"><i class="far fa-heart"></i></span>
                            <div id="heartDropdown" class="dropDown-list">
                                <div class="wishBox">
                                    <img src="../images/ABUSIMBEL.jpg" alt="">
                                    <span class="wishText">
                                        <h1>ABUSIMBEL</h1>
                                    </span>
                                </div>
                            </div>
                    </div>
                            <select  onchange="location = this.value;">
                                <option value="Home.php"><?= $_SESSION['User']->username ?></option>
                                <option value="logout.php">logout</option>
                                <option value="profile.php">Profile</option>
                            </select>

                        <?php
                        ;}?>
                </div>
            </div>
            <div class="nav-icon" onclick="toggleClass('.nav-content','nav-flex')">
                <i class="fas fa-bars"></i>
            </div>
        </nav>
    </header>
        <?php
    }else{
        ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/IMG_6814.PNG" type="image/gif" sizes="16x16">
    <title>TUT</title>
    <link rel="stylesheet" href="css/swiper.css" />
    <link rel="stylesheet" href="css/all.css" />        
    <link rel="stylesheet" href="css/animate.css"/>
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <header>
        <nav class="navbar " id="navbar">
            <div class="logo-branName">
                <a class="logo" href="index.php">
                    <img src="images/IMG_6814.PNG" alt="">
                </a>
            </div>
            <div class="nav-content">
                <ul class="nav">
                    <a href="pages/categories.php" class="nav-item"> Categories</a>
                    <a href="pages/tours.php" class="nav-item">Tours</a>
                    <a href="pages/aboutus.php" class="nav-item">About</a>
                </ul>

                <div class="r-section">

                    <span class="nav-item lang" onclick="goDark()"><i class="fas fa-adjust"></i></span>
                    <?php
                    if(!isset($_SESSION['User'])){
                        // echo 'good';
                    ?>
                    <a class=" sheeh" href="pages/UserLogin.php">
                        Login
                    </a> 
                    <?php }else{
                        ?>
                    <div class="dropDown">
                            <span onclick="heartFunction()"><i class="far fa-heart"></i></span>
                            <div id="heartDropdown" class="dropDown-list">
                                <div class="wishBox">
                                    <img src="images/ABUSIMBEL.jpg" alt="">
                                    <span class="wishText">
                                        <h1>ABUSIMBEL</h1>
                                    </span>
                                </div>
                            </div>
                    </div>
                            <select  onchange="location = this.value;">
                                <option value="Home.php"><?= $_SESSION['User']->username ?></option>
                                <option value="pages/logout.php">logout</option>
                                <option value="pages/profile.php">Profile</option>
                            </select> 
                        <?php
                        ;}?>
                </div>
            </div>
            <div class="nav-icon" onclick="toggleClass('.nav-content','nav-flex')">
                <i class="fas fa-bars"></i>
            </div>
        </nav>
    </header>

            <?php
    }
} 
?>
