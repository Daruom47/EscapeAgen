const queryString = window.location.search;

const urlParams = new URLSearchParams(queryString);
const storyid = (urlParams.get('scenario') != null ? urlParams.get('scenario') : parseInt(window.location.href.match(/scenario\-([0-9]+)/)[1]) )

let titrehead = document.querySelector('title')


let titre = document.querySelector('.storytitle')
let synopsis = document.querySelector('.synopsis')
let storyimg = document.querySelector('.storyimg').querySelector('img')
let lvl = document.querySelector('.difficulte')
let pmin = document.querySelector('.min')
let pmax = document.querySelector('.max')

let ligne1 = document.querySelector('.lb1').querySelectorAll('td')
let time1 = ligne1[3]
let team1 = ligne1[2]
let logo1 = ligne1[1]
let logoimg1 = logo1.querySelector('img')

let ligne2 = document.querySelector('.lb2').querySelectorAll('td')
let time2 = ligne2[3]
let team2 = ligne2[2]
let logo2 = ligne2[1]
let logoimg2 = logo2.querySelector('img')

let ligne3 = document.querySelector('.lb3').querySelectorAll('td')
let time3 = ligne3[3]
let team3 = ligne3[2]
let logo3 = ligne3[1]
let logoimg3 = logo3.querySelector('img')

let ligne4 = document.querySelector('.lb4').querySelectorAll('td')
let time4 = ligne4[3]
let team4 = ligne4[2]
let logo4 = ligne4[1]
let logoimg4 = logo4.querySelector('img')

let ligne5 = document.querySelector('.lb5').querySelectorAll('td')
let time5 = ligne5[3]
let team5 = ligne5[2]
let logo5 = ligne5[1]
let logoimg5 = logo5.querySelector('img')

let ligne6 = document.querySelector('.lb6').querySelectorAll('td')
let time6 = ligne6[3]
let team6 = ligne6[2]
let logo6 = ligne6[1]
let logoimg6 = logo6.querySelector('img')

let ligne7 = document.querySelector('.lb7').querySelectorAll('td')
let time7 = ligne7[3]
let team7 = ligne7[2]
let logo7 = ligne7[1]
let logoimg7 = logo7.querySelector('img')

let ligne8 = document.querySelector('.lb8').querySelectorAll('td')
let time8 = ligne8[3]
let team8 = ligne8[2]
let logo8 = ligne8[1]
let logoimg8 = logo8.querySelector('img')

let ligne9 = document.querySelector('.lb9').querySelectorAll('td')
let time9 = ligne9[3]
let team9 = ligne9[2]
let logo9 = ligne9[1]
let logoimg9 = logo9.querySelector('img')

let ligne10 = document.querySelector('.lb10').querySelectorAll('td')
let time10 = ligne10[3]
let team10 = ligne10[2]
let logo10 = ligne10[1]
let logoimg10 = logo10.querySelector('img')

let randomtime = getRandomInt(12,37)

titrehead.innerHTML = `AGEN ESCAPE - ${SCENARIO_LIST[storyid].nom.toUpperCase()}`


var listeimg = [
"./images/equipes/logoteam1.png",
"./images/equipes/logoteam2.png",
"./images/equipes/logoteam3.png",
"./images/equipes/logoteam4.png",
"./images/equipes/logoteam5.png",
"./images/equipes/logoteam6.png",
"./images/equipes/logoteam7.png",
"./images/equipes/logoteam8.png",
"./images/equipes/logoteam9.png",
"./images/equipes/logoteam10.png"
];

function shuffleArray(inputArray){
    inputArray.sort(()=> Math.random() - 0.5);
}
function getRandomInt(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    let valeur = Math.floor(Math.random() * (max - min + 1)) + min;
    return (valeur <= 9 ? "0" + valeur : valeur);
}

function getRandomInt09(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    let valeur = Math.floor(Math.random() * (max - min + 1)) + min;
    return (valeur);
}

