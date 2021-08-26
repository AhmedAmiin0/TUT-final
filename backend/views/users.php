<div class="header">
            <div class="text">Users</div>
                <div>
                    
                    <button  onclick="btn()" class="button"><i class="fas fa-plus "></i> Add User</button>
                </div>
            <div id="myModal" class="modal">
                <div class="modal-content">
                        <div class="modal-header">
                            <span onclick="closeModal()" class="close">&times;</span>
                            <h2>Add new User</h2>
                        </div>
                        <div class="modal-body">
                            <form action="" id="mySelect"onsubmit="return false" class="myForm" >
                                <div class="inputs" >
                                    <input type="text" placeholder="username"             id="userInput"    name="username" >
                                    <input type="password" placeholder="password"        id="passInput"     name="password" >
                                    <input type="password" placeholder="confirm password"id="connpass"      name="connpass" >
                                    <input type="email" placeholder="email"             id="emailInput"     name="email">
                                    <input type="phone" placeholder="phone"             id="phoneInput"     name="phone">
                                    <select name="admin"  id="admin">
                                        <option value="1">admin</option>
                                        <option value="2">semi-admin</option>
                                        <option value="3">user</option>
                                    </select> 
                                </div>
                                <div class="imgg">
                                    <img src="imgs/back.jpg" alt="" id="imagePreviewImg">
                                    <input type="file" name="file"  id="add-user-img" onchange="read(this.files[0],'#imagePreviewImg')">
                                    <!-- <input type="file" name="file" id="file" onchange="read(this.files[0])"> -->
                                </div>
                            </form>
                        </div>
                    <div class="modal-footer">
                        <input type="submit" value="submit" id="submit" onclick="addUser()">
                    </div>
                </div>
            </div>
            <div class="some-shit">
                <input type="text" id="search" onkeyup="search(this.value,'search')" placeholder="Search">
                <span>
                    <span class="shit">view :</span>   
                    <span onclick="switchView()">
                        <i class="fas fa-th-large " id="view1" onclick="('colors')"></i>
                        <span class="bar"></span>
                        <i class="fas fa-th-list act" id="view2"></i>
                    </span>
                    <span class="shit">sort :</span>   
                    <span onclick="sortBy()">
                        <i class="fas fa-arrow-up act" id="sort1"></i>
                        <span class="bar"></span>
                        <i class="fas fa-arrow-down" id="sort2"></i>
                    </span>
                </span>
            </div>
        </div>
<div class="content" id="content">


</div>