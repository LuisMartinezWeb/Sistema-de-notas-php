const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

sign_up_btn.addEventListener('click', () => {
    container.classList.add("sign-up-mode");

    document.querySelector("#name-register").value = "";
    document.querySelector("#surname-register").value = "";
    document.querySelector("#email-register").value = "";
    document.querySelector("#password-register").value = "";

    let validateRegister = document.querySelectorAll(".validate-register");

    let alertForm = document.querySelector(".alertform p");

    if (alertForm) {
        alertForm.remove();
    }

    for (let i = 0; i < validateRegister.length; i++) {
        validateRegister[i].style.border = "none";
    }


});

sign_in_btn.addEventListener('click', () => {
    container.classList.remove("sign-up-mode");

    document.querySelector("#email-login").value = "";
    document.querySelector("#password-login").value = "";

    let validateLogin = document.querySelectorAll(".validate-login")
    let alertForm = document.querySelector(".alertformLogin p");

    if (alertForm) {
        alertForm.remove();
    }
    for (let i = 0; i < validateLogin.length; i++) {
        validateLogin[i].style.border = "none";
    }
});