<?php include 'components/header.php';navbar(); ?>


<div id="app">
<div class="loading">
            <svg width="259" height="105" viewBox="0 0 259 105" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path class="path" d="M79.6172 11.7344H46.7109V103H33.2812V11.7344H0.445312V0.625H79.6172V11.7344Z"
                    stroke="#dfb45899" stroke-width="5" />
                <path class="path" stroke="#dfb45899" stroke-width="5"
                    d="M166.875 0.625V70.2344C166.828 79.8906 163.781 87.7891 157.734 93.9297C151.734 100.07 143.578 103.516 133.266 104.266L129.68 104.406C118.477 104.406 109.547 101.383 102.891 95.3359C96.2344 89.2891 92.8594 80.9688 92.7656 70.375V0.625H106.125V69.9531C106.125 77.3594 108.164 83.125 112.242 87.25C116.32 91.3281 122.133 93.3672 129.68 93.3672C137.32 93.3672 143.156 91.3281 147.188 87.25C151.266 83.1719 153.305 77.4297 153.305 70.0234V0.625H166.875Z" />
                <path class="path" d="M258.914 11.7344H226.008V103H212.578V11.7344H179.742V0.625H258.914V11.7344Z"
                    stroke="#dfb45899" stroke-width="5" />
            </svg>
        </div>
    <section>
        <div class="container">
            <form class="proflie-page" id="profileForm" onsubmit="return false;">
            <div class="imgg">
                <img   alt="" id="profileImg">
                <input type="file" name="editImg"  id="add-user-img" onchange="read(this.files[0],'#profileImg')">
                </div>
                <div class="ProfileData">
                <div class="filed">
                    <label for="profile_username">Username:</label>
                    <input id="profile_username" type="text" name="editUsername"
                    value=""
                    class="profileInputs" placeholder="Username" >
                </div>
                <div class="filed">
                    <label for="profile_email">Email:</label>
                    <input id="profile_email" type="Email" name="editEmail"   class="profileInputs"   placeholder="Email">
                </div>
                </div>
                <div class="downSection">
                    <div >
                        <button class="trash" onclick="removeProfile(<?= intval( trim($_SESSION['User']->id ));?>)">
                            Delete Account
                        </button>
                    </div>
                    <div >
                        <button class="edit" onclick="Update(<?= intval( trim($_SESSION['User']->id ));?>,$('#profileForm'),'fsa')">
                            Update
                        </button>
                    </div>
                </div>
            </form>
            <div >
                <button id="profileChangePassword" style="padding: 11px;
                    background: none;
                    outline: none;
                    border: none;
                    border-radius: 14px;
                    background: #191911;
                    border: 1px solid black;
                    color: white;
                    margin-top: 2rem;
                    "
                    onclick="toggleClass('.confirmPassword','hidden'),toggleClass('#profileChangePassword','hidden')">
                    Change password</button>
            </div>

            <form class="hidden confirmPassword" id="changePassword" onsubmit="return false">
                <div class="filed">
                    <label for="profile_password">Old Password:</label>
                    <input id="profile_oldpassword" type="password" name="oldpassword" class="profileInputs">
                </div>
                <div class="filed">
                    <label for="profile_password">New Password:</label>
                    <input id="profile_password" type="password" name="newpassword" class="profileInputs">
                </div>
                <div class="filed">
                    <label for="profile_passwordcon">Confirm Password:</label>
                    <input id="profile_passwordcon"  type="password" name="connpass" class="profileInputs">
                </div>
                <button type="submit" class="button" onclick="changePass(<?= $_SESSION['User']->id ?>,$('#changePassword'))">
                        apply
                </button>
            </form>

        </div>
    </section>
    
</div>

<?php include 'components/footer.php';footer(); ?>
<script>
    window.onload = () => {
    setTimeout(function () {
        $('.loading').style.display = 'none';
        $('body').style.overflow = 'auto';

    }, 1700)
    
    AJAX('POST', '../backend/includes/api.php?do=user-seletion', `id=<?= intval( trim($_SESSION['User']->id ));?>`).then((res)=>{
        // 
        try{
            res=JSON.parse(res);
        }catch(e){
            console.log(res);
        }
        $('#profile_email').value=res.lol.email
        $('#profile_username').value=res.lol.username
        $('#profileImg').setAttribute('src',`../backend/includes/uploads/${res.lol.img}`)
        // console.log(res.lol.username);
    })
}
</script>
