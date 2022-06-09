//ADD A RESTAURANT MODAL FORM PART

function display_addrestaurantform(){
    const addbtn = document.getElementById("addbtnrestaurant")
    const form = document.getElementById("addrestform")

    addbtn.addEventListener("click", () => {
        form.classList.add("show")
        addBackgroundBlur("addrestaurantform")
    })
}

function addrestaurant_backgroundclick(){
    const bg = document.querySelector("#addrestaurantform")

    window.addEventListener("click", function(event){
        if(event.target == bg){
            removeBackgroundBlur()
            hideform()
        }
    })
}

//REMOVE RESTAURANT PART

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

//EDIT RESTAURANT INFORMATION PART

function editrestaurant_backgroundclick(){
    const bg = document.getElementById("restaurantinfoforms")

    document.addEventListener("click", function(event){
        if(event.target == bg){
            removeBackgroundBlur()
            hideform()
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
            addBackgroundBlur("restaurantinfoforms")
            //Mark the current restaurant (article)
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
            addBackgroundBlur("restaurantinfoforms")
            //Mark the current restaurant (article)
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
            addBackgroundBlur("restaurantinfoforms")
            //Mark the current restaurant (article)
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
            confirmchanges_editrestaurantdata()
            //Then we hide the edit form
            hideform()
            removeBackgroundBlur()
            //Finally, we show the confirmchanges form
            confirmchanges_displayform()
        })
    }
}


display_addrestaurantform()
addrestaurant_backgroundclick()
removerestaurant_btnclick()
editrestaurant_name()
editrestaurant_backgroundclick()
editrestaurant_category()
editrestaurant_address()
editrestaurantshow_confirmchangesform()
