const menuHamburger = document.querySelector(".menu_hamburger");
const navLinks = document.querySelector("#div_nav");

menuHamburger.addEventListener("click", () => {
  navLinks.classList.toggle("mobile-menu");
});

/* Fixing nav bar */

document.getElementById("div_nav").style.borderRadius = "20px";


