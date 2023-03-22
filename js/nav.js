const menuHamburger = document.querySelector(".menu_hamburger");
const navLinks = document.querySelector("#div_nav");

menuHamburger.addEventListener("click", () => {
  navLinks.classList.toggle("mobile-menu");
});

/* Fixing nav bar */

document.getElementById("div_nav").style.borderRadius = "20px";

const SOCIAL_LIST = [
  { name: "YouTube", url: "https://www.youtube.com/watch?v=sxzRYuYH2Xc" },
  {
    name: "Facebook",
    url: "https://www.facebook.com/escapegamefrance/?locale=fr_FR",
  },
  { name: "Instagram", url: "https://www.instagram.com/escapegamefrance" },
];
const NAVBAR_LINK = [
  // {name: "Accueil", url: "#"},
  { name: "SCENARIOS", url: "./index.html#scenariosList" },
  // {name: "Records", url: "#"},

  { name: "TARIFS", url: "./tarif.html" },
  { name: "RESERVER", url: "./reservation.html" },
  { name: "NOUS TROUVER", url: "./index.html#nousTrouver" },
  // {name: "Réservations", url: "#"},
  // { name: "CONTA", url: "./index.php#formButton" },
];

/* <li><a href="#">Nos scénarios</a></li>
<li>Nos tarifs</li>
<li>Nous trouver</li>
<li>Contact</li> */

NAVBAR_LINK.forEach((item) => {
  let el = document.createElement("li");
  el.innerHTML = `<a href="${item.url}">${item.name}</a>`;
  document.getElementById("links_menu").appendChild(el);
});
SOCIAL_LIST.forEach((item) => {
  ["div.icons", ".social"].forEach(function (selector, index) {
    document
      .querySelectorAll(selector)
      .forEach((x) =>
        x.insertAdjacentHTML(
          "beforeend",
          `<a href="${
            item.url
          }" target="_blank"><i class="fa fa-${item.name.toLocaleLowerCase()}"></i></a>`
        )
      );
  });
});
