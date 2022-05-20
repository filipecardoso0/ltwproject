let count = 0

function showLoginForm(){
    const loginbtn = document.querySelector("header a:nth-child(3)")

    const bg = document.querySelector("#modalbackground")

        
    //Only opens modal if there is no modal open
    loginbtn.addEventListener("click", () => {
        if(!bg.classList.contains("modalbody")){
        const loginform = document.querySelector("#forms section:first-child")
        loginform.classList.add("show")
        addBackgroundColour()
        }
    })
}

function showRegisterForm(){
    const registerbtn = document.querySelector("header a:nth-child(4)")

    const bg = document.querySelector("#modalbackground")

    registerbtn.addEventListener("click", () => {
        //Only opens modal if there is no modal open
        if(!bg.classList.contains("modalbody")){
            const registerform = document.querySelector("#forms section:last-child")
            registerform.classList.add("show")
            addBackgroundColour()
        }
    })
}


function hideForm(){
    const activeform = document.querySelector(".show")
    activeform.classList.remove("show")
    removeBackgroundColour()
}


function addBackgroundColour(){
    //Changes body background colour in order to fake a blur effect
    const bg = document.querySelector("#modalbackground")
    bg.classList.add("modalbody")

}

function removeBackgroundColour(){
    //Changes body background colour in order to remove the blur effect
    const bg = document.querySelector("#modalbackground")
    bg.classList.remove("modalbody")
}


function cancelModalFormOnCancelClick(){
    const CancelBtns = document.querySelectorAll(".formclosebtn")

    //Cancel by clicking form btn
    for(let CancelBtn of CancelBtns){
        //If body gets clicked then cancel form
        CancelBtn.addEventListener("click", () => {
            hideForm()
        })
    }

    //TO DO -> ADD THE FUNCTIONALITY TO EXIT THE MODAL FORM BY CLICKING ANYWHERE ON THE BG
}

function cancelModalFormOnBackgroundClick(){
    let bg = document.getElementById("modalbackground")

    window.addEventListener("click", function(event) {
        if (event.target == bg) {
          hideForm()
        }
    })
}


showRegisterForm()
showLoginForm()
cancelModalFormOnCancelClick()
cancelModalFormOnBackgroundClick()