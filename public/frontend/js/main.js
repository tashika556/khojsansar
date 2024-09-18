

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

  $('#items-per-page-select').on('change', function () {
      itemsPerPage = parseInt($(this).val());
      createPagination();
      showPage(1);
  });

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

  $('#search-input').on('keyup', function () {
      filterItems($(this).val());
  });

  createPagination();
  showPage(1);
});


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
