// testimonial end
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
// gallery end

var btn = $("#button");

$(window).scroll(function () {
  if ($(window).scrollTop() > 300) {
    btn.addClass("show");
  } else {
    btn.removeClass("show");
  }
});

btn.on("click", function (e) {
  e.preventDefault();
  $("html, body").animate({ scrollTop: 0 }, "300");
});

// slide up end
$(".testimonial_block").slick({
  dots: false,
  arrows: true,
  autoplay: true,
  infinite: true,

  speed: 400,
  slidesToShow: 1,
  slidesToScroll: 1,
});

// testimonial end

$(".restaurant_detail_slider").slick({
  dots: false,
  arrow: true,
  infinite: true,
  autoplay: true,
  fade: false,
  speed: 300,
  slidesToShow: 1,
  slidesToScroll: 1,
});
$(".restaurant_slider").slick({
  dots: false,
  arrow: false,
  infinite: true,
  autoplay: true,
  fade: false,
  speed: 300,
  slidesToShow: 3,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
      },
    },

    {
      breakpoint: 991,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
      },
    },
    {
      breakpoint: 556,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      },
    },
  ],
});
// restaurant end
$(document).ready(function () {
  //jquery for toggle sub menus
  $(".sub-btn-large").click(function () {
    $(this).next(".sub-menu-large").slideToggle();
    $(this).find(".dropdown").toggleClass("rotate");
  });

  //jquery for expand and collapse the sidebar
  $(".menu-btn-large").click(function () {
    $(".side-bar-large").addClass("active");
    $(".menu-btn-large").css("visibility", "hidden");
  });

  $(".close-btn-large").click(function () {
    $(".side-bar-large").removeClass("active");
    $(".menu-btn-large").css("visibility", "visible");
  });
});
// menu mobile end

$(document).ready(function () {
  //jquery for toggle sub menus
  $(".sub-btn").click(function () {
    $(this).next(".sub-menu").slideToggle();
    $(this).find(".dropdown").toggleClass("rotate");
  });

  //jquery for expand and collapse the sidebar
  $(".menu-btn").click(function () {
    $(".side-bar").addClass("active");
    $(".menu-btn").css("visibility", "hidden");
  });

  $(".close-btn").click(function () {
    $(".side-bar").removeClass("active");
    $(".menu-btn").css("visibility", "visible");
  });
});
// menu mobile end

////7///////////////////////////////////////////////////////////////////////
// city_state.js ///////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////

var countries = Object();
countries["Bagmati"] =
  "Sindhuli|Ramechhap|Dolakha|Bhaktapur|Dhading|Kathmandu|Kavrepalanchok|Lalitpur|Nuwakot|Rasuwa|Sindhupalchok|Chitwan|Makwanpur";
countries["Madhesh"] =
  "Sarlahi District|Dhanusha District|Bara District|Rautahat District|Saptari District|Siraha District|Mahottari District|Parsa District";
countries["Province No.1"] =
  "Jhapa|Ilam|Panchthar|Taplejung|Sankhuwasabha|Terhathum|Bhojpur|Dhankuta|Khotang|Sunsari|Morang|Solukhumbu|Okhaldhunga|Udaipur";
countries["Gandaki"] =
  "Kaski District|Syangja District|Tanahun District|Lamjung District|Manang District|Gorkha District|Parbat District|Mustang District|Myagdi District|Baglung District|Nawalparasi District";
countries["Lumbini"] =
  "Arghakhanchi|Banke|Bardiya|Dang|Gulmi|Kapilvastu|Parasi|Palpa|Pyuthan|Rolpa|Rukum|Rupandehi";
countries["Karnali"] =
  "Western Rukum|Salyan|Dolpa|Humla|Jumla|Kalikot|Mugu|Surkhet|Dailekh|Jajarkot";
countries["Sudurpashchim"] =
  "Achham|Baitadi|Bajhang|Bajura|Dadeldhura|Darchula|Doti|Kailali|Kanchanpur";

////////////////////////////////////////////////////////////////////////////

var city_states = Object();

