add2cartbtn.addEventListener("click", ()=>{
    //Builds Shopping Cookie Info
    /*
    const cartitems = document.getElementById("cartitems")
    const cartarticle = document.createElement('article')
    const cartsection = document.createElement('cartiteminfo')
    const cartimg = document.createElement('img')
    cartimg.src = "../images/thumbs_medium/dish_" + forminfo['IdDish'] + ".jpg"
    titlecart.innerHTML = document.querySelector("#restaurantheader h1").innerHTML
    const priceparagraph = document.createElement('p')
    const quantityparagraph = document.createElement('p')
    const itemprice = document.createElement('a')
    const itemquantity = document.createElement('a')
    itemprice.classList.add('itemprice')
    itemquantity.classList.add('itemquantity')
    itemprice.innerHTML = forminfo['price']  + "&#8364"
    itemquantity.innerHTML = currquantity + "&#8364"


    //Append to shopping cart html
    priceparagraph.appendChild(itemprice)
    quantityparagraph.appendChild(itemquantity)
    cartsection.appendChild(priceparagraph)
    cartsection.appendChild(quantityparagraph)
    cartarticle.appendChild(img)
    cartarticle.appendChild(cartsection)
    cartitems.append(cartarticle)



     */
    //clearCookie('myCart')


    const json_str2 = getCookie('myCart')
    let totalcart = JSON.parse(json_str2)

    const dishprice = forminfo['price']
    const restaurantid = document.querySelector("#restaurantid").value

    const cart = ['DishId: ' + dishid, 'Quantity: ' + currquantity, 'Price: ' + dishprice, 'IdRestaurant: ' + restaurantid, ':', ]
    totalcart = totalcart.push(cart)
    console.log(totalcart)
    const json_str = JSON.stringify(totalcart)

    setCookie('myCart', json_str, '30')

    const json_str1 = getCookie('myCart')
    const viewcart = JSON.parse(json_str1)

    console.log(viewcart)


    //Close modal
    hideform()
    removeBackgroundBlur()

}, {
    once: true,
})

function clearCookie(cookiename){
    setCookie(cookiename,"",-1);
}

function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    const expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    const name = cname + "=";
    const ca = document.cookie.split(';');
    for(let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}