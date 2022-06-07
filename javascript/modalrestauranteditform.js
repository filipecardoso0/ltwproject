function display_addrestaurantform(){
    const addbtn = document.getElementById("addbtnrestaurant")
    const form = document.querySelector(".editrestaurantform")

    addbtn.addEventListener("click", () => {
        form.classList.add("show")
        addrestaurant_addBackgroundBlur()
    })
}

function addrestaurant_hideform(){
    const activeform = document.querySelector(".show")
    activeform.classList.remove("show")
}

function confirmchanges_hideform(){

    const activeform = document.querySelector(".show")
    activeform.classList.remove("show")
    const activeremovebtn = document.querySelector(".active")
    activeremovebtn.classList.remove("active")

}

function addrestaurant_addBackgroundBlur(){
    const bg = document.getElementById("addrestaurantform")
    bg.classList.add("modalbody")
}

function removeBackgroundBlur(){
    const bg = document.querySelector(".modalbody")
    bg.classList.remove("modalbody")
}

function addrestaurant_closeform(){
    const CancelBtns = document.querySelectorAll(".formclosebtn")

    for(let CancelBtn of CancelBtns){
        CancelBtn.addEventListener("click", () => {
            removeBackgroundBlur()
            hideform()
        })
    }
}

function addrestaurant_backgroundclick(){
    const bg = document.querySelector("#addrestaurantform")

    document.addEventListener("click", function(event){
        if(event.target == bg){
            removeBackgroundBlur()
            addrestaurant_hideform()
        }
    })
}

function removerestaurant_btnclick(){
    const btns = document.querySelectorAll("#removerestbtn")
    const confirmchangesform = document.querySelector("#confirmchangesform .editinfoform")

    for(let btn of btns){
        btn.addEventListener("click", ()=>{
            confirmchangesform.classList.add("show")
            confirmchanges_showbg()
            btn.parentElement.classList.add("active")
            confirmchanges_confirmbtn()
        })
    }
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

function confirmchanges_confirmbtn(){
    const confirmbtn = document.querySelector("#confirmbtn");
    const activerest = document.querySelector(".active input");
    const activerestid = activerest.value;

    confirmbtn.addEventListener("click", ()=>{
        ///Initializes AJAX POST REQUEST TO action_editprofile.php page
        const xml = new XMLHttpRequest();
        xml.open("post", "../actions/action_removerestaurant.php")
        //This is necessary in POST method (encode type)
        xml.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
        //Sends the post data
        xml.send(encodeForAjax({id: activerestid}))
        //Removes selected restaurant
        document.querySelector("article.active").remove();
        removeBackgroundBlur()
        confirmchanges_hideform()
    })
}

display_addrestaurantform()
addrestaurant_closeform()
addrestaurant_backgroundclick()
removerestaurant_btnclick()
confirmchanges_backgroundclick()
confirmchanges_cancelbtn()
confirmchanges_confirmbtn()
