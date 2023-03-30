const show_checkbox = document.getElementById("show");
const password = document.getElementById("password");

show_checkbox.addEventListener("click", function(){
    const show_checkbox = document.getElementById("show");
    const password = document.getElementById("password");

    if(show_checkbox.checked){
        password.type = "text";
    } else {
        password.type = "password";
    };
});

const custser = document.getElementsByClassName("custser")[0];

custser.addEventListener("click", function(){
    location.href = "#";
});