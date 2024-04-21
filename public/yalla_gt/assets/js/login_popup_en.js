    let slider_button = document.querySelector(".slider_button");
    let signup_button = document.querySelector(".signup_button");
    let login_button = document.querySelector(".login_button");
    let form_slider = document.querySelector(".form_slider");

    let signup_box = document.querySelector(".signup_box");
    let box = document.querySelector(".box");
    let close_button = document.querySelector(".close_button");
    let main_body = document.body;
    
    let loginPopUpForm = document.querySelector(".loginPopUpForm");
    
    loginPopUpForm.addEventListener('click' , function(){
        main_body.style.overflow="hidden";
        signup_box.classList.add("signup_box_active");
                box.classList.add("active");
    })

    let loginPopUpFormMobile = document.querySelector(".loginPopUpFormMobile");
    
    loginPopUpFormMobile.addEventListener('click' , function(){
        main_body.style.overflow="hidden";
        signup_box.classList.add("signup_box_active");
                box.classList.add("active");
    })

    close_button.onclick = function(){
        main_body.style.overflow="auto";
        signup_box.classList.remove("signup_box_active");
        box.classList.remove("active");
    }

    signup_button.style.color = "#fff";

    login_button.onclick = function () {
        slider_button.style.left = "50%";
        login_button.style.color = "#fff";
        signup_button.style.color = "#000";
        form_slider.style.left = "-100%";
    }
    signup_button.onclick = function () {
        slider_button.style.left = "0%";
        signup_button.style.color = "#fff";
        login_button.style.color = "#000";
        form_slider.style.left = "0%";

    }