//Sudurpashchim
city_states["Achham"] =
  "Asian Chicken Soup||Hot & Sour Soup Chicken|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Baitadi"] =
  "Veg Momo Chilly||Buff Momo Kothey|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Bajhang"] =
  "Asian Chicken Soup||Hot & Sour Soup Chicken|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Panchthar"] =
  "Veg Momo Chilly||Buff Momo Kothey|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Bajura"] =
  "Asian Chicken Soup||Hot & Sour Soup Chicken|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Dadeldhura"] =
  "Veg Momo Chilly||Buff Momo Kothey|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Darchula"] =
  "Veg Momo Chilly||Buff Momo Kothey|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Doti"] =
  "Veg Momo Chilly||Buff Momo Kothey|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Kailali"] =
  "Veg Momo Chilly||Buff Momo Kothey|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Kanchanpur"] =
  "Veg Momo Chilly||Buff Momo Kothey|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";

//Madhesh
//Province No.1
city_states["Jhapa"] =
  "Asian Chicken Soup||Hot & Sour Soup Chicken|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Ilam"] =
  "Veg Momo Chilly||Buff Momo Kothey|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Rautahat District"] =
  "Asian Chicken Soup||Hot & Sour Soup Chicken|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Panchthar"] =
  "Veg Momo Chilly||Buff Momo Kothey|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Taplejung"] =
  "Asian Chicken Soup||Hot & Sour Soup Chicken|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Sankhuwasabha"] =
  "Veg Momo Chilly||Buff Momo Kothey|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Terhathum"] =
  "Veg Momo Chilly||Buff Momo Kothey|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Bhojpur"] =
  "Veg Momo Chilly||Buff Momo Kothey|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Dhankuta"] =
  "Veg Momo Chilly||Buff Momo Kothey|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Khotang"] =
  "Veg Momo Chilly||Buff Momo Kothey|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Sunsari"] =
  "Veg Momo Chilly||Buff Momo Kothey|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Morang"] =
  "Veg Momo Chilly||Buff Momo Kothey|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Solukhumbu"] =
  "Veg Momo Chilly||Buff Momo Kothey|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Udaipur"] =
  "Veg Momo Chilly||Buff Momo Kothey|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
//Madhesh
city_states["Sarlahi District"] =
  "Asian Chicken Soup||Hot & Sour Soup Chicken|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Dhanusha District"] =
  "Veg Momo Chilly||Buff Momo Kothey|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Rautahat District"] =
  "Asian Chicken Soup||Hot & Sour Soup Chicken|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Saptari District"] =
  "Veg Momo Chilly||Buff Momo Kothey|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Siraha District"] =
  "Asian Chicken Soup||Hot & Sour Soup Chicken|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Mahottari District"] =
  "Veg Momo Chilly||Buff Momo Kothey|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Parsa District"] =
  "Veg Momo Chilly||Buff Momo Kothey|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";

// gandaki
city_states["Kaski District"] =
  "Asian Chicken Soup||Hot & Sour Soup Chicken|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Syangja District"] =
  "Veg Momo Chilly||Buff Momo Kothey|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Tanahun District"] =
  "Asian Chicken Soup||Hot & Sour Soup Chicken|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Lamjung District"] =
  "Veg Momo Chilly||Buff Momo Kothey|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Manang District"] =
  "Asian Chicken Soup||Hot & Sour Soup Chicken|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Gorkha District"] =
  "Veg Momo Chilly||Buff Momo Kothey|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Parbat District"] =
  "Veg Momo Chilly||Buff Momo Kothey|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Mustang District"] =
  "Asian Chicken Soup||Hot & Sour Soup Chicken|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Myagdi District"] =
  "Veg Momo Chilly||Buff Momo Kothey|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Baglung District"] =
  "Asian Chicken Soup||Hot & Sour Soup Chicken|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Nawalparasi District"] =
  "Veg Momo Chilly||Buff Momo Kothey|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";

// Lumbini
city_states["Arghakhanchi"] =
  "Asian Chicken Soup||Hot & Sour Soup Chicken|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Banke"] =
  "Veg Momo Chilly||Buff Momo Kothey|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Bardiya"] =
  "Asian Chicken Soup||Hot & Sour Soup Chicken|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Dang"] =
  "Veg Momo Chilly||Buff Momo Kothey|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Gulmi"] =
  "Asian Chicken Soup||Hot & Sour Soup Chicken|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Kapilvastu"] =
  "Veg Momo Chilly||Buff Momo Kothey|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Parasi"] =
  "Veg Momo Chilly||Buff Momo Kothey|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Palpa"] =
  "Asian Chicken Soup||Hot & Sour Soup Chicken|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Pyuthan"] =
  "Veg Momo Chilly||Buff Momo Kothey|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Rolpa"] =
  "Asian Chicken Soup||Hot & Sour Soup Chicken|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Rukum"] =
  "Veg Momo Chilly||Buff Momo Kothey|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Rupandehi"] =
  "Veg Momo Chilly||Buff Momo Kothey|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
