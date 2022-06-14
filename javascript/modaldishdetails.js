//Global Variables
let currquantity;

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

    price.innerHTML = forminfo['price']
    dishname.innerHTML = forminfo['name']
    img.src = "../images/thumbs_medium/dish_" + forminfo['IdDish'] + ".jpg"
}

async function getDishInformation(){
    const restaurantid = document.querySelector(".active input").value
    const response = await fetch('../api/api_dish.php?id=' + restaurantid)
    const info = await response.json()

    return info
}

function managedishquantity(){
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

}

show_modaldishinfoform()
modaldishinfoform_backgroundclick()
managedishquantity()
