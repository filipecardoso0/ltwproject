//General functions that every modal uses

function removeBackgroundBlur(){
    const bg = document.querySelector(".modalbody")
    if(bg != null)
        bg.classList.remove("modalbody")
}

function hideform(){
    const activeform = document.querySelector(".show")
    if(activeform != null)
        activeform.classList.remove("show")
}

function closeform(){
    const CancelBtns = document.querySelectorAll(".formclosebtn")

    for(let CancelBtn of CancelBtns){
        CancelBtn.addEventListener("click", () => {
            removeBackgroundBlur()
            hideform()
            unmarkactive()
        })
    }
}

function addBackgroundBlur(elementid){
    const bg = document.getElementById(elementid)
    bg.classList.add("modalbody")
}

function unmarkactive(){
    const active = document.querySelector(".active")
    if(active != null)
        active.classList.remove("active")
}

closeform()