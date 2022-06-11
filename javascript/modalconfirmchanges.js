//GENERAL FUNCTIONS -> MANAGE MODAL DISPLAY ONLY

//TODO SHOW SOME NICE ALERTS/NOTIFICATIONS -> LIKE THE PHP ONES BUT IN JS OR EVEN DISPLAY THE PHP ONES WITH JS HELP AND THEN CLEAR THE ARRAY

function confirmchanges_displayform(){
    const confirmchangesform = document.querySelector("#confirmchangesform .editinfoform")
    confirmchangesform.classList.add("show")
    addBackgroundBlur("confirmchangesform")
}

function confirmchanges_backgroundclick(){
    const bg = document.getElementById("confirmchangesform")

    document.addEventListener("click", function(event){
        if(event.target == bg){
            removeBackgroundBlur()
            hideform()
            unmarkactive()
        }
    })
}

function confirmchanges_cancelbtn(){
    const cancelbtn = document.getElementById("cancelbtn")

    cancelbtn.addEventListener("click", ()=> {
        removeBackgroundBlur()
        hideform()
        unmarkactive()
    })
}


// Modifier Functions -> ADD, DELETE OR UPDATE SOMETHING FROM THE DATABASE

//RESTAURANT FUNCTIONS

//Removes Restaurant
function confirmchanges_confirmbtn_removerestaurant(){
    const confirmbtn = document.querySelector("#confirmbtn");
    const activerest = document.querySelector(".active input");
    const activerestid = activerest.value;

    confirmbtn.addEventListener("click", ()=>{
        //Performs AJAX Request
        const xhr = new XMLHttpRequest();
        xhr.open("post", "../actions/action_removerestaurant.php")
        //This is necessary in POST method (encode type)
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
        //Sends the post data
        xhr.send(encodeForAjax({id: activerestid}))
        //Removes selected restaurant from HTML
        document.querySelector("article.active").remove()
        //Closes form
        removeBackgroundBlur()
        hideform()
    })
}

//Adds restaurant
function confirmchanges_editrestaurantdata(){
    //First we get fields data
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

    const confirmbtn = document.getElementById("confirmbtn")

    confirmbtn.removeEventListener("click", ()=>{})
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
        hideform()
        unmarkactive()
        //NOTE: MY CLICK EVENT LISTENER WAS BEING FIRED MORE THAN JUST ONCE FOR SOME
        //WEIRD REASON. SO AFTER GOOGLING A LOT I FOUND THE JQUERY'S SOLUTION THAT WAS USING .ONE
        //AFTER THAT I JUST FOUND THE VANILLA JS ALTERNATIVE AND NOW IT IS WORKING AS INTENDED
    }, {
        once: true,
    })
}


//DISH FUNCTIONS

//Remove Dish
function confirmchanges_removedish(){
    const btn = document.getElementById("confirmbtn")
    const dishid = document.querySelector(".active input").value

    btn.addEventListener("click", ()=>{
        //Performs AJAX Request
        const xhr = new XMLHttpRequest();
        xhr.open("post", "../actions/action_removedish.php")
        //This is necessary in POST method (encode type)
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
        //Sends the post data
        xhr.send(encodeForAjax({id: dishid}))
        //Removes selected dish from html
        document.querySelector("article.active").remove()
        //Closes form
        removeBackgroundBlur()
        hideform()
    })
}

//Edit Dish info

function confirmchanges_editdishdata(){
    const btn = document.getElementById("confirmbtn")
    const dishid = document.querySelector(".active input").value
    let value = null
    let field = null
    let select = null

    //Gets input/select fields data
    const input = document.querySelector(".show input")

    if(input != null){
        value = input.value
        if(input.name == "dishname"){
            field = "Name"
        }
        else if(input.name == "dishprice"){
            field = "Price"
        }
    }
    else{
        select = document.querySelector(".show select")
        field = "Category"
        value = select.selectedIndex+1
    }

    btn.addEventListener("click", ()=>{
    //Performs AJAX Request
    const xhr = new XMLHttpRequest();
    xhr.open("post", "../actions/action_editdish.php")
    //This is necessary in POST method (encode type)
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    //Sends the post data
    console.log("Field: " + field + " Value: " + value)
    xhr.send(encodeForAjax({id: dishid, field: field, value: value}))
    //Updates HTML
    if(field == "Name"){
        document.querySelector(".active #dishname a").innerHTML = value
    }
    else if(field == "Price"){
        document.querySelector(".active #dishprice a").innerHTML = value
    }
    else{
        document.querySelector(".active #dishcategory a").innerHTML = select.options[select.selectedIndex].text //Gets selected field text by id
    }
    //Closes form and removes background blur
    removeBackgroundBlur()
    hideform()
    unmarkactive()
    }, {
        once: true,
    })

}

confirmchanges_backgroundclick()
confirmchanges_cancelbtn()