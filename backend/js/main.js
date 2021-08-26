const apiLink = 'includes/api.php'
const ajax = new XMLHttpRequest();





function fetchContent(METHOD, URL, forData = null, lol = null) {
    return new Promise((resolve, reject) => {

        ajax.onload = () => resolve(ajax.responseText);
        ajax.onerror = () => reject(ajax.statusText);
        ajax.open(METHOD, URL, true)
        if (METHOD === 'POST') {
            if (lol == null) {
                ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
            } else if (lol == 1) {} else if (lol == 2) {
                ajax.setRequestHeader('Content-Type', 'multipart/form-data')
            }
            ajax.send(forData)
        } else {
            ajax.send()
        }
    })
}












function read(file, lol) {
    if (file) {
        const reader = new FileReader();
        reader.addEventListener('load', function () {
            $(lol).setAttribute('src', this.result);
            // console.log();
        })
        reader.readAsDataURL(file);
    } else {
        $(lol).setAttribute('src', 'imgs/back.jpg');
    }
}

function btn() {
    $('#myModal').style.display = "block";
}

function closeModal() {
    $('#myModal').style.display = "none";
}

window.onclick = function (event) {
    if (event.target == $('#myModal')) {
        $('#myModal').style.display = "none";
    }
}

function $(el) {
    return document.querySelector(el)
}

function toggleClass(firstParam, lol) {
    $(firstParam).classList.toggle(lol)
}


function forgotPass() {
    $('#forgotBox').classList.toggle('hidden')
    $('#loginBox').classList.toggle('hidden')
}



function toggleVisability() {
    if ($('#password').type === "password") {
        $('#password').type = "text";
        $('#togglePassword').classList.remove('fa-eye-slash')
        $('#togglePassword').classList.add('fa-eye')
    } else {
        $('#password').type = "password";
        $('#togglePassword').classList.remove('fa-eye')
        $('#togglePassword').classList.add('fa-eye-slash')
    }
}

function switchView() {
    // console.log('ready');
    $('#view1').classList.toggle('act')
    $('#view2').classList.toggle('act')
    // $('#boxes').classList.toggle('boxes')
    // document.querySelectorAll('#boxes').classList.toggle('box-row')

}

function sortBy() {
    $('#sort1').classList.toggle('act')
    $('#sort2').classList.toggle('act')

}



window.onload = function () {
    fetchContent('GET', 'views/app.php').then(
        (result) => $('#app').innerHTML = result)

}

function fetchAll() {
    fetchContent('POST', apiLink + '?do=users')
        .then((res) => JSON.parse(res))
        .then((res) => {
            let mytext = ``;
            for (let i = 0; i < res.length; i++) {
                let ids = res[i].id;
                let image = res[i].img;
                let usernames = res[i].usernames;
                if (image == 0) {
                    image = 'user.png'
                }
                mytext +=
                    `
            <tr class="box" id="boxes">
                <td><img src="includes/uploads/${image}" class="users-imgs"></td>
                <td class="data"> ${res[i].id}</td>
                <td class="data">${res[i].username}</td>
                <td class="data">${res[i].email}</td>
                <td class="data">${res[i].phone}</td>
                <td class="data">${res[i].admins}</td>
                <td>
                    <span class="edit"  onclick="selection(${ids})"><i class="fas fa-edit "></i> edit</span>
                    <span class="trash" onclick="remove(${ids})"><i class="fas fa-trash "></i> delete</span>
                </td>
            </tr>`
            }

            $('.content').innerHTML = `

            <div class="notifications" id="notifications"></div>
            <div id="editModal" class="modal">
                <div class="modal-content">
                        <div class="modal-header">
                            <span onclick="closeEdit()" class="close">&times;</span> 
                            <h2>Edit User</h2>
                        </div>
                    <div class="modal-body">
                        <form class="myForm" id="editForm">
                            <div class="inputs">
                                <input type="text" placeholder="username" name="editUsername"  id="editUsername">
                                <input type="email" placeholder="email"   name="editEmail"  id="editEmail">
                                <input type="phone" placeholder="phone"   name="editPhone"  id="editPhone">
                                <select name="admin"  id="editAdmin">
                                <option value="1">admin</option>
                                <option value="2">semi-admin</option>
                                <option value="3">user</option>
                                </select>                                 
                            </div>
                            <div class="imgg">
                            <img src="imgs/back.jpg" alt="" id="imgEditing" >
                            <input type="file" name="editImg" id="editImg" onchange='read(this.files[0],"#imgEditing")'>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <input id="update" type="submit" value="update">
                    </div>
                </div>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>img</th>
                        <th>id</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Admins</th>
                        <th>controls</th>
                    </tr>
                </thead>
                <tbody>
                    ${mytext}
                </tbody>
            </table>`
        })
        .catch((err) => console.log(err))
}

