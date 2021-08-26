const api = '../backend/includes/api.php'
const ajax = new XMLHttpRequest()
// selecting
function $(el) {
    return document.querySelector(el);
}



// loading screen
window.onload = () => {
    setTimeout(function () {
        $('.loading').style.display = 'none';
        $('body').style.overflowY = 'auto';
        $('body').style.overflowX = 'hidden';

    }, 1700)

}

// dynamic toggling
function toggleClass(firstParam, lol) {
    $(firstParam).classList.toggle(lol)
}




// dark mode
function darkMode() {
    $('body').classList.toggle('dark-mode')

}

function goDark() {
    setDarkMode = localStorage.getItem('darkMode')
    if (setDarkMode !== 'on') {
        darkMode()
        setDarkMode = localStorage.setItem('darkMode', 'on')

    } else {
        darkMode()
        setDarkMode = localStorage.setItem('darkMode', null)
    }

}



let setDarkMode = localStorage.getItem('darkMode')
if (setDarkMode === 'on') {
    darkMode()
}

/*when the button is clicked, open the modal */
function openModal(selector) {
    $(selector).style.display = "block";
}
/* when the user clicks anywhere outside the modal/X span, close the modal*/

window.onclick = function (event) {
    if (event.target == $("#myModal")) {
        $("#myModal").style.display = "none";
    }
}




// password visiblity

function toggleVisability(selector, iconID) {
    if ($(selector).type === "password") {
        $(selector).type = "text";
        $(iconID).classList.remove('fa-eye-slash')
        $(iconID).classList.add('fa-eye')
    } else {
        $(selector).type = "password";
        $(iconID).classList.remove('fa-eye')
        $(iconID).classList.add('fa-eye-slash')
    }
}
//forgot password box
function forgotPass() {
    $('#forgotBox').classList.toggle('hidden')
    $('#loginBox').classList.toggle('hidden')
}

var swiper = new Swiper("#swipper", {
    pagination: {
        el: ".swiper-pagination",
    },
    loop: true,

    // If we need pagination
    // pagination: {
    //   el: '.swiper-pagination',
    // },
    autoplay: {
        delay: 3000,
    }
});

// ajax function
function AJAX(METHOD, URL, data = null, Headers = null) {
    return new Promise((resolve, reject) => {

        ajax.onload = () => resolve(ajax.responseText);
        ajax.onerror = () => reject(ajax.statusText);
        ajax.open(METHOD, URL, true)
        if (METHOD === 'POST') {
            if (Headers == null) {
                ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
            } else if (Headers == 1) {} else if (Headers == 2) {
                ajax.setRequestHeader('Content-Type', 'multipart/form-data')
            }
            ajax.send(data)
        } else {
            ajax.send()
        }
    })
}


function userLogin() {

    // console.log('fasfsa');
    let data = new FormData($('#loginBox'))
    AJAX('POST', `${api}?do=user_login`, data, 1).then((response) => {
        console.log(response)
    }).then((res) => {
        try {
            res = JSON.parse(ajax.responseText);
        } catch (e) {
            console.log(ajax.responseText);
        }
        if (res)

            console.log(res);
        updateUi(res);


    })
}

function updateUi(res) {
    if (res.ok == true)
        window.location.href = `../index.php`
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

function read(file, lol) {
    if (file) {
        const reader = new FileReader();
        reader.addEventListener('load', function () {
            $(lol).setAttribute('src', this.result);
            // console.log();
        })
        reader.readAsDataURL(file);
    } else {
        $(lol).setAttribute('src', '../backend/includes/uploads/user.png');
    }
}


function reg() {

    // console.log('fasfsa');
    let data = new FormData($('#registerBox'))
    AJAX('POST', `${api}?do=register`, data, 1).then((response) => {
        console.log(response)
    }).then((res) => {

    })
}

function Update(id, selector, shit = null) {
    forData = new FormData(selector)
    // console.log($(id));
    // $('#editModal .modal-header').style.color = 'red'
    forData.append("id", id)
    AJAX('POST', api + '?do=edit-user', forData, 1).then((res) => {
        // $('#editModal .modal-header').style.color = 'green'
        console.log(res)
        if (shit == null)
            fetchAll()
        else
            return false
    }).catch((e) => console.log(e))
}

function removeProfile(id) {
    AJAX('POST', api + '?do=remove', `id=${id}`).then((res) => {
        window.location.href = "logout.php"
    })
}

function changePass(id, selector) {
    let fordata = new FormData(selector)
    fordata.append('id', id)
    AJAX('POST', api + '?do=password-change', fordata, 1).then((res) => {
        console.log(res)
    })
}
// function changePass(id,selector){
//     let fordata= new FormData(selector)
//     fordata.append('id',id)
//     fetchContent('POST', api + '?do=password-change',fordata,1).then((res) => {   
//         console.log(res)
//     })
// }


function notify() {
    document.getElementById('notify').style.visibility = "visible";
    document.getElementById('notify').style.opacity = "1";
    setTimeout(() => {
        document.getElementById('notify').style.visibility = "hidden";
        document.getElementById('notify').style.opacity = "0";
        document.getElementById('myModal').style.display = "none";
    }, 2000);
}

function getAllitems() {
    AJAX('GET', api + '?do=get_all_items')
        .then((res) => {
            let js = null
            try {
                js = JSON.parse(res)
            } catch (e) {
                console.log(e)
            }
            let text = ''
            for (let i = 0; i < js.length; i++) {
                function lol() {
                    let sheh = js[i].item_image.split(',')
                    if (sheh.indexOf(',') >= 0) {
                        return sheh[i]
                    } else {
                        return sheh[0]
                    }
                }

                function moreLol() {
                    let le = js[i].item_desc
                    if (js[i].item_desc.length > 50) {
                        le = js[i].item_desc.substring(0, 100) + "<a href='https://localhost/TUT/pages/details.php?itemid=" + js[i].item_id + "'>...SeeMore</a>"
                    }
                    return le;
                }
                text += `
        <div class="cats-box">
                    <img src="../backend/includes/uploads/${lol()}" alt="">
                    <div class="cat-text">
                        <a class="cat-title" href="https://localhost/TUT/pages/details.php?itemid=${js[i].item_id}">${js[i].item_name}</a>
                        <p class="cat-desc">${moreLol()}</p>
                    </div>
                </div>
        
        `
                $('#catCon').innerHTML = text
            }
        })
}

function searchItem(lol, searchRoute) {
    let forData = `search=${lol}`
    AJAX('POST', api + `?do=${searchRoute}`, forData)
        .then((res) => {
            let js = null
            try {
                js = JSON.parse(res)
            } catch (e) {
                console.log(e)
            }
            let text = ''
            for (let i = 0; i < js.length; i++) {
                function lol() {
                    let sheh = js[i].item_image.split(',')
                    if (sheh.indexOf(',') >= 0) {
                        return sheh[i]
                    } else {
                        return sheh[0]
                    }
                }

                function moreLol() {
                    let le = js[i].item_desc
                    if (js[i].item_desc.length > 50) {
                        le = js[i].item_desc.substring(0, 100) + "<a href='https://localhost/TUT/pages/details.php?itemid=" + js[i].item_id + "'>...SeeMore</a>"
                    }
                    return le;
                }
                text += `
            <div class="cats-box">
                        <img src="../backend/includes/uploads/${lol()}" alt="">
                        <div class="cat-text">
                            <a class="cat-title" href="https://localhost/TUT/pages/details.php?itemid=${js[i].item_id}">${js[i].item_name}</a>
                            <p class="cat-desc">${moreLol()}</p>
                        </div>
                    </div>
            
            `
                $('#catCon').innerHTML = text
            }
        }).catch((e) => console.log(e))
}

function catSort(lol) {
    AJAX("POST", api + "?do=sort", `id=${lol}`).then((res) => {
            let js = null
            try {
                js = JSON.parse(res)
            } catch (e) {
                console.log(e)
            }
            let text = ''
            for (let i = 0; i < js.length; i++) {
                function lol() {
                    let sheh = js[i].item_image.split(',')
                    if (sheh.indexOf(',') >= 0) {
                        return sheh[i]
                    } else {
                        return sheh[0]
                    }
                }

                function moreLol() {
                    let le = js[i].item_desc
                    if (js[i].item_desc.length > 50) {
                        le = js[i].item_desc.substring(0, 100) + "<a href='https://localhost/TUT/pages/details.php?itemid=" + js[i].item_id + "'>...SeeMore</a>"
                    }
                    return le;
                }
                text += `
            <div class="cats-box">
                        <img src="../backend/includes/uploads/${lol()}" alt="">
                        <div class="cat-text">
                            <a class="cat-title" href="https://localhost/TUT/pages/details.php?itemid=${js[i].item_id}">${js[i].item_name}</a>
                            <p class="cat-desc">${moreLol()}</p>
                        </div>
                    </div>
            
            `
                $('#catCon').innerHTML = text
            }
        })
        .catch((e) => console.log(e))
}

function heartFunction() {
    document.getElementById("heartDropdown").classList.toggle("show");
}
window.onclick = function (event) {
    if (!event.target.matches('.far')) {
        var dropdownlist = document.getElementsByClassName("dropDown-list");
        var i;
        for (i = 0; i < dropdownlist.length; i++) {
            var openDropdown = dropdownlist[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}

function recoverPass() {
    let email = $('#forgotEmail').value
    AJAX('POST', api + '?do=recover_pass', 'email=' + email).then((res) => {
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
    AJAX("POST", `${api}?do=recover_code`, forData).then((res) => {
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
    AJAX("POST", `${api}?do=reset_pass`, fordata).then((res) => {
        try {
            res = JSON.parse(res);
        } catch (e) {
            console.log(res);
        }
        if (res.ok == true) forgotPass()
        else {
            console.log(res.message);
        }


    })
}