let t = document.getElementById("password"),
a = document.querySelector(".password-toggle-icon i");
a &&
a.addEventListener("click", function () {
    "password" === t.type ? ((t.type = "text"), a.classList.remove("fa-eye"), a.classList.add("fa-eye-slash")) : ((t.type = "password"), a.classList.remove("fa-eye-slash"), a.classList.add("fa-eye"));
});
let n = document.getElementById("passwords"),
s = document.querySelector(".password-toggle-icons i");
s &&
s.addEventListener("click", function () {
    "password" === n.type ? ((n.type = "text"), s.classList.remove("fa-eye"), s.classList.add("fa-eye-slash")) : ((n.type = "password"), s.classList.remove("fa-eye-slash"), s.classList.add("fa-eye"));
});

$(document).ready(function () {

    var hamburger = $(".hamburger-init"),
      menu_wrapper = $(".menu-wrapper"),
      menu = $(".menu"),
      item_with_children = $(".menu-item-has-children");
  
    // logic
    hamburger.on("click", function () {
      $(".container").toggleClass("hamburger-guide");
      $(this).toggleClass("active");
      menu_wrapper.toggleClass("visible");
      menu.toggleClass("menu-active");
    });
  
    item_with_children.on("click", function () {
      $(this).toggleClass("sub-menu-active");
      $(this).children(".menu").slideToggle();
    });
  });