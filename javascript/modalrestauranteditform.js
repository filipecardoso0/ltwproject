//REGISTRATION AND CONFIRM CHANGES PART

function display_addrestaurantform(){
    const addbtn = document.getElementById("addbtnrestaurant")
    const form = document.getElementById("addrestform")

    addbtn.addEventListener("click", () => {
        form.classList.add("show")
        addrestaurant_addBackgroundBlur()
    })
}

function addrestaurant_hideform(){
    const activeform = document.querySelector(".show")
    activeform.classList.remove("show")
}

function confirmchanges_hideform(){

    const activeform = document.querySelector(".show")
    activeform.classList.remove("show")
    const activeremovebtn = document.querySelector(".active")
    activeremovebtn.classList.remove("active")
}

function addrestaurant_addBackgroundBlur(){
    const bg = document.getElementById("addrestaurantform")
    bg.classList.add("modalbody")
}

function removeBackgroundBlur(){
    const bg = document.querySelector(".modalbody")
    bg.classList.remove("modalbody")
}

function addrestaurant_closeform(){
    const CancelBtns = document.querySelectorAll(".formclosebtn")

    for(let CancelBtn of CancelBtns){
        CancelBtn.addEventListener("click", () => {
            removeBackgroundBlur()
            hideform()
        })
    }
}

function addrestaurant_backgroundclick(){
    const bg = document.querySelector("#addrestaurantform")

    document.addEventListener("click", function(event){
        if(event.target == bg){
            removeBackgroundBlur()
            addrestaurant_hideform()
        }
    })
}

function confirmchanges_displayform(){
    const confirmchangesform = document.querySelector("#confirmchangesform .editinfoform")
    confirmchangesform.classList.add("show")
    confirmchanges_showbg()
}

function removerestaurant_btnclick(){
    const btns = document.querySelectorAll("#removerestbtn")

    for(let btn of btns){
        btn.addEventListener("click", ()=>{
            btn.parentElement.classList.add("active")
            confirmchanges_displayform()
            confirmchanges_confirmbtn_removerestaurant()
        })
    }
}

function confirmchanges_showbg(){
    const bg = document.getElementById("confirmchangesform")
    bg.classList.add("modalbody")
}

function confirmchanges_backgroundclick(){
    const bg = document.getElementById("confirmchangesform")

    document.addEventListener("click", function(event){
        if(event.target == bg){
            removeBackgroundBlur()
            confirmchanges_hideform()
        }
    })
}

function confirmchanges_cancelbtn(){
    const cancelbtn = document.getElementById("cancelbtn")

    cancelbtn.addEventListener("click", ()=> {
        removeBackgroundBlur()
        confirmchanges_hideform()
    })
}

function confirmchanges_confirmbtn_removerestaurant(){
    const confirmbtn = document.querySelector("#confirmbtn");
    const activerest = document.querySelector(".active input");
    const activerestid = activerest.value;

    confirmbtn.addEventListener("click", ()=>{
        ///Initializes AJAX POST REQUEST TO action_editprofile.php page
        const xhr = new XMLHttpRequest();
        xhr.open("post", "../actions/action_removerestaurant.php")
        //This is necessary in POST method (encode type)
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
        //Sends the post data
        xhr.send(encodeForAjax({id: activerestid}))
        //Removes selected restaurant
        document.querySelector("article.active").remove();
        //Closes form
        removeBackgroundBlur()
        confirmchanges_hideform()
    })
}

///EDIT INFORMATION PART
function editrestaurant_backgroundblur(){
    const bg = document.getElementById("restaurantinfoforms")
    bg.classList.add("modalbody")
}


function editrestaurant_hideform(){
    const activeform = document.querySelector(".show")
    activeform.classList.remove("show")
}

function editrestaurant_backgroundclick(){
    const bg = document.getElementById("restaurantinfoforms")

    document.addEventListener("click", function(event){
        if(event.target == bg){
            removeBackgroundBlur()
            editrestaurant_hideform()
            document.querySelector(".active").classList.remove("active")
        }
    })
}