function fetchData() {
    let forData = new FormData($('#loginBox'))

    fetchContent('POST', apiLink + '?do=login', forData, 1).then((res) => {
        try {
            res = JSON.parse(ajax.responseText);
        } catch (e) {
            console.log(ajax.responseText);
        }
        if (res)
            // $('#profile_pc').setAttribute('src', 'imgs/' )

            // console.log(res);
            console.log(res);
        updateUI(res);

    })
}

function recoverPass() {
    let email = $('#forgotEmail').value
    fetchContent('POST', apiLink + '?do=recover_pass', 'email='+email).then((res) => {
        try {
            res = JSON.parse(ajax.responseText);
        } catch (e) {
            console.log(ajax.responseText);
        }
        // console.log(res);
        $('.recov').innerHTML = `<em class="">write the code you recived in your email </em>
        <input type="number" class="code" placeholder="Enter the verify Code" name="code" id="code">
        <input type="submit" class=""  value="submit" onclick="recovCode($('#code').value,)">
        <div class="forgot">
            <button onclick="forgotPass()">Login</button>
        </div>`
    })
}

function recovCode(code) {
    // console.log(email);
    let forData = `code=${code}`
    fetchContent("POST", `${apiLink}?do=recover_code`, forData).then((res) => {
        try {
            res = JSON.parse(res);
        } catch (e) {
            console.log(res);
        }
        if (res.ok === true)
        // console.log(email);
            $('.recov').innerHTML = `
                <em class=""> write your new password it must be 8 characters contains 1 capital 1 small and numbers </em>
                <input type="password" class="code" placeholder="Enter Your New Password" name="newpass" id="newpass">
                <input type="password" class="code" placeholder="Confirm Your Password" name="connewpass" id="connewpass">
                <input type="submit" class=""  value="submit"  onclick="submitPass()">
                <div class="forgot">
                    <button onclick="forgotPass()">Login</button>
                </div>
            `
        //     if(res.lol.ok==true){
        //         console.log('good');
        // }
    })
}

function submitPass() {
    let fordata = `newpassword=${$('#newpass').value}&connpass=${$('#connewpass').value}`
    fetchContent("POST", `${apiLink}?do=reset_pass`, fordata).then((res) => {
        try{
            res = JSON.parse(res);
        }
        catch(e){
            console.log(res);
        }
            if(res.ok == true) forgotPass()
            else{
                console.log(res.message);
            }
         
        
    })
}








function updateUI(res) {
    if (res.ok == true)
        fetchContent('GET', 'views/app.php').then((res) => {
            $('#app').innerHTML = res

        })
    else if (res.ok == false) {

        while ($('#result').firstChild) {
            $('#result').removeChild($('#result').firstChild)
        }
        res.message.forEach((messag) => {
            console.log(messag);
            const li = document.createElement('li')
            li.textContent = messag
            $('#result').appendChild(li)
        });
        $('#result').style.display = 'block'
    }
}

// function hover() {
//     this.style.color = 'red'
// }


// tabs

async function home() {
    await fetchContent('GET', 'views/home.php')
        .then((result) => {
            $('#contentss').innerHTML = result
        })
        fetchHome()

}

async function users() {
    await fetchContent('GET', 'views/users.php').then((result) => {
        $('#contentss').innerHTML = result;
    })
    fetchAll()

}
async function profile(id) {
    // let    fordata = id

    await fetchContent('GET', 'views/profile.php').then((result) => $('#contentss').innerHTML = result)

    // console.log(id)

    // console.log(id);

    fetchContent('POST', apiLink + '?do=user-seletion', `id=${id}`).then((res) => {

        userProfile(res)
    })


    function userProfile(res) {
        try {
            res = JSON.parse(ajax.responseText);
        } catch (e) {
            console.log(res);
        }
        $('#profile_username').value = res.lol.username
        $('#profile_email').value = res.lol.email
        $('#profile_phone').value = res.lol.phone
        $('#profileImg').setAttribute('src', 'includes/uploads/' + res.lol.img)
    }
}

