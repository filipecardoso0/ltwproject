function showshoppingcart(){
    const btn = document.getElementById("shopping-cart")
    const form = document.getElementById("shoppingcart")

    btn.addEventListener("click", ()=>{
        form.classList.add("show")
        addBackgroundBlur("shoppingcartmodal")
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


showshoppingcart()
shoppingcart_addBackgroundClick()