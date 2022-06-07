function display_confirmchanges(){
    const form = document.querySelector("#forms section:last-child")
    form.classList.add("show")

    const cancelbtn = document.getElementById("cancelbtn")

    cancelbtn.addEventListener("click", ()=> {
        hideform()
        removeBackgroundBlur()
    })
}

function addBackgroundBlur(){
    const bg = document.querySelector("#forms")
    bg.classList.add("modalbody")
}

function removeBackgroundBlur(){
    const bg = document.querySelector("#forms")
    bg.classList.remove("modalbody")
}

function hideform(){
    const activeform = document.querySelector(".show")
    activeform.classList.remove("show")
}

function display_editusername(){
    const btn = document.querySelector("#username")

    btn.addEventListener("click", () => {
        const form = document.getElementById("usernameform")
        form.classList.add("show")
        addBackgroundBlur()
    })
}

function display_password(){
    const btn = document.querySelector("#password")

    btn.addEventListener("click", () => {
        const form = document.getElementById("passwordform")
        form.classList.add("show")
        addBackgroundBlur()
    })
}

function display_editaddress(){
    const btn = document.querySelector("#address")

    btn.addEventListener("click", () => {
        const form = document.querySelector("#addressform")
        form.classList.add("show")
        addBackgroundBlur()
    })
}

function display_phonenumber(){
    const btn = document.querySelector("#phonenumber")

    btn.addEventListener("click", () => {
        const form = document.querySelector("#phonenumberform")
        form.classList.add("show")
        addBackgroundBlur()
    })
}

function close_form_onclick(){
    const CancelBtns = document.querySelectorAll(".formclosebtn")

    for(let CancelBtn of CancelBtns){
        CancelBtn.addEventListener("click", () => {
            removeBackgroundBlur()
            hideform()
        })
    }
}

function makechanges(){
    const Confirmbtns = document.querySelectorAll("#forms section a")

    for(let Confirmbtn of Confirmbtns){
        Confirmbtn.addEventListener("click", () => {
            sendDatatoAction()
            hideform()
            display_confirmchanges()
        })
    }
}

function backgroundclick(){
    const bg = document.querySelector("#forms")

    document.addEventListener("click", function(event){
       if(event.target == bg){
           removeBackgroundBlur()
           hideform()
       }
    })
}

function sendDatatoAction(){
    const activeinput = document.querySelector(".show input")
    const typeofinput = activeinput.name
    const valueofinput = activeinput.value
    const userid = document.getElementById("userid").value;

    //Asserts if password and confirmpassword are equal
    if(typeofinput == "password"){
        const confirmpwd = document.getElementById("confirmpwd")

        if(confirmpwd.value != valueofinput){
            alert("ERROR: Passwords do not match")
            hideform()
            removeBackgroundBlur()
        }
    }

    const acceptbtn = document.getElementById("confirmbtn")

    acceptbtn.addEventListener("click", () => {
        //Initializes AJAX POST REQUEST TO action_editprofile.php page
        const xml = new XMLHttpRequest();
        xml.open("post", "../actions/action_editprofile.php")
        //This is necessary in POST method  (encode type)
        xml.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
        //Sends the post data
        xml.send(encodeForAjax({id: userid, type: typeofinput, value: valueofinput}))
        //Refreshes page after making the desired changes
        location.reload()
    })
}


function encodeForAjax(data) {
    return Object.keys(data).map(function(k){
        return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&')
}

display_editusername()
display_password()
display_phonenumber()
display_editaddress()
close_form_onclick()
makechanges()
backgroundclick()