// karnali
city_states["Western Rukum"] =
  "Asian Chicken Soup||Hot & Sour Soup Chicken|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Salyan"] =
  "Veg Momo Chilly||Buff Momo Kothey|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Dolpa"] =
  "Asian Chicken Soup||Hot & Sour Soup Chicken|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Humla"] =
  "Veg Momo Chilly||Buff Momo Kothey|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Jumla"] =
  "Asian Chicken Soup||Hot & Sour Soup Chicken|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Kalikot"] =
  "Veg Momo Chilly||Buff Momo Kothey|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Mugu"] =
  "Veg Momo Chilly||Buff Momo Kothey|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Surkhet"] =
  "Asian Chicken Soup||Hot & Sour Soup Chicken|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Dailekh"] =
  "Veg Momo Chilly||Buff Momo Kothey|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Jajarkot"] =
  "Asian Chicken Soup||Hot & Sour Soup Chicken|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";

//Bagmati
city_states["Sindhuli"] =
  "Veg Momo Chilly||Buff Momo Kothey|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Ramechhap"] =
  "Veg Momo Chilly||Buff Momo Kothey|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Dolakha"] =
  "Veg Momo Chilly||Buff Momo Kothey|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Bhaktapur"] =
  "Veg Momo Chilly||Buff Momo Kothey|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Dhading"] =
  "Veg Momo Chilly||Buff Momo Kothey|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Kathmandu"] =
  "Veg Momo Chilly||Buff Momo Kothey|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Kavrepalanchok"] =
  "Veg Momo Chilly||Buff Momo Kothey|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Lalitpur"] =
  "Veg Momo Chilly||Buff Momo Kothey|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Nuwakot"] =
  "Veg Momo Chilly||Buff Momo Kothey|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Rasuwa"] =
  "Veg Momo Chilly||Buff Momo Kothey|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Sindhupalchok"] =
  "Veg Momo Chilly||Buff Momo Kothey|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Chitwan"] =
  "Veg Momo Chilly||Buff Momo Kothey|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";
city_states["Makwanpur"] =
  "Veg Momo Chilly||Buff Momo Kothey|Chicken Momo Chilly|Chicken Momo Steamed|Veg-Momo|Chicken Momo Kothey";

////////////////////////////////////////////////////////////////////////////

html = "";
for (region in countries)
  html += '<option value="' + region + '">' + region + "</option>";

document.getElementById("region").innerHTML =
  document.getElementById("region").innerHTML + html;

function set_country(oRegionSel, oCountrySel, oCity_StateSel) {
  var countryArr;
  oCountrySel.length = 0;
  oCity_StateSel.length = 0;
  var region = oRegionSel.options[oRegionSel.selectedIndex].text;
  if (countries[region]) {
    oCountrySel.disabled = false;
    oCity_StateSel.disabled = true;
    oCountrySel.options[0] = new Option("Districts", "");
    countryArr = countries[region].split("|");
    for (var i = 0; i < countryArr.length; i++)
      oCountrySel.options[i + 1] = new Option(countryArr[i], countryArr[i]);
    document.getElementById("txtregion").innerHTML = region;
    document.getElementById("txtplacename").innerHTML = "";
  } else oCountrySel.disabled = true;
}

function set_city_state(oCountrySel, oCity_StateSel) {
  var city_stateArr;
  oCity_StateSel.length = 0;
  var country = oCountrySel.options[oCountrySel.selectedIndex].text;
  if (city_states[country]) {
    oCity_StateSel.disabled = false;
    oCity_StateSel.options[0] = new Option("Select Menu", "");
    city_stateArr = city_states[country].split("|");
    for (var i = 0; i < city_stateArr.length; i++)
      oCity_StateSel.options[i + 1] = new Option(
        city_stateArr[i],
        city_stateArr[i]
      );
  } else oCity_StateSel.disabled = true;
}

function print_city_state(oCountrySel, oCity_StateSel) {
  var country = oCountrySel.options[oCountrySel.selectedIndex].text;
  var city_state = oCity_StateSel.options[oCity_StateSel.selectedIndex].text;
}

/////////////////// search end

