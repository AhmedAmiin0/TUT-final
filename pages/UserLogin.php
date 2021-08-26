<?php include 'components/header.php';navbar();?>
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
<div class="loginContainer">
    <div class="left">
        <div class="login-content">
            <form class="login" id="loginBox" onsubmit="return false;">
                <h1>login</h1>
                
                <input type="email" placeholder="email" name="email" id="email" value="<?php if(isset($_COOKIE['email'])) {echo $_COOKIE['email'];}?>" >
                <input type="password" placeholder="password" name="password" id="password" value="<?php if(isset($_COOKIE['password'])) {echo $_COOKIE['password'];}?>" >
                <span class="loginEye">
                    <i class="fas fa-eye-slash togglePassword"  onclick="toggleVisability('#password','#togglePassword')" id="togglePassword"></i>
                </span>    
                <div >
                    <ul id='result'></ul>
                </div>
                <input onclick="userLogin()" type="submit" value="login" id="login" >
                <div class="register-btn"  onclick="toggleClass('#loginBox','hidden'),toggleClass('#registerBox','hidden')">
                    <button>Wanna Start the journy click here!</button>
                </div>
                <span class="forgot">
                    <button onclick="forgotPass()">forgot password</button>
                    <span class="remember">
                        <label for="remember"> remeber me </label>
                        <input type="checkbox" id="remember" name="remember" value="remember"  >
                    </span>
                </span>   
            </form>
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
            <form class="login hidden" id="registerBox" style="padding-top: 2rem;" onsubmit="return false;">
                <h1>register</h1>
                <div class="registerImg">
                    <img src="../backend/includes/uploads/user.png" alt="" id="imagePreviewImg">
                    <input type="file" name="file"  id="add-user-img" onchange="read(this.files[0],'#imagePreviewImg')">
                </div>
                <input type="text" placeholder="Username" name="username" id="regUsername" >
                <input type="email" placeholder="email" name="email" id="regEmail" >
                <input type="password" placeholder="password" name="password" id="regPassword" >
                <input type="password" placeholder="Confirm Password" name="connpass" id="regConnPass" >
                <div >
                    <ul id='result'></ul>
                </div>
                <input type="submit" value="register" id="register" onclick="reg()">
                <div class="register-btn"  onclick="toggleClass('#loginBox','hidden'),toggleClass('#registerBox','hidden')">
                    <button>Login Here!</button>
                </div>
            </form>
        </div>
    </div>
    <div class="right">
        <img src="../images/aswan-and-nubia-tour.jpg" alt="">
    </div>
</div>
<?php include 'components/footer.php';footer();?>
