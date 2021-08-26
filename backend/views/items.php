<?php 
include '../includes/fun.php';
$results=fetch_all("SELECT cat_id,cat_name FROM categories");

?>

<div class="header">
<div id="editModal" class="shitModal hidden">
                <div class="modal-content">
                        <div class="modal-header">
                            <span onclick="toggleClass('#editModal','hidden')" class="close">&times;</span>
                            <h2>Add new Item</h2>
                        </div>
                        <div class="modal-body">
                            <form action="" id="edititemsForm" onsubmit="return false" class="myForm" >
                                <div class="inputs" >
                                    <input type="text" name="item_name" placeholder="Item Name"  id="edit_item_name" required="required" />
                                    <input type="text" name="location" id="edit_item_location" placeholder="Location">
                                    <textarea type="text" name="item_desc" placeholder="Item Description" id="edit_item_desc" required="required" style="height:100%;"></textarea>
                                    <!-- <textarea type="text" name="item_desc" placeholder="Item Description" id="item_desc" required="required" style="height:100%;"></textarea> -->
                                    <!-- <input type="text" name>
                                    <input type="text"> -->
                                    <select name="cat"  id="editcat" >
                                    <?php 
                                            foreach ($results as $row) {
                                                echo '<option value="'.$row->cat_id.'">'.$row->cat_name.'</option>';
                                            }
                                        ?>
                                    </select> 
                                </div>
                                <div class="imgg">
                                    <img src="imgs/back.jpg" alt="" id="imagePreviewImgFORitems">
                                    <input type="file" name="file[]"  id="edit-user-img" onchange="read(this.files[0],'#imagePreviewImgFORitems')"  multiple="multiple">
                                    <!-- <input type="file" name="file" id="file" onchange="read(this.files[0])"> -->
                                </div>
                            </form>
                        </div>
                    <div class="modal-footer">
                    <input id="update" type="submit" value="update" >
                    </div>
                </div>
            </div>
            <div class="text">Items<?php  ?></div>
                <div>
                    <button  onclick="btn()" class="button"><i class="fas fa-plus "></i> Add Item</button>
                </div>
            <div id="myModal" class="modal">
                <div class="modal-content">
                        <div class="modal-header">
                            <span onclick="closeModal()" class="close">&times;</span>
                            <h2>Add new User</h2>
                        </div>
                        <div class="modal-body">
                            <form action="" id="itemsForm" onsubmit="return false" class="myForm" >
                                <div class="inputs" >
                                    <input type="text" name="item_name" placeholder="Item Name"  id="item_name" required="required" />
                                    <input type="text" name="location" id="location" placeholder="Location">
                                    <textarea type="text" name="item_desc" placeholder="Item Description" id="item_desc" required="required" style="height:100%;"></textarea>
                                    <!-- <textarea type="text" name="item_desc" placeholder="Item Description" id="item_desc" required="required" style="height:100%;"></textarea> -->
                                    <!-- <input type="text" name>
                                    <input type="text"> -->
                                    <select name="cat"  id="cat" >
                                    <?php 
                                            foreach ($results as $row) {
                                                echo '<option value="'.$row->cat_id.'">'.$row->cat_name.'</option>';
                                            }
                                        ?>
                                    </select> 
                                </div>
                                <div class="imgg">
                                    <img src="imgs/back.jpg" alt="" id="imagePreviewImgFORitems">
                                    <input type="file" name="file[]"  id="add-user-img" onchange="read(this.files[0],'#imagePreviewImgFORitems')" multiple="multiple">
                                    <!-- <input type="file" name="file" id="file" onchange="read(this.files[0])"> -->
                                </div>
                            </form>
                        </div>
                    <div class="modal-footer">
                        <input type="submit" value="submit" id="submit" onclick="sendItems()">
                    </div>
                </div>
            </div>
            <div class="some-shit">
                <input type="text" id="search" onkeyup="searchItem(this.value,'search_items')" placeholder="Search">
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
<div class="content">     

    

</div>