<?php

?>

<div class="header">
        <div class="text">Home</div>


</div>
<div class="content">
        <div class="home">
                <div class="cards">
                        <div class="card" style="background:#e74c3c;color:#FFF;cursor: pointer;" onclick="users()">
                                <h2 class="usersCount"></h2>
                                <em>
                                        User
                                </em>
                        </div>
                        <div class="card" style="background:#16a085;color:#FFF;cursor: pointer;" onclick="items()">
                                <h2 class="itemsCount"></h2>
                                <em>ItemNumb</em>
                        </div>
                        <div class="card" style="background:#3498db;color:#FFF;cursor: pointer;" onclick="cats()">
                                <h2 class="catsCount"></h2>
                                <em>CatNumb</em>
                        </div>
                        <div class="card" style="background:#2c3e50;color:#FFF;cursor: pointer;" onclick="feed()">
                                <h2 class="feedsCount"></h2>
                                <em>FeedBacksNumb</em>
                        </div>
                </div>
                <div class="reload">
                        <span class="reBtn" onclick="fetchHome()">
                                <i class="fas fa-sync"></i>
                        </span>
                </div>
                <div class="moreStatus">
                        <div class="feedBacks">
                                <h1>feedback</h1>
                                <div class="feeds">
                                        <span class="rating-stars">
                                        </span>
                                </div>
                        </div>
                        <div class="regStatus">
                                <h1>The Newest Users</h1>
                                <div class="newReg">

                                
                                </div>
                        </div>
                </div>
        </div>
</div>