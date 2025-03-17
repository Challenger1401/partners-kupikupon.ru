// Header

const body = document.querySelector("body");
const wrapper = document.querySelector(".wrapper");
const header = document.querySelector(".header");
const menu = document.querySelector(".header__menu");
const hamburger = document.querySelector(".header__hamburger");
const menu_close = document.querySelector(".header__menu-close");
const mediaQuery = window.matchMedia('(min-width: 768px)');

if (mediaQuery.matches) {
  const onScroll = () => {
    const scroll = document.documentElement.scrollTop;
    if (scroll > 700) {
      wrapper.classList.add("header-fixed");
      header.classList.add("state-fixed");
    } else {
      wrapper.classList.remove("header-fixed");
      header.classList.remove("state-fixed");
    }
  }

  window.addEventListener('scroll', onScroll);
}

if (hamburger) {
  hamburger.onclick = function() {
    body.classList.toggle("state-hidden");
    menu.classList.toggle("state-open");
  }
}

if (menu_close) {
  menu_close.onclick = function() {
    body.classList.remove("state-hidden");
    menu.classList.remove("state-open");
  }
}

/** Accordion */

const items = document.querySelectorAll(".accordion button");
function toggleAccordion() {
  this.classList.toggle("state-active");
  this.nextElementSibling.classList.toggle("state-active");
}
items.forEach(item => item.addEventListener('click', toggleAccordion));

/** Scroll anchor */

document.querySelectorAll("a[href^='#']").forEach(link => {
  link.addEventListener("click", function (e) {
    e.preventDefault();
    let href = this.getAttribute("href").substring(1);
    const scrollTarget = document.getElementById(href);
    const topOffset = 0;
    const elementPosition = scrollTarget.getBoundingClientRect().top;
    const offsetPosition = elementPosition - topOffset;
    const body = document.querySelector("body");
    const menu = document.querySelector(".header__menu");
    const hamburger = document.querySelector(".header__hamburger");

    if (menu && hamburger) {
      body.classList.remove("state-hidden");
      menu.classList.remove('state-open');
    }

    window.scrollBy({
      top: offsetPosition,
      behavior: "smooth"
    });
  });
});

var swiper1 = new Swiper(".swiper-cases", {
  slidesPerView: 1,
  spaceBetween: 10,
  navigation: {
    nextEl: ".swiper-button-next-1",
    prevEl: ".swiper-button-prev-1",
  },
  breakpoints: {
    1024: {
      slidesPerView: 1,
      spaceBetween: 20,
    },
    1285: {
      slidesPerView: 'auto',
      spaceBetween: 20,
    },
  },
});

var swiper2 = new Swiper(".swiper-tariffs", {
  slidesPerView: 1,
  spaceBetween: 10,
  navigation: {
    nextEl: ".swiper-button-next-2",
    prevEl: ".swiper-button-prev-2",
  },
  breakpoints: {
    768: {
      slidesPerView: 2,
      spaceBetween: 10,
    },
    1024: {
      slidesPerView: 3,
      spaceBetween: 20,
    },
    1285: {
      slidesPerView: 'auto',
      spaceBetween: 20,
    },
  },
});