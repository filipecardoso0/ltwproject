//GENERAL FUNCTIONS -> MANAGE MODAL DISPLAY ONLY

function confirmchanges_displayform(){
    const confirmchangesform = document.querySelector("#confirmchangesform .editinfoform")
    confirmchangesform.classList.add("show")
    confirmchanges_showbg()
}

function confirmchanges_hideform(){
    const activeform = document.querySelector(".show")
    activeform.classList.remove("show")
    const activeremovebtn = document.querySelector(".active")
    activeremovebtn.classList.remove("active")
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


// Modifier Functions -> ADD, DELETE OR UPDATE SOMETHING FROM THE DATABASE

//Removes Restaurant
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

//Adds restaurant
function confirmchanges_editrestaurantdata(){
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