async function items() {
    await fetchContent('GET', 'views/items.php').then((result) => {
        $('#contentss').innerHTML = result;

    })
    fetchItems()
}

async function cats() {
    await fetchContent('GET', 'views/cats.php').then((result) => {
        $('#contentss').innerHTML = result;
    })

    fetchCat()
}


function removeProfile(id) {
    fetchContent('POST', apiLink + '?do=remove', `id=${id}`).then((res) => {
        console.log(res)
        window.location.href = "http://localhost/tut/backend/includes/api.php?do=logout"
    })
}

function removeItem(id) {
    fetchContent('POST', apiLink + '?do=remove_item', `id=${id}`).then((res) => {
        fetchItems()
    })
}

function removeCat(id) {
    fetchContent('POST', apiLink + '?do=remove_cat', `id=${id}`).then((res) => {
        fetchCat()
        // console.log(res)
        // fetchCat()
        // window.location.href="http://localhost/tut/backend/includes/api.php?do=logout"
    })
}

function changePass(id, selector) {
    let fordata = new FormData(selector)
    fordata.append('id', id)
    fetchContent('POST', apiLink + '?do=password-change', fordata, 1).then((res) => {
        console.log(res)
    })
}



function remove(id) {
    forData = `id=${id}`
    console.log(id);
    fetchContent('POST', apiLink + '?do=remove', forData).then((res) => {
        fetchAll()
    })
}

function closeEdit() {
    $('#editModal').style.display = "none";

}

function selection(id) {
    $('#editModal').style.display = 'block'


    // console.log(id);
    forData = `id=${id}`
    fetchContent("POST", apiLink + '?do=user-seletion', forData).then((res) => {
        let reson = null;
        try {
            reson = JSON.parse(ajax.responseText);
        } catch (e) {
            console.log(ajax.responseText);
        }
        if (reson) {
            // console.log(reson);
            $('#editUsername').value = reson.lol.username;
            $('#imgEditing').setAttribute("src", `includes/uploads/${reson.lol.img}`)
            $('#editEmail').value = reson.lol.email;
            $('#editPhone').value = reson.lol.phone;
            $('#editAdmin').value = reson.lol.admins;
            // $('#editAdmin').textContent = reson.lol.admins;
            $('#update').addEventListener('click', () => Update(id, $("#editForm")))

        }
    })
}

function selectItem(id) {


    // console.log(id);
    forData = `id=${id}`
    fetchContent("POST", apiLink + '?do=item-seletion', forData).then((res) => {
        let reson = null;

        try {
            reson = JSON.parse(ajax.responseText);
        } catch (e) {
            console.log(ajax.responseText);
        }
        if (reson) {
            $('#edit_item_name').value = reson.lol.item_name;
            $('#edit_item_location').value = reson.lol.location;
            $('#edit_item_desc').value = reson.lol.item_desc;
            $('#editcat').value = reson.lol.cat_id;
            // console.log(reson);
            $('#update').addEventListener('click', () => updateItem(id, $("#edititemsForm")))


        }








    })
}

function updateItem(id, selector, shit = null) {
    forData = new FormData(selector)
    // console.log($(id));
    // $('#editModal .modal-header').style.color = 'red'
    forData.append("id", id)
    fetchContent('POST', apiLink + '?do=edit-item', forData, 1).then((res) => {
        // $('#editModal .modal-header').style.color = 'green'
        console.log(res)
        if (shit == null)
            fetchItems()
        else
            return false
    }).catch((e) => console.log(e))
}
















function selectCats(id) {
    $('#editModal').style.display = 'block'


    // console.log(id);
    forData = `id=${id}`
    fetchContent("POST", apiLink + '?do=cat-seletion', forData).then((res) => {
        let reson = null;
        try {
            reson = JSON.parse(ajax.responseText);
        } catch (e) {
            console.log(ajax.responseText);
        }
        if (reson) {
            console.log(reson);
            $('#edit_cat_name').value = reson.lol.cat_name
            $('#edit_cat_desc').value = reson.lol.cat_desc
            $('#update').addEventListener('click', () => updateCat(id, $("#editCats")))

        }
    })
}

