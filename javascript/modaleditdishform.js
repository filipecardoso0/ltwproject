function display_add_dishform(){
    const addbtn = document.getElementById("addbtndish")
    const form = document.getElementById("dishadd")

    addbtn.addEventListener("click", ()=>{
        form.classList.add("show")
        addBackgroundBlur("dishaddform")
    })
}

function display_add_dishform_bgclick(){
    const bg = document.getElementById("dishaddform")

    window.addEventListener("click", (event)=>{
        if(event.target == bg){
            hideform()
            removeBackgroundBlur()
        }
    })
}

display_add_dishform()
display_add_dishform_bgclick()