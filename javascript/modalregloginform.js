function showLoginForm(){
    const loginbtn = document.querySelector("#login")

    loginbtn.addEventListener("click", () => {
        const loginform = document.querySelector("#forms section:first-child")
        loginform.classList.add("show")
        addBackgroundBlur("forms")
    })
}

function showRegisterForm(){
    const registerbtn = document.querySelector("#register")

    registerbtn.addEventListener("click", () => {
        const registerform = document.querySelector("#forms section:last-child")
        registerform.classList.add("show")
        addBackgroundBlur("forms")
    })
}

function cancelModalFormOnBackgroundClick(){
    let bg = document.getElementById("forms")

    window.addEventListener("click", function(event) {
        if (event.target == bg) {
          hideform()
          removeBackgroundBlur()
        }
    })
}

showRegisterForm()
showLoginForm()
cancelModalFormOnBackgroundClick()