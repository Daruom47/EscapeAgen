/*------------------------------------------

            [CONFIGURATIONS]

SCENARIO_LIST contient la liste des scénarios à afficher
Vous pouvez ajouter des scénarios à la liste, ou les modifier simplement sans avoir
à éditer la page index


<nom> : nom du scénario à afficher
<image> : image du scénario à afficher (se trouvant dans images\scenarios)
<short_resume> : Résumé du scénario à afficher lors du passage de la souris
<resume_complet> : Résumé du scénario à afficher sur la page dédiée au scénario
<difficulty> : Difficulté du scénario (1-4)
              - 1 = Facile, 2 = Modéré, 3 = Confirmé, 4 = Expert
<min_players> : nombre de joueurs minimum conseillé
<max_players> : nombre de joueurs maximum autorisé
<time>: Par defaut la valeur est de 60 minutes, vous pouvez choisir une valeur différente en minute, si le champs est vide, la valeur affiché sera 60 minutes
<display>: true : afficher le scénario | false : ne pas l'afficher



TODO: A l'avenir, les gérer depuis une BDD MySQL
Nous aurions pu utiliser un fichier ".json" pour les scénarios afin d'épurer le JS, mais il ne nous est pas possible de le faire en local
Donc, on fait ça pas hyper proprement, mais ça fonctionne :p
------------------------------------------*/

const DIFFICULTY = [
  null,
  "FACILE",
  "INTERMÉDIAIRE",
  "CONFIRMÉ",
  "EXPERT",
];

const SCENARIO_LIST = [
  {
    nom: "Le Trésor du Shérif",
    image: "scenario_1.png",
    short_resume:
      "En tant que gang de hors-la-loi, vous devez récupérer un trésor légendaire caché dans le bureau du shérif, mais attention aux pièges. Vous avez une heure pour réussir sans vous faire attraper",
    resume_complet:
      "Vous êtes une bande de  hors-la-loi bien connus dans l'Ouest sauvage.<br> Vous avez entendu parler d'un trésor légendaire que le shérif local aurait caché dans son bureau. Vous décidez de vous introduire dans le bureau du shérif pour récupérer le butin. <br> <br> Cependant, le shérif a anticipé votre plan et a mis en place des pièges pour protéger le trésor. Vous avez une heure pour trouver le trésor et sortir avant que le shérif ne revienne. Arriverez-vous à relever le défi et à sortir avec le trésor sans vous faire attraper par le shérif?",
    difficulty: 1,
    min_players: 1,
    max_players: 6,
    time: 60,
    display: true,
  },
  {
    nom: "Contagion",
    image: "scenario_2.png",
    short_resume:
      "En équipe de scientifiques, vous avez une heure pour trouver le remède à une épidémie mortelle avant que le virus ne vous tue. Trouvez les indices et sauvez l'humanité.",
    resume_complet:
      "Une épidémie mondiale a éclaté, causant la mort de millions de personnes. Vous faites partie d'une équipe de scientifiques qui travaillent d'arrache-pied pour trouver un remède. Cependant, vous avez été infecté par le virus et devez vous enfermer dans un laboratoire de haute sécurité pour éviter de propager la maladie. Mais le temps presse, car vous avez seulement une heure pour trouver le remède avant que le virus ne prenne le dessus sur votre corps. Vous devez travailler en équipe pour résoudre les énigmes et trouver le remède avant qu'il ne soit trop tard. Le sort de l'humanité est entre vos mains. Parviendrez-vous à trouver le remède à temps et à sauver le monde de cette contagion mortelle ?",
    difficulty: 2,
    min_players: 3,
    max_players: 8,
    display: true,
  },
  {
    nom: "L'Envol du Phénix",
    image: "scenario_3.png",
    short_resume:
      "En quête du Phénix, un artefact ancien, vous êtes piégés dans un temple piégé et devez résoudre des énigmes. L'Ordre de la Flamme cherche également l'artefact - sauvez-le avant eux.",
    resume_complet:
      "Vous êtes des archéologues à la recherche d'un artefact ancien légendaire, connu sous le nom du Phénix. Cette relique mystique aurait le pouvoir de donner la vie éternelle à son détenteur. Après des années de recherche, vous avez finalement trouvé la cachette de l'artefact dans un temple antique. Cependant, vous vous rendez compte que l'endroit est piégé et que vous êtes maintenant pris au piège. Pour trouver le Phénix, vous devez résoudre une série d'énigmes et éviter les pièges mortels. Mais vous n'êtes pas seuls dans le temple - une organisation secrète connue sous le nom de l'Ordre de la Flamme est également à la recherche du Phénix. Vous devez les affronter et récupérer l'artefact avant qu'il ne tombe entre leurs mains. Aurez-vous ce qu'il faut pour surmonter les obstacles et sauver le Phénix avant qu'il ne soit trop tard?",
    difficulty: 3,
    min_players: 3,
    max_players: 6,
    display: true,
  },
  {
    nom: "Le trésor des Pirates",
    image: "scenario_4.png",
    short_resume:
      "Capturés par des pirates, trouvez le trésor caché avant le retour du Capitaine Sanglant en résolvant des énigmes et déchiffrant des codes.",
    resume_complet:
      "Vous et votre équipe avez été capturés par des pirates et enfermés dans leur repaire. Leur chef, le Capitaine Sanglant, a caché son trésor quelque part dans la salle et vous avez une heure pour le trouver avant qu'il ne revienne. Vous devrez résoudre des énigmes, trouver des indices et déchiffrer des codes pour vous échapper et trouver le trésor avant que le temps ne soit écoulé.",
    difficulty: 3,
    min_players: 2,
    max_players: 8,
    display: true,
  },
  {
    nom: "Urgence Spatiale",
    image: "scenario_5.png",
    short_resume:
      "Après avoir subi des dégâts causés par une tempête solaire, vous devez travailler en équipe pour réparer votre vaisseau spatial avant que le temps ne s'épuise et que vous ne soyez perdus dans l'espace pour toujours.",
    resume_complet:
      "Vous êtes une équipe d'astronautes en mission dans l'espace. Soudain, vous êtes pris dans une tempête solaire qui endommage votre vaisseau et vous devez trouver un moyen de réparer les systèmes vitaux avant que le temps ne soit écoulé. Vous devrez résoudre des énigmes scientifiques, naviguer dans l'espace et prendre des décisions critiques pour sauver votre équipage et votre vaisseau.",
    difficulty: 4,
    min_players: 2,
    max_players: 10,
    display: true,
  },
  {
    nom: "Le Monde Fantastique",
    image: "scenario_6.png",
    short_resume:
      "Pour retourner dans le monde réel, trouvez la clé magique avant que le portail ne se referme en résolvant des défis magiques et des énigmes.",
    resume_complet:
      "Vous et votre équipe êtes transportés dans un monde fantastique où les créatures mythiques existent et où la magie est réelle. Vous devez trouver un moyen de rentrer chez vous en découvrant la clé qui vous ramènera à la réalité. Mais le temps presse et vous devez vous frayer un chemin à travers les défis magiques et les énigmes pour trouver la clé avant que le portail ne se referme pour toujours.",
    difficulty: 4,
    min_players: 4,
    max_players: 10,
    display: true,
  },
];

