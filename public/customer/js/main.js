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
let f = document.getElementById("cpasswords"),
g = document.querySelector(".password-toggle-iconc i");
g &&
g.addEventListener("click", function () {
    "password" === f.type ? ((f.type = "text"), g.classList.remove("fa-eye"), g.classList.add("fa-eye-slash")) : ((f.type = "password"), g.classList.remove("fa-eye-slash"), g.classList.add("fa-eye"));
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


  $(document).ready(function () {
    // required elements
    var imgPopup = $(".img-popup");
    var imgCont = $(".container__img-holder");
    var popupImage = $(".img-popup img");
    var closeBtn = $(".close-btn");
  
    // handle events
    imgCont.on("click", function () {
      var img_src = $(this).children("img").attr("src");
      imgPopup.children("img").attr("src", img_src);
      imgPopup.addClass("opened");
    });
  
    $(imgPopup, closeBtn).on("click", function () {
      imgPopup.removeClass("opened");
      imgPopup.children("img").attr("src", "");
    });
  
    popupImage.on("click", function (e) {
      e.stopPropagation();
    });
  });
//   new
  document.addEventListener('DOMContentLoaded', function () {
    // Hide all sections initially
    const sections = document.querySelectorAll('.form-divide');
    sections.forEach(section => section.style.display = 'none');

    // Show the first section
    sections[0].style.display = 'block';

    // Function to validate the current section
    function validateSection(section) {
        let isValid = true;
        const requiredFields = section.querySelectorAll('input[required], select[required]');

        requiredFields.forEach(field => {
            if (!field.value) {
                isValid = false;
                field.classList.add('is-invalid'); // Add error class for styling
            } else {
                field.classList.remove('is-invalid'); // Remove error class if valid
            }
        });

        return isValid;
    }

    // Add event listeners to buttons
    const nextButtons = document.querySelectorAll('.next-button');
    const prevButtons = document.querySelectorAll('.prev-button');

    nextButtons.forEach((btn, index) => {
        btn.addEventListener('click', function () {
            if (validateSection(sections[index])) {
                sections[index].style.display = 'none';
                sections[index + 1].style.display = 'block';
            }
        });
    });

    prevButtons.forEach((btn, index) => {
        btn.addEventListener('click', function () {
            sections[index + 1].style.display = 'none';
            sections[index].style.display = 'block';
        });
    });
});