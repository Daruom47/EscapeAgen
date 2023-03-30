// Récupération des éléments HTML
let minPlayersInput = document.querySelector('input[name="min_players"]');
let maxPlayersInput = document.querySelector('input[name="max_players"]');
const confirmButton = document.querySelector('input[name="confirmernumberplayers"]');
const minimumSymbol = document.querySelector('h3');

// Fonction qui vérifie si min_players est supérieur ou égal à max_players
function checkInputValidity() {
  if (parseInt(minPlayersInput.value) >= parseInt(maxPlayersInput.value)) {
    confirmButton.disabled = true;
    confirmButton.style.borderColor = "#dd1100";
    confirmButton.style.color = "#dd1100";
    minimumSymbol.style.color = "#dd1100";
  } else {
    confirmButton.disabled = false;
    confirmButton.style.borderColor = "#ffffff";
    confirmButton.style.color = "#ffffff";
    minimumSymbol.style.color = "#ffffff";
  }
}

// Ajout d'un écouteur d'événements sur les deux champs d'entrée
minPlayersInput.addEventListener('input', checkInputValidity);
maxPlayersInput.addEventListener('input', checkInputValidity);
