function showshoppingcart(){
    const btn = document.getElementById("shopping-cart")
    const form = document.getElementById("shoppingcart")

    btn.addEventListener("click", ()=>{
        form.classList.add("show")
        addBackgroundBlur("shoppingcartmodal")
        shoppingcart_displaydishes()
    })
}

function shoppingcart_addBackgroundClick(){
    const bg = document.getElementById("shoppingcartmodal")

    document.addEventListener("click", function(event){
        if(event.target == bg){
            removeBackgroundBlur()
            hideform()
        }
    })
}


async function shoppingcart_displaydishes(){
    let basket = JSON.parse(localStorage.getItem("cartdata")) || []
    const cartitems = document.getElementById("cartitems")

    if(basket.length == 0){
        const text = document.createElement('p')
        text.innerHTML = "You haven't added anything to your cart yet"
        cartitems.appendChild(text)
    }

    //Gets shopping cart elements
    for (let i = 0; i < basket.length; i++) {
        let obj = basket[i]

        //Appends Carts Elements
        const cartarticle = document.createElement('article')
        const cartsection = document.createElement('cartiteminfo')
        const cartimg = document.createElement('img')
        cartimg.src = "../images/originals/dish_" + obj.id + ".jpg"
        cartimg.style.width = "120px"
        cartimg.style.height = "120px"
        const response = await fetch('../api/api_restaurant.php?id=' + obj.restaurantid)
        const info = await response.json()
        const restaurantTitle = info.name
        document.getElementById("cartrestaurantname").innerText = restaurantTitle
        const priceparagraph = document.createElement('p')
        priceparagraph.innerText = "Price: "
        const quantityparagraph = document.createElement('p')
        quantityparagraph.innerText = "Quantity: "
        const itemprice = document.createElement('a')
        const itemquantity = document.createElement('a')
        itemprice.classList.add('itemprice')
        itemquantity.classList.add('itemquantity')
        itemprice.innerHTML = obj.price
        itemquantity.innerHTML = obj.quantity + "&#8364"
        priceparagraph.appendChild(itemprice)
        quantityparagraph.appendChild(itemquantity)
        cartsection.appendChild(priceparagraph)
        cartsection.append(quantityparagraph)
        cartarticle.appendChild(cartsection)
        cartarticle.appendChild(cartimg)
        cartitems.appendChild(cartarticle)
    }

}



showshoppingcart()
shoppingcart_addBackgroundClick()