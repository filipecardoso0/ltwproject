//Dish Add Part

function display_add_dishform(){
    const addbtn = document.getElementById("addbtndish")
    const form = document.getElementById("dishadd")

    addbtn.addEventListener("click", ()=>{
        form.classList.add("show")
        addBackgroundBlur("dishaddform")
    })
}

function display_add_dishform_bgclick(){
    const bg = document.getElementById("dishaddform")

    window.addEventListener("click", (event)=>{
        if(event.target == bg){
            hideform()
            removeBackgroundBlur()
            confirmchanges_removedish()
        }
    })
}

//Remove Dish Part
function removedish_btnclick(){
    const btns = document.querySelectorAll("#removedishbtn")

    for(let btn of btns){
        btn.addEventListener("click", ()=>{
            confirmchanges_displayform()
            //Marks the dish where the removedish btn was clicked
            btn.parentElement.classList.add("active")
            confirmchanges_removedish()
        })
    }
}

//Edit Dish Part
function editdish_name(){
    const btns = document.querySelectorAll("#dishname")
    const form = document.getElementById("changedishname")

    for(let btn of btns){
        btn.addEventListener("click", ()=>{
            form.classList.add("show")
            addBackgroundBlur("restaurantinfoforms")
            //Mark dish as active
            btn.parentElement.classList.add("active")
            getDishInfo()
        })
    }
}

function editdish_price(){
    const btns = document.querySelectorAll("#dishprice")
    const form = document.getElementById("changedishprice")

    for(let btn of btns){
        btn.addEventListener("click", ()=>{
            form.classList.add("show")
            addBackgroundBlur("restaurantinfoforms")
            //Mark dish as active
            btn.parentElement.classList.add("active")
            getDishInfo()
        })
    }
}

function editdish_category(){
    const btns = document.querySelectorAll("#dishcategory")
    const form = document.getElementById("changedishcategory")

    for(let btn of btns){
        btn.addEventListener("click", ()=>{
            form.classList.add("show")
            addBackgroundBlur("restaurantinfoforms")
            //Mark dish as active
            btn.parentElement.classList.add("active")
            getDishInfo()
        })
    }
}


function editdish_backgroundclick(){
    const bg = document.getElementById("restaurantinfoforms")

    document.addEventListener("click", function(event){
        if(event.target == bg){
            removeBackgroundBlur()
            hideform()
            unmarkactive()
        }
    })
}

function editdish_displayconfirmform(){
    const btns = document.querySelectorAll("#editbtn")

    for(let btn of btns){
        btn.addEventListener("click", ()=>{
            confirmchanges_editdishdata()
            hideform()
            removeBackgroundBlur()
            confirmchanges_displayform()
        })
    }
}

//Gets dish info
async function getDishInfo(){
    const dishid = document.querySelector(".active input").value
    const response = await fetch('api/api_dish.php?id=' + dishid)
    const dishinfo = await response.json()

    const activefield = document.querySelector(".show input")

    if(activefield != null){
        if(activefield.name == "dishname"){
            activefield.value = dishinfo['name']
        }
        else if(activefield.name == "dishprice"){
            activefield.value = dishinfo['price']
        }
    }
    //The one active is the select field
    else{
        document.querySelector(".show select").selectedIndex = dishinfo['IdCategory']-1
    }
}

display_add_dishform()
display_add_dishform_bgclick()
removedish_btnclick()
editdish_name()
editdish_price()
editdish_category()
editdish_backgroundclick()
editdish_displayconfirmform()
