//General functions that every modal uses

function removeBackgroundBlur(){
    const bg = document.querySelector(".modalbody")
    bg.classList.remove("modalbody")
}

function hideform(){
    const activeform = document.querySelector(".show")
    activeform.classList.remove("show")
}

function closeform(){
    const CancelBtns = document.querySelectorAll(".formclosebtn")

    for(let CancelBtn of CancelBtns){
        CancelBtn.addEventListener("click", () => {
            removeBackgroundBlur()
            hideform()
        })
    }
}

function addBackgroundBlur(elementid){
    const bg = document.getElementById(elementid)
    bg.classList.add("modalbody")
}

removeBackgroundBlur()
hideform()
closeform()