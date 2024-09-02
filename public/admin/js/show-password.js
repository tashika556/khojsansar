"use strict"
let createpassword = (type, ele) => {
    let passwordField = document.getElementById(type);
    let icon = ele.childNodes[0].classList;
    if (passwordField.type === "password") {
        passwordField.type = "text";
        icon.remove("fa-eye");
        icon.add("fa-eye-slash");
    } else {
        passwordField.type = "password";
        icon.remove("fa-eye-slash");
        icon.add("fa-eye");
    }
}
