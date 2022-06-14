function show_modaldishinfoform(){
    const dishimages = document.querySelectorAll(".dishimage")
    const form = document.getElementById("dishinfo")

    for(let dishimage of dishimages){
        dishimage.addEventListener("click", ()=>{
            form.classList.add("show")
            addBackgroundBlur("dishdetailsform")
            dishimage.parentElement.classList.add("active")
            drawFormInformation()
        })
    }
}

function modaldishinfoform_backgroundclick(){
    const bg = document.getElementById("dishdetailsform")

    document.addEventListener("click", function(event){
        if(event.target == bg){
            removeBackgroundBlur()
            hideform()
            unmarkactive()
        }
    })
}

async function drawFormInformation(){
    const forminfo = await getDishInformation()

    const price = document.querySelector("#dishprice a")
    const dishname = document.querySelector("#dishdetails h2")
    const img = document.getElementById("modaldishimage")
    const likebtn = document.getElementById("favbtndish")
    const dishid = document.querySelector(".active input").value

    let found = false
    let currquantity = 0

    price.innerHTML = forminfo['price']
    dishname.innerHTML = forminfo['name']
    img.src = "../images/thumbs_medium/dish_" + forminfo['IdDish'] + ".jpg"

    //Handles Restaurant likes -> On form open
    found = await assertLikeDish(dishid)

    if(found){
        likebtn.style.color = "red"
    }
    else{
        likebtn.style.color = "white"
    }

    likebtn.addEventListener("click", async () => {

        //Asserts again if the user likes or not the restaurant
        found = await assertLikeDish(dishid)

        if (found) {
            //User already liked the restaurant, so we want to remove it from his favourites
            removeDishFromFavourites(userid, dishid, likebtn)
        } else {
            //User has not liked yet, so we will add the restaurant to favourites
            addDishToFavourites(userid, dishid, likebtn)
        }
    })

    //Manage dish quantity
    const addbtn = document.getElementById("addquantity")
    const rmvbtn = document.getElementById("removequantity")
    const currquantityfield = document.getElementById("quantityammount");
    currquantity = parseInt(currquantityfield.innerHTML)

    addbtn.addEventListener("click", ()=>{
        currquantity++;
        currquantityfield.innerHTML = currquantity;
    })

    rmvbtn.addEventListener("click", ()=>{
        if(currquantity > 0){
            currquantity--;
            currquantityfield.innerHTML = currquantity;
        }
    })

    additem2Cart()

}

function additem2Cart(){

    const cartbtn = document.getElementById("")

    add2cartbtn.addEventListener("click", ()=>{
        /*
        const price = forminfo['price']
        const restaurantid = document.getElementById("restaurantid").value
        const dishname = forminfo['name']

        let basket = JSON.parse(localStorage.getItem("cartdata")) || []

        basket.push({
            id: dishid,
            price: price,
            quantity: currquantity,
            name: dishname,
            restaurantid: restaurantid,
        });

        localStorage.setItem("cartdata", JSON.stringify(basket))

         */

        console.log("Teste")

        //Close modal
        hideform()
        removeBackgroundBlur()

    }, {
        once: true,
    })

}

async function getDishInformation(){
    const dishid = document.querySelector(".active input").value
    const response = await fetch('../api/api_dish.php?id=' + dishid)
    const info = await response.json()

    return info
}

async function assertLikeDish(dishid){
    const userdishesliked = await getUserLikedDishes()

    for (let i = 0; i < userdishesliked.length; i++) {
        let obj = userdishesliked[i]

        if(obj.IdDish == dishid){
            return true
        }
    }

    return false
}

function removeDishFromFavourites(userid, dishid, likebtn){
    //Performs AJAX Request
    const xhr = new XMLHttpRequest();
    xhr.open("post", "../actions/action_removefavouriterestaurant.php")
    //This is necessary in POST method (encode type)
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    //Sends the post data
    xhr.send(encodeForAjax({userid: userid, dishid: dishid}))
    //Updates like btn color
    likebtn.style.color = "black"
}

function addDishToFavourites(userid, dishid, likebtn){
    //Performs AJAX Request
    const xhr = new XMLHttpRequest();
    xhr.open("post", "../actions/action_adddishtofavourites.php")
    //This is necessary in POST method (encode type)
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    //Sends the post data
    xhr.send(encodeForAjax({userid: userid, dishid: dishid}))
    //Updates like btn color
    likebtn.style.color = "red"
}

async function getUserLikedDishes(){
    const userid = document.getElementById("userid").value
    const response = await fetch('../api/api_userlikeddishes.php?id=' + userid);
    const info = await response.json()

    return info
}

show_modaldishinfoform()
modaldishinfoform_backgroundclick()
