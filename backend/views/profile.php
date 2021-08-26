<?php 
session_start();

?>
<div class="header">        
            <div class="text">Profile</div>
        </div>
<div class="content">     
    <form class="section" id="profileForm" onsubmit="return false">
        <div class="left-section">

            <div class="filed">
                <label for="profile_username">Username:</label>
                <input id="profile_username" type="text" name="editUsername"  class="profileInputs"  >
            </div>
            <div class="filed">
                <label for="profile_email">Email:</label>
                <input id="profile_email" type="Email" name="editEmail"   class="profileInputs"   >
            </div>
            <div class="filed">
                <label for="profile_phone">Phone:</label>
                <input id="profile_phone" type="number" name="editPhone"       class="profileInputs" >
            </div>
        </div>
        <div class="rigth-section">
        <div class="imgg">
                <img src=""  alt="" id="profileImg">
                <input type="file" name="editImg"  id="add-user-img" onchange="read(this.files[0],'#profileImg')">
                                    <!-- <input type="file" name="file" id="file" onchange="read(this.files[0])"> -->
        </div>
            <!-- <img src= alt="" srcset="" name="image"> -->

        </div>
        <div class="downSection">
            <div >
                <button class="edit" onclick="Update(<?= intval( trim($_SESSION['User']->id ));?>,$('#profileForm'),'fsa')">
                    Update
                </button>
            </div>
            <div >
                    <button class="trash" onclick="removeProfile(<?= intval( trim($_SESSION['User']->id ));?>)">
                        Delete Account
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