/*------------------------------------------
  Ajoute les scénarios sur la page d'accueil
------------------------------------------*/
SCENARIO_LIST.forEach(function (currentScenario, index) {
  // Nous effectuons une boucle sur "SCENARIO_LIST", afin de lister tous les éléments un par un.
  /*
    'currentScenario' est un objet qui contient toutes les informations du scénario

    exemple :   - la variable "currentScenario.nom" contient le titre du scénario
                - Note : Nous aurions pu également utiliser currentScanario['nom'] pour récupérer le titre du scénario,à titre d'exemple nous l'utiliserons en bas

    'index' est le numéro du scénario (0 = le premier, 1 = le second, etc.)
    Si nous souhaitons par exemple, afficher "Scénario 1", nous pouvons faire `Scénario ${(index + 1)}`

  */

  // On s'assure que la valeur "display" n'est pas vide, et est 'true', on peut donc l'afficher
  if (
    document.getElementById("carrusel-slides") != null &&
    typeof currentScenario.display !== "undefined" &&
    currentScenario.display
  ) {
    //On ajoute ensuite, un élément à l'intérieur de la div "carrusel-slides" avec nos valeurs de "currentScenario"
    document.getElementById("carrusel-slides").insertAdjacentHTML(
      "beforeend",
      `
<div class="slide">
 <div class="scenario">
 
   <div class="content">
   <div class="scenario-title"><p>${currentScenario.nom}</p></div>

     <a href="PageScenar.html?scenario=${index}" >
      <div class="content-overlay"></div>

       <img class="content-image" src="https://stevenbarbe.fr/EscapeAgen/images/scenarios/${
         currentScenario.image
       }" alt="${currentScenario.nom}">
       <div class="content-details fadeIn-bottom">
         <p class="content-text">${currentScenario.short_resume}</p>
         <hr class="separator">
         <div class="scenario-details flex">
            <div class="flex"><span class="badge info"> ${DIFFICULTY[currentScenario.difficulty]}</span></div>
            <div class="flex"><span class="badge info">${currentScenario.min_players} à ${currentScenario.max_players} joueurs</span></div>
            <div class="flex"><span class="badge info">${typeof currentScenario.time !== "undefined" ? currentScenario.time : 60} mins</span></div>

        </div>
       </div>
     </a>
   </div>
 </div>
</div>
 `
    );
  }
});