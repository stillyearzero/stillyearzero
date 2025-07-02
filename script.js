const hamburger = document.querySelector(".hamburger");
const navMenu = document.querySelector(".nav-menu");
const navbar = document.querySelector(".navbar");

hamburger.addEventListener("click", mobileMenu);

function mobileMenu() {
    hamburger.classList.toggle("active");
    navMenu.classList.toggle("active");
    navbar.classList.toggle("active");
}

const navLink = document.querySelectorAll(".nav-link");

navLink.forEach(n => n.addEventListener("click", closeMenu));

function closeMenu() {
    hamburger.classList.remove("active");
    navMenu.classList.remove("active");
    navbar.classList.remove("active");
}