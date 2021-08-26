<div class="header">
            <div class="text">Categories</div>
                <div>
                    <button  onclick="btn()" class="button">Add Categories</button>
                </div>
                <div id="myModal" class="modal">
                <div class="modal-content">
                        <div class="modal-header">
                            <span onclick="closeModal()" class="close">&times;</span>
                            <h2>Add new Category</h2>
                        </div>
                        <div class="modal-body">
                            <form action="" id="addCatt"onsubmit="return false" class="myForm" >
                                <div class="inputs" >
                                    <input type="text"      placeholder="Category Name"      id="catName"    name="cat_name" >
                                    <textarea type="text"      placeholder="Category Desc"      id="catDesc"    name="cat_desc"  style="height: 250px;">
                                    </textarea>
                                </div>
                            </form>
                        </div>
                    <div class="modal-footer">
                        <input type="submit" value="submit" id="submit" onclick="addCat()">
                    </div>
                </div>
            </div>
            <div class="some-shit">
                <input type="text" id="search" placeholder="Search" onkeyup="searchCat(this.value,'search')">
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