function show_modaldishinfoform(){
    const dishimages = document.querySelectorAll(".dishimage")
    const form = document.getElementById("dishinfo")

    for(let dishimage of dishimages){
        dishimage.addEventListener("click",  () => {
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
    let currquantity = 1

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
    const currquantityfield = document.getElementById("quantityammount")
    currquantity = parseInt(currquantityfield.innerHTML)

    addbtn.addEventListener("click", ()=>{
        currquantity++;
        currquantityfield.innerHTML = currquantity;
    })

    rmvbtn.addEventListener("click", ()=>{
        if(currquantity > 1){
            currquantity--;
            currquantityfield.innerHTML = currquantity;
        }
    })

    const cartbtn = document.getElementById("add2cartbtn")

    cartbtn.addEventListener("click", ()=>{

        const dishprice = forminfo['price']
        const dishname = forminfo['name']
        const productquantity = document.getElementById("quantityammount").innerHTML
        const restaurantid = document.getElementById("restaurantid").value
        const dishid = document.querySelector(".active input").value


        let basket = JSON.parse(localStorage.getItem("cartdata")) || []

        basket.push({
            id: dishid,
            price: dishprice,
            quantity: productquantity,
            name: dishname,
            restaurantid: restaurantid,
        });

        //Adds values to local storage
        localStorage.setItem("cartdata", JSON.stringify(basket))

        //Reset count value
        document.getElementById("quantityammount").innerHTML = 1
        //Close modal
        hideform()
        removeBackgroundBlur()
    })

}

/*


function addItemToCart(){

const currquantityfield = document.getElementById("quantityammount");
const quantity = parseInt(currquantityfield.innerHTML)
const dishid = document.querySelector(".active input").value
const restaurantid = document.getElementById("restaurantid")

const cartbtn = document.getElementById("add2cartbtn")

cartbtn.addEventListener("click", ()=>{
    console.log(quantity)
    console.log(dishid)
    console.log(restaurantid)
})


const cartbtn = document.getElementById("add2cartbtn")

cartbtn.addEventListener("click", ()=>{

    let basket = JSON.parse(localStorage.getItem("cartdata")) || []

    console.log("Dish id: " + dishid)
    console.log("Price: " + price)
    console.log("Currquantity: " + currquantity)
    console.log("Dish name: " + dishname)
    console.log("Restaurant id: " + restaurantid)

    basket.push({
        id: dishid,
        price: price,
        quantity: currquantity,
        name: dishname,
        restaurantid: restaurantid,
    });

    //Adds values to local storage
    localStorage.setItem("cartdata", JSON.stringify(basket))

    //Reset count value
    document.getElementById("quantityammount").innerHTML = 1
    //Close modal
    hideform()
    removeBackgroundBlur()

},{
    once: true,
})




}

 */

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