const slides = document.querySelectorAll(".slide");
const controls = document.querySelectorAll(".control");
let activeSlide = 0;
let prevActive = 0;

changeSlides();
let int = setInterval(changeSlides, 4000);

function changeSlides() {
  slides[prevActive].classList.remove("active");
  controls[prevActive].classList.remove("active");

  slides[activeSlide].classList.add("active");
  controls[activeSlide].classList.add("active");

  prevActive = activeSlide++;

  if (activeSlide >= slides.length) {
    activeSlide = 0;
  }

  console.log(prevActive, activeSlide);
}

controls.forEach((control) => {
  control.addEventListener("click", () => {
    let idx = [...controls].findIndex((c) => c === control);
    activeSlide = idx;

    changeSlides();

    clearInterval(int);
    int = setInterval(changeSlides, 4000);
  });
});
// slider home end
$(".slider").slick({
  dots: false,
  arrow: false,
  infinite: true,
  autoplay: true,
  fade: true,
  speed: 300,
  slidesToShow: 1,
});
//  slider end
$(".sidebar_job-slider").slick({
  dots: false,
  arrow: false,
  infinite: true,
  autoplay: true,
  fade: false,
  speed: 400,
  slidesToShow: 1,
});
//  sidebar job slider end

// NAVE scroll end
$(".map_slider").slick({
  dots: false,
  arrow: true,
  infinite: true,
  autoplay: true,

  speed: 300,
  slidesToShow: 1,
});
//  map_slider end

$(document).ready(function () {
  $(".item--social-icon").hide();
  $(".item--social-btn").click(function () {
    $(".item--social-icon").toggle();
  });
});
// team end

$(".job_slider").slick({
  dots: false,
  arrow: false,
  infinite: true,
  autoplay: true,
  fade: false,
  speed: 300,
  slidesToShow: 3,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
      },
    },

    {
      breakpoint: 991,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      },
    },
  ],
});
// job slider end

// read more start
class readMore {
  constructor() {
    this.content = ".readmore__content";
    this.buttonToggle = ".readmore__toggle";
  }

  bootstrap() {
    this.setNodes();
    this.init();
    this.addEventListeners();
  }

  setNodes() {
    this.nodes = {
      contentToggle: document.querySelector(this.content),
    };

    this.buttonToggle = this.nodes.contentToggle.parentElement.querySelector(
      this.buttonToggle
    );
  }

  init() {
    const { contentToggle } = this.nodes;

    this.stateContent = contentToggle.innerHTML;

    contentToggle.innerHTML = `${this.stateContent.substring(0, 1100)}...`;
  }

  addEventListeners() {
    this.buttonToggle.addEventListener("click", this.onClick.bind(this));
  }

  onClick(event) {
    const targetEvent = event.currentTarget;
    const { contentToggle } = this.nodes;

    if (targetEvent.getAttribute("aria-checked") === "true") {
      targetEvent.setAttribute("aria-checked", "false");
      contentToggle.innerHTML = this.stateContent;
      this.buttonToggle.innerHTML = "Show Less";
    } else {
      targetEvent.setAttribute("aria-checked", "true");
      contentToggle.innerHTML = `${this.stateContent.substring(0, 1100)}...`;
      this.buttonToggle.innerHTML = "Show more";
    }
  }
}

const initReadMore = new readMore();
initReadMore.bootstrap();
//about read more end

var a = 0;
$(window).scroll(function () {
  var oTop = $("#counter-box").offset().top - window.innerHeight;
  if (a == 0 && $(window).scrollTop() > oTop) {
    $(".counter").each(function () {
      var $this = $(this),
        countTo = $this.attr("data-number");
      $({
        countNum: $this.text(),
      }).animate(
        {
          countNum: countTo,
        },

        {
          duration: 850,
          easing: "swing",
          step: function () {
            //$this.text(Math.ceil(this.countNum));
            $this.text(Math.ceil(this.countNum).toLocaleString("en"));
          },
          complete: function () {
            $this.text(Math.ceil(this.countNum).toLocaleString("en"));
            //alert('finished');
          },
        }
      );
    });
    a = 1;
  }
});

// counter end

$(document).ready(function () {
  $(".youtube, .popup-vimeo, .popup-gmaps").magnificPopup({
    disableOn: 700,
    type: "iframe",
    mainClass: "mfp-fade",
    removalDelay: 160,
    preloader: false,
    fixedContentPos: false,
    autoplay: true,
  });
});
// youtube video end
