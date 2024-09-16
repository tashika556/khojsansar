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
  dots: true,
  arrow: false,
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
  $(".menu-btn-large").click(function (e) {
    e.preventDefault();
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
$(document).ready(function () {
  let originalItems = $('#restaurant-list .col-lg-4').clone();
  let $items = originalItems;
  let itemsPerPage = parseInt($('#items-per-page-select').val());
  let currentPage = 1;

  function updateShowingCounter() {
    const totalItems = originalItems.length;
    const totalFilteredItems = $items.length;
    const start = (currentPage - 1) * itemsPerPage + 1;
    const end = Math.min(currentPage * itemsPerPage, totalFilteredItems);
    $('#showing-start').text(start);
    $('#showing-end').text(end);
    $('#total-count').text(totalItems);
  }

  function showPage(page) {
    if (page < 1 || page > Math.ceil($items.length / itemsPerPage)) return;
    $items.hide();
    $items.slice((page - 1) * itemsPerPage, page * itemsPerPage).show();
    currentPage = page;

    $('.pagination-link').removeClass('active');
    $(`.pagination-link[data-page="${page}"]`).addClass('active');

    // Update button states
    $('.pagination-link.prev').toggleClass('disabled', currentPage === 1);
    $('.pagination-link.next').toggleClass('disabled', currentPage === Math.ceil($items.length / itemsPerPage));

    updateShowingCounter();
  }

  function createPagination() {
    const $pagination = $('#pagination');
    $pagination.find('.pagination-link:not(.prev):not(.next)').remove();

    const totalPages = Math.ceil($items.length / itemsPerPage);
    for (let i = 1; i <= totalPages; i++) {
      const $link = $('<a></a>', {
        href: '#',
        class: 'pagination-link',
        text: i,
        'data-page': i
      });

      $pagination.append($link);
    }
  }

  function filterItems(query) {
    if (query) {
      $items = originalItems.filter(function () {
        const name = $(this).find('.restaurant_block-text h5').text().toLowerCase();
        return name.includes(query.toLowerCase());
      });
    } else {
      $items = originalItems;
    }

    $('#restaurant-list').empty().append($items);


    createPagination();
    showPage(1);
  }

  $('#pagination').on('click', '.pagination-link', function (e) {
    e.preventDefault();
    const page = $(this).data('page');
    if (page === 'prev') {
      showPage(currentPage - 1);
    } else if (page === 'next') {
      showPage(currentPage + 1);
    } else {
      showPage(Number(page));
    }
  });

  $('#search-input').on('input', function () {
    const query = $(this).val();
    filterItems(query);
  });

  $('#items-per-page-select').on('change', function () {
    itemsPerPage = parseInt($(this).val());

    filterItems($('#search-input').val());
  });


  filterItems('');
});

//////////////city_state///////////////////////////////////////////////////
const data = {
  regions: {
    'Bagmati': ['Sindhuli', 'Ramechhap', 'Dolakha', 'Bhaktapur', 'Dhading', 'Kathmandu', 'Kavrepalanchok', 'Lalitpur', 'Nuwakot', 'Rasuwa', 'Sindhupalchok', 'Chitwan', 'Makwanpur'],
    'Madhesh': ['Sarlahi District', 'Dhanusha District', 'Bara District', 'Rautahat District', 'Saptari District', 'Siraha District', 'Mahottari District', 'Parsa District'],
    'Province No.1': ['Jhapa', 'Ilam', 'Panchthar', 'Taplejung', 'Sankhuwasabha', 'Terhathum', 'Bhojpur', 'Dhankuta', 'Khotang', 'Sunsari', 'Morang', 'Solukhumbu', 'Okhaldhunga', 'Udaipur'],
    'Gandaki': ['Kaski District', 'Syangja District', 'Tanahun District', 'Lamjung District', 'Manang District', 'Gorkha District', 'Parbat District', 'Mustang District', 'Myagdi District', 'Baglung District', 'Nawalparasi District'],
    'Lumbini': ['Arghakhanchi', 'Banke', 'Bardiya', 'Dang', 'Gulmi', 'Kapilvastu', 'Parasi', 'Palpa', 'Pyuthan', 'Rolpa', 'Rukum', 'Rupandehi'],
    'Karnali': ['Western Rukum', 'Salyan', 'Dolpa', 'Humla', 'Jumla', 'Kalikot', 'Mugu', 'Surkhet', 'Dailekh', 'Jajarkot'],
    'Sudurpashchim': ['Achham', 'Baitadi', 'Bajhang', 'Bajura', 'Dadeldhura', 'Darchula', 'Doti', 'Kailali', 'Kanchanpur'],
  },
  districts: {
    // Bagmati//
    'Sindhuli': ['Kamalamai', 'Dudhauli', 'Sunkoshi Rural', 'Hariharpurgadhi Rural', 'Tinpatan Rural', 'Marin Rural', 'Golanjor Rural', 'Phikkal Rural', 'Ghyanglekh Rural'],
    'Ramechhap': ['Manthali', 'Ramechhap', 'Umakunda Rural', 'Khandadevi Rural', 'Gokulganga Rural', 'Doramba Rural', 'Likhu Rural', 'Sunapati Rural'],
    'Dolakha': ['Bhimeswor', 'Jiri', 'Kalinchok Rural', 'Melung Rural', 'Bigu Rural', 'Gaurishankar Rural', 'Baiteshwor Rural', 'Sailung Rural', 'Tamakoshi Rural', 'Kalinchok Rural'],
    'Bhaktapur': ['Bhaktapur', 'Changunarayan', 'Madhyapur Thimi', 'Suryabinayak'],
    'Dhading': ['Dhunibeshi', 'Nilkantha', 'Khaniyabas', 'Gajuri', 'Galchhi', 'Gangajamuna', 'Jwalamukhi', 'Thakre', 'Netrawati Dabjong', 'Benighat Rorang', 'Rubi Valley', 'Siddhalek', 'Tripurasundari'],
    'Kathmandu': ['Kathmandu Metropolitan', 'Budhanilkantha', 'Tarakeshwar', 'Gokarneshwar', 'Chandragiri', 'Tokha', 'Kageshwari-Manohara', 'Nagarjun', 'Kirtipur', 'Dakshinkali', 'Shankharapur'],
    'Kavrepalanchok': ['Banepa', 'Bethanchok Rural', 'Bhumlu Rural', 'Chauri Deurali Rural', 'Dhulikhel', 'Khani Khola Rural', 'Mahabharat Rural', 'Mandandeupur', 'Namobuddha', 'Panauti', 'Panchkhal', 'Roshi Rural', 'Temal Rural'],
    'Lalitpur': ['Lalitpur Metropolitan', 'Mahalaxmi', 'Godawari', 'Konjyoson Rural', 'Bagmati Rural', 'Mahankal Rural'],
    'Nuwakot': ['Bidur', 'Belkotgadhi', 'Kakani Rural', 'Panchakanya Rural', 'Likhu Rural', 'Dupcheshwar Rural', 'hivapuri Rural', 'Tarkeshwar Rural', 'Kispang Rural', 'Myagang Rural'],
    'Rasuwa': ['Uttargaya Rural', 'Kalika Rural', 'Gosaikunda Rural', 'Naukunda Rural', 'Aamachhodingmo Rural'],
    'Sindhupalchok': ['Chautara Sangachowkgadhi', 'Bahrabise', 'Melamchi', 'Balephi Rural', 'Sunkoshi Rural', 'Indrawati Rural', 'Jugal Rural', 'Panchpokhari Thangpal Rural', 'Bhotekoshi Rural', 'Lisankhu Pakhar Rural', 'Helambu Rural', 'Tripurasundari Rural'],
    'Chitwan': ['Bharatpur Metropolitan', 'Kalika', 'Khairahani', 'Madi', 'Ratnanagar', 'Rapti', 'Ichchhakamana Rural'],
    'Makwanpur': ['Hetauda Sub-Metropolitan', 'Thaha', 'Bhimphedi Rural', 'Makawanpurgadhi Rural', 'Manahari Rural', 'Raksirang Rural', 'Bakaiya Rural', 'Bagmati Rural', 'Kailash Rural', 'Indrasarowar Rural'],
  },
  municipalities: {
    'Kathmandu Metropolitan': ['Asian Chicken Soup', 'Hot & Sour Soup Chicken', 'Chicken Momo Chilly', 'Chicken Momo Steamed', 'Veg-Momo', 'Chicken Momo Kothey'],
    'Bhaktapur': ['Veg Momo Chilly', 'Buff Momo Kothey', 'Chicken Momo Chilly', 'Chicken Momo Steamed', 'Veg-Momo', 'Chicken Momo Kothey'],
    'Lalitpur Metropolitan': ['Asian Chicken Soup', 'Hot & Sour Soup Chicken', 'Chicken Momo Chilly', 'Chicken Momo Steamed', 'Veg-Momo', 'Chicken Momo Kothey'],
    'Kamalamai': ['Veg Momo Chilly', 'Buff Momo Kothey', 'Chicken Momo Chilly', 'Chicken Momo Steamed', 'Veg-Momo', 'Chicken Momo Kothey'],
    'Manthali': ['Asian Chicken Soup', 'Hot & Sour Soup Chicken', 'Chicken Momo Chilly', 'Chicken Momo Steamed', 'Veg-Momo', 'Chicken Momo Kothey'],
    'Bhimeswor': ['Veg Momo Chilly', 'Buff Momo Kothey', 'Chicken Momo Chilly', 'Chicken Momo Steamed', 'Veg-Momo', 'Chicken Momo Kothey'],
  }
};

// Populate the regions dropdown
function populateRegions() {
  const regionSelect = document.getElementById('region');
  for (const region in data.regions) {
    const option = document.createElement('option');
    option.value = region;
    option.text = region;
    regionSelect.appendChild(option);
  }
}

// Update districts based on selected region
function setCountry(regionSelect) {
  const region = regionSelect.value;
  const districtSelect = document.getElementById('district');
  districtSelect.innerHTML = '<option value="" selected="selected">Districts</option>';
  if (region && data.regions[region]) {
    data.regions[region].forEach(district => {
      const option = document.createElement('option');
      option.value = district;
      option.text = district;
      districtSelect.appendChild(option);
    });
    districtSelect.disabled = false;
  } else {
    districtSelect.disabled = true;
  }
  document.getElementById('municipality').innerHTML = '<option value="" selected="selected">Municipality</option>';
  document.getElementById('municipality').disabled = true;
  document.getElementById('favorite').innerHTML = '<option value="" selected="selected">Favorite</option>';
  document.getElementById('favorite').disabled = true;
}

// Update municipalities based on selected district
function setMunicipality(districtSelect) {
  const district = districtSelect.value;
  const municipalitySelect = document.getElementById('municipality');
  municipalitySelect.innerHTML = '<option value="" selected="selected">Municipality</option>';
  if (district && data.districts[district]) {
    data.districts[district].forEach(municipality => {
      const option = document.createElement('option');
      option.value = municipality;
      option.text = municipality;
      municipalitySelect.appendChild(option);
    });
    municipalitySelect.disabled = false;
  } else {
    municipalitySelect.disabled = true;
  }
  document.getElementById('favorite').innerHTML = '<option value="" selected="selected">Favorite</option>';
  document.getElementById('favorite').disabled = true;
}

// Update favorites based on selected municipality
function setFavorite(municipalitySelect) {
  const municipality = municipalitySelect.value;
  const favoriteSelect = document.getElementById('favorite');
  favoriteSelect.innerHTML = '<option value="" selected="selected">Favorite</option>';
  if (municipality && data.municipalities[municipality]) {
    data.municipalities[municipality].forEach(favorite => {
      const option = document.createElement('option');
      option.value = favorite;
      option.text = favorite;
      favoriteSelect.appendChild(option);
    });
    favoriteSelect.disabled = false;
  } else {
    favoriteSelect.disabled = true;
  }
}

// Initialize the form by populating regions
populateRegions();

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