function merge(a,b) {
    const list1 = new Array (
        "Desert",
        "Sky",
        "Space",
        "Sweet",
        "Ice",
        "Strong",
        "Normal",
        "Suspect",
        "Baguette",
        "Haunted"
    );
    const list2 = new Array (
        "Guys",
        "Sisters",
        "Workers",
        "Swimmers",
        "Climbers",
        "Foxes",
        "Monkeys",
        "Turtles",
        "Ghosts",
        "Crewmates"
    );
    fullname = list1[a] + " " + list2[b]
    return(fullname);
}

shuffleArray(listeimg);

titre.innerHTML = SCENARIO_LIST[storyid].nom

synopsis.innerHTML = SCENARIO_LIST[storyid].resume_complet

storyimg.src = `./images/scenarios/${SCENARIO_LIST[storyid].image}`
;

lvl.innerHTML ="Difficulté" + ":" + " " + DIFFICULTY[SCENARIO_LIST[storyid].difficulty]

pmin.innerHTML =SCENARIO_LIST[storyid].min_players + " " + "joueurs minimum"
pmax.innerHTML =SCENARIO_LIST[storyid].max_players + " " + "joueurs maximum"

time1.innerHTML= randomtime + `'` + " " + getRandomInt(0,59) + `"`
time2.innerHTML= (randomtime = getRandomInt(randomtime+1,randomtime+2)) + `'` + " " + getRandomInt(0,59) + `"`
time3.innerHTML= (randomtime = getRandomInt(randomtime+1,randomtime+3)) + `'` + " " + getRandomInt(0,59) + `"`
time4.innerHTML= (randomtime = getRandomInt(randomtime+1,randomtime+2)) + `'` + " " + getRandomInt(0,59) + `"`
time5.innerHTML= (randomtime = getRandomInt(randomtime+1,randomtime+3)) + `'` + " " + getRandomInt(0,59) + `"`
time6.innerHTML= (randomtime = getRandomInt(randomtime+1,randomtime+2)) + `'` + " " + getRandomInt(0,59) + `"`
time7.innerHTML= (randomtime = getRandomInt(randomtime+1,randomtime+3)) + `'` + " " + getRandomInt(0,59) + `"`
time8.innerHTML= (randomtime = getRandomInt(randomtime+1,randomtime+2)) + `'` + " " + getRandomInt(0,59) + `"`
time9.innerHTML= (randomtime = getRandomInt(randomtime+1,randomtime+3)) + `'` + " " + getRandomInt(0,59) + `"`
time10.innerHTML= (randomtime = getRandomInt(randomtime+1,randomtime+2)) + `'` + " " + getRandomInt(0,59) + `"`

team1.innerHTML= merge(getRandomInt09(0,9),getRandomInt09(0,9))
team2.innerHTML= merge(getRandomInt09(0,9),getRandomInt09(0,9))
team3.innerHTML= merge(getRandomInt09(0,9),getRandomInt09(0,9))
team4.innerHTML= merge(getRandomInt09(0,9),getRandomInt09(0,9))
team5.innerHTML= merge(getRandomInt09(0,9),getRandomInt09(0,9))
team6.innerHTML= merge(getRandomInt09(0,9),getRandomInt09(0,9))
team7.innerHTML= merge(getRandomInt09(0,9),getRandomInt09(0,9))
team8.innerHTML= merge(getRandomInt09(0,9),getRandomInt09(0,9))
team9.innerHTML= merge(getRandomInt09(0,9),getRandomInt09(0,9))
team10.innerHTML= merge(getRandomInt09(0,9),getRandomInt09(0,9))

logoimg1.src=listeimg[0]
logoimg2.src=listeimg[1]
logoimg3.src=listeimg[2]
logoimg4.src=listeimg[3]
logoimg5.src=listeimg[4]
logoimg6.src=listeimg[5]
logoimg7.src=listeimg[6]
logoimg8.src=listeimg[7]
logoimg9.src=listeimg[8]
logoimg10.src=listeimg[9]