function Update(id, selector, shit = null) {
    forData = new FormData(selector)
    // console.log($(id));
    // $('#editModal .modal-header').style.color = 'red'
    forData.append("id", id)
    fetchContent('POST', apiLink + '?do=edit-user', forData, 1).then((res) => {
        // $('#editModal .modal-header').style.color = 'green'
        console.log(res)
        if (shit == null)
            fetchAll()
        else
            return false
    }).catch((e) => console.log(e))
}

function updateCat(id, selector, shit = null) {
    forData = new FormData(selector)
    // console.log($(id));
    // $('#editModal .modal-header').style.color = 'red'
    forData.append("id", id)
    fetchContent('POST', apiLink + '?do=edit-cat', forData, 1).then((res) => {
        // $('#editModal .modal-header').style.color = 'green'
        console.log(res)
        if (shit == null)
            fetchCat()
        else
            return false
    }).catch((e) => console.log(e))
}





function addUser() {
    var x = document.getElementById("mySelect");
    forData = new FormData(x);
    fetchContent('POST', apiLink + '?do=adduser', forData, 1).then((res) => {
        console.log(res)
        fetchAll()
    }).catch((e) => console.log(e))
}




function search(lol, searchRoute) {
    let forData = `search=${lol}`

    fetchContent('POST', apiLink + `?do=${searchRoute}`, forData).then((res) => JSON.parse(res))
        .then((res) => {
            let mytext = ``
            for (let i = 0; i < res.length; i++) {
                let ids = res[i].id
                let usernames = res[i].username
                let image = res[i].img
                if (image == 0) {
                    image = 'user.png'
                }
                mytext += `
        <tr class="box" id="boxes">
            <td><img src="includes/uploads/${image}"  class="users-imgs"></td>
            <td class="data">${res[i].id}</td>
            <td class="data">${res[i].username}</td>
            <td class="data">${res[i].email}</td>
            <td class="data">${res[i].phone}</td>
            <td class="data">${res[i].admins}</td>
            <td>
                <span class="edit"  onclick="selection(${ids})"><i class="fas fa-edit "></i> edit</span>
                <span class="trash" onclick="remove(${ids})"><i class="fas fa-trash "></i> delete</span>
            </td>
        </tr>`
            }

            $('.content').innerHTML = `
            <div class="notifications" id="notifications"></div>
            <div id="editModal" class="modal">
                <div class="modal-content">
                        <div class="modal-header">
                            <span onclick="closeEdit()" class="close">&times;</span> 
                            <h2>Edit User</h2>
                        </div>
                    <div class="modal-body">
                        <form class="myForm" id="editForm">
                            <div class="inputs">
                                <input type="text" placeholder="username" name="editUsername"  id="editUsername">
                                <input type="email" placeholder="email"   name="editEmail"  id="editEmail">
                                <input type="phone" placeholder="phone"   name="editPhone"  id="editPhone">
                                <select name="admin"  id="editAdmin">
                                <option value="1">admin</option>
                                <option value="2">semi-admin</option>
                                <option value="3">user</option>
                                </select>                                 
                            </div>
                            <div class="imgg">
                            <img src="imgs/back.jpg" alt="" id="imgEditing" >
                            <input type="file" name="editImg" id="editImg" onchange='read(this.files[0],"#imgEditing")'>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <input id="update" type="submit" value="update">
                    </div>
                </div>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>img</th>
                        <th>id</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Admins</th>
                        <th>controls</th>
                    </tr>
                </thead>
                <tbody>
                    ${mytext}
                </tbody>
            </table>`
        }).catch((e) => console.log(e))
}

function searchItem(lol, searchRoute) {
    let forData = `search=${lol}`

    fetchContent('POST', apiLink + `?do=${searchRoute}`, forData)
    .then((res) => {
        let respo = null
        try {
            respo = JSON.parse(res)
        } catch (e) {
            console.log(res);
        }
        if (respo) {
            let text = ''
            for (let i = 0; i < respo.length; i++) {
                let ids = respo[i].item_id;
                text += `
                <tr class="box" id="boxes">
                <td class="data">${respo[i].item_id}</td>
                <td class="data">${respo[i].cat_id}</td>
                <td class="data">${respo[i].item_name}</td>
                <td>
                    <span class="edit"  onclick="selectItem(${ids},toggleClass('#editModal','hidden'))"><i class="fas fa-edit "></i> edit</span>
                    <span class="trash" onclick="removeItem(${ids})"><i class="fas fa-trash "></i> delete</span>
                </td>
            </tr>
                `
                $('.content').innerHTML = `
                
        <table>
            <thead>
                <tr>
                        <th>id</th>
                        <th>Category</th>
                        <th>Username</th>
                        <th>Controls</th>
                </tr>
            </thead>
            <tbody>
                ${text}
            </tbody>
        </table>`

            }
        }
    }).catch((e) => console.log(e))
}


function addCat() {
    let fordata = new FormData($('#addCatt'))
    fetchContent('POST', apiLink + '?do=addcat', fordata, 1).then((res) => fetchCat())
}



function fetchCat() {
    fetchContent('POST', apiLink + '?do=allcats')
        .then((res) => {
            let respo = null
            try {
                respo = JSON.parse(res)
            } catch (e) {
                console.log(res);
            }
            let mytext = ``;
            for (let i = 0; i < respo.length; i++) {
                let ids = respo[i].cat_id;
                // let image = res[i].img;
                mytext +=
                    `
                <div class="row">
                        <div class="name">
                            <span>${respo[i].cat_name}</span>
                        </div>
               
                        <div class="controls">
                            <span class="edit"  onclick="selectCats(${ids})"><i class="fas fa-edit "></i> edit</span>
                            <span class="trash" onclick="removeCat(${ids})"><i class="fas fa-trash "></i> delete</span>
                        </div>
                </div>
          
      `
            }
            $('.content').innerHTML = `
        <div class="notifications" id="notifications"></div>
        <div id="editModal" class="modal">
            <div class="modal-content">
                    <div class="modal-header">
                        <span onclick="closeEdit()" class="close">&times;</span> 
                        <h2>Edit Cat</h2>
                    </div>
                <div class="modal-body">
                    <form class="myForm" id="editCats">
                        <div class="inputs">
                            <input type="text" placeholder="edit_cat" name="cat_name"  id="edit_cat_name">
                            <textarea type="text"      placeholder="Category Desc"      id="edit_cat_desc"    name="cat_desc"  style="height:400px"></textarea>
                                                        
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <input id="update" type="submit" value="update">
                </div>
            </div>
        </div>
       
                    
        
                ${mytext}
        `
        })
}







function searchCat(lol) {
    let forData = `search=${lol}`

    fetchContent('POST', apiLink + `?do=search_cat`, forData)
        .then((res) => {
            let respo = null
            try {
                respo = JSON.parse(res)
            } catch (e) {
                console.log(res);
            }
            let mytext = ``;
            for (let i = 0; i < respo.length; i++) {
                let ids = respo[i].cat_id;
                // let image = res[i].img;
                mytext +=
                    `
                <div class="row">
                        <div class="name">
                            <span>${respo[i].cat_name}</span>
                        </div>
               
                        <div class="controls">
                            <span class="edit"  onclick="selectCats(${ids})"><i class="fas fa-edit "></i> edit</span>
                            <span class="trash" onclick="removeCat(${ids})"><i class="fas fa-trash "></i> delete</span>
                        </div>
                </div>
          
      `
            }
            $('.content').innerHTML = `
        <div class="notifications" id="notifications"></div>
        <div id="editModal" class="modal">
            <div class="modal-content">
                    <div class="modal-header">
                        <span onclick="closeEdit()" class="close">&times;</span> 
                        <h2>Edit Cat</h2>
                    </div>
                <div class="modal-body">
                    <form class="myForm" id="editCats">
                    <div class="inputs">
                            <input type="text" placeholder="edit_cat" name="cat_name"  id="edit_cat_name">
                            <textarea type="text"      placeholder="Category Desc"      id="edit_cat_desc"    name="cat_desc"  style="height:400px"></textarea>
                                                        
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <input id="update" type="submit" value="update">
                </div>
            </div>
        </div>
       
                    
        
                ${mytext}
        `
        }).catch((e) => console.log(e))
}

function sendItems() {
    let forData = new FormData($('#itemsForm'))
    fetchContent('POST', apiLink + '?do=additems', forData,1).then((res) => fetchItems())
}

function fetchItems() {
    fetchContent('POST', apiLink + '?do=allitems').then((res) => {
        let respo = null
        try {
            respo = JSON.parse(res)
        } catch (e) {
            console.log(res);
        }
        if (respo) {
            let text = ''
            for (let i = 0; i < respo.length; i++) {
                let ids = respo[i].item_id;
                text += `

                
                <tr class="box" id="boxes">
                <td class="data">${respo[i].item_id}</td>
                <td class="data">${respo[i].cat_id}</td>
                <td class="data">${respo[i].item_name}</td>
                <td>
                    <span class="edit"  onclick="selectItem(${ids},toggleClass('#editModal','hidden'))"><i class="fas fa-edit "></i> edit</span>
                    <span class="trash" onclick="removeItem(${ids})"><i class="fas fa-trash "></i> delete</span>
                </td>
            </tr>
                `
                $('.content').innerHTML = `
            <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>Category</th>
                    <th>Username</th>
                    <th>Controls</th>

                </tr>
            </thead>
            <tbody>
                ${text}
            </tbody>
        </table>
                
                `

            }
        }
    })
}
function fetchHome(){
    fetchContent("POST",apiLink+'?do=statistics').then((res)=>{
        let respo = null
        try{
            respo = JSON.parse(res)
        }
        catch(e){
            console.log(res)
        }
        if(respo){
            // console.log(respo.feeds.length);
            // console.log(respo.feeds);
            $('.usersCount').innerHTML = respo.users.length
            $('.itemsCount').innerHTML = respo.items.length
            $('.catsCount').innerHTML = respo.cats.length
            $('.feedsCount').innerHTML = respo.feeds.length
            let text =''
            for(let i = 0;i<respo.feeds.length;i++){
                let feed = respo.feeds[i]
                text += `
                <span class="feedBox">
                    <h2 class="feedTitle">${feed.feedback_title}</h2>
                    <span class="rating-stars">
                    ${stars(feed.stars)}
                    </span>
                </span>
                `
            }
            $('.feeds').innerHTML = text
            let hmm= ''

            for(let i = 0;i<respo.users.length;i++){
                let image = respo.users[i].img
                if (image == 0) {
                    image = 'user.png'
                }
                let user = respo.users[i]
                hmm += `
                <div class="regStatusUser">
                    <span class="regBox">
                        <img src="includes/uploads/${image}">
                        <span class="u-name">${user.username}</span>
                        <span class="u-email">${user.email}</span>
                    </span>
                </div>
                `
            }
            $('.newReg').innerHTML = hmm


        }
        // console.log(res);    
    })
}
function stars(checks){
    let star = ''
    if(checks == 2){
         star =`

        <i class="fas fa-star checked"></i>
        <i class="far fa-star"></i>
        <i class="far fa-star"></i>
        <i class="far fa-star"></i>
        <i class="far fa-star"></i>
        `
    } else if(checks == 4){
         star = `
        <i class="fas fa-star checked"></i>
        <i class="fas fa-star checked"></i>
        <i class="far fa-star"></i>
        <i class="far fa-star"></i>
        <i class="far fa-star"></i>
        `
    }
    else if(checks == 6){
         star =`
        <i class="fas fa-star checked"></i>
        <i class="fas fa-star checked"></i>
        <i class="fas fa-star checked"></i>
        <i class="far fa-star"></i>
        <i class="far fa-star"></i>
        `
    }else if(checks == 8){
         star =`
        <i class="fas fa-star checked"></i>
        <i class="fas fa-star checked"></i>
        <i class="fas fa-star checked"></i>
        <i class="fas fa-star checked"></i>
        <i class="far fa-star"></i>
        `
    }else if(checks == 10){
         star = `
        <i class="fas fa-star checked"></i>
        <i class="fas fa-star checked"></i>
        <i class="fas fa-star checked"></i>
        <i class="fas fa-star checked"></i>
        <i class="fas fa-star checked"></i>
        `
    }
    return star
}
