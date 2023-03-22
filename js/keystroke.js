
const message = `
Un escape game est un jeu d'énigmes qui se vit en équipe.§
Les joueurs évoluent généralement dans un lieu clos et thématisé.§
Ils doivent résoudre une série de casse-têtes dans un temps imparti pour réussir à s'échapper ou à accomplir une mission.§§
    AGEN ESCAPE ACCUEILLE VOS ÉQUIPES 7 JOURS SUR 7 DE 10H00 À 21H00.
    §
    Nos agents de liaison vous enverront en mission.
    §
    Pour cela, il vous faudra compléter toutes les énigmes!
    §
    Votre équipe est-elle prête à relever le défi?`;
function getRandomInt(min, max) {
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min + 1)) + min;
  
}
const container = document.querySelector("#presentationAnimation > p");
const DELAYS = {
  min: 1,
  max: 1,
};
let n;

function rerun() {
  container.textContent = "";
  n = 0;
  typist(message, container);
}

rerun();

function interval(letter) {

    return (~[',','!','.','?',':','§'].indexOf(letter) ? 100 : getRandomInt(1,30));
}
function textClignotement(value) {
  container.innerHTML = `${message.replaceAll("§", "<br>")}${
    value ? "|" : ""
  }`;

  setTimeout(() => {
    textClignotement(value ? false : true);
  }, 300);
}
function typist(text, target) {
  if (typeof text[n] != "undefined") {
    target.innerHTML += text[n].replace("§", "<br>");
  }
  n++;
  if (n < text.length) {
    setTimeout(function () {
      typist(text, target);
    }, interval(text[n - 1]));
  }

  // Ajout de l'animation lorsque le texte est terminé, effet de clignotement
  if (n == text.length) {
    setTimeout(function () {
      textClignotement(true), interval(500);
    });
  }
}