function editrestaurant_name(){
    const btns = document.querySelectorAll("#restaurantname")
    const form = document.getElementById("changerestname")

    for(let btn of btns){
        btn.addEventListener("click", ()=>{
            form.classList.add("show")
            editrestaurant_backgroundblur()
            btn.parentElement.classList.add("active")
            getRestaurantInfo()
        })
    }
}

function editrestaurant_category(){
    const btns = document.querySelectorAll("#restaurantcategory")
    const form = document.getElementById("changerestcategory")

    for(let btn of btns){
        btn.addEventListener("click", ()=>{
            form.classList.add("show")
            editrestaurant_backgroundblur()
            btn.parentElement.classList.add("active")
            getRestaurantInfo()
        })
    }
}

function editrestaurant_address(){
    const btns = document.querySelectorAll("#restaurantaddress")
    const form = document.getElementById("changerestaddress")

    for(let btn of btns){
        btn.addEventListener("click", ()=>{
            form.classList.add("show")
            editrestaurant_backgroundblur()
            btn.parentElement.classList.add("active")
            getRestaurantInfo()
        })
    }
}

async function getRestaurantInfo() {
    //Get Restaurant info Part
    const restaurantid = document.querySelector(".active input").value
    const restresponse = await fetch('api/api_restaurant.php?id=' + restaurantid)
    const restinfo = await restresponse.json()

    const activeinput = document.querySelector(".show input")

    if(activeinput != null){
        if(activeinput.name == "restname"){
            activeinput.value = restinfo['name']
        }
        else if(activeinput.name == "restaddress"){
            activeinput.value = restinfo['address']
        }
    }
    else{
        document.querySelector(".show select").selectedIndex = restinfo['IdCategory']-1
    }
}

function editrestaurantshow_confirmchangesform(){
    const btns = document.querySelectorAll("#editbtn")

    for(let btn of btns){
        btn.addEventListener("click", ()=>{
            //First we get the fields values
            confirmchanges_waitforclick_sendData()
            //Then we hide the edit form
            editrestaurant_hideform()
            removeBackgroundBlur()
            //Finally, we show the confirmchanges form
            confirmchanges_displayform()
        })
    }
}

function confirmchanges_waitforclick_sendData(){
    //First we get fields data
    const confirmbtn = document.querySelector("#confirmbtn")
    const restaurantid = document.querySelector(".active input").value

    let field = null
    let value = null
    let select = null
    const input = document.querySelector(".show input")

    if(input != null){
        //The fields are inputs
        if(input.name == "restname"){
            field = "Name"
            value = input.value
        }
        else{
            field = "Address"
            value = input.value
        }
    }
    //The field is a select
    else{
        field = "Category"
        select = document.querySelector(".show select")
        value = select.selectedIndex+1
    }

    //Then, we wait for button click, and then send data to the server
    confirmbtn.addEventListener("click", ()=>{
        ///Initializes AJAX POST REQUEST TO action_editprofile.php page
        const xhr = new XMLHttpRequest();
        xhr.open("post", "../actions/action_editrestaurant.php")
        //This is necessary in POST method (encode type)
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
        //Sends the post data
        xhr.send(encodeForAjax({id: restaurantid, field: field, value: value}))
        //Updates HTML value of the modified element
        if(field == "Name"){
            document.querySelector(".active #restaurantname a").innerHTML = value
        }
        else if(field == "Address"){
            document.querySelector(".active #restaurantaddress a").innerHTML = value
        }
        else{
            document.querySelector(".active #restaurantcategory a").innerHTML = select.options[select.selectedIndex].text //Gets selected field text by id
        }
        //Closes form and removes background blur
        removeBackgroundBlur()
        confirmchanges_hideform()
    })
}

display_addrestaurantform()
addrestaurant_closeform()
addrestaurant_backgroundclick()
removerestaurant_btnclick()
confirmchanges_backgroundclick()
confirmchanges_cancelbtn()
editrestaurant_name()
editrestaurant_backgroundclick()
editrestaurant_category()
editrestaurant_address()
editrestaurantshow_confirmchangesform()
