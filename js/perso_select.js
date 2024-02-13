
function DesactivePerso(perso, j) {
    // regarde les checkbox de l'autre joueur et et désactive celle qui a le même nom que j1_selected ou j2_selected
    for (let i = 0; i < checkboxes[j].length; i++) {
        if (checkboxes[j][i].querySelector('.js_NamePers').textContent == perso) {
            checkboxes[j][i].querySelector('input').disabled = true;
        } else {
            checkboxes[j][i].querySelector('input').disabled = false;
        }
    }
}

function AffInfoPerso(j) {

    if (j == 'j1') {
        document.querySelector('.sectionJ1--NotSelect').classList.remove('sectionJ1--NotSelect');
        document.querySelector('.spriteJ1--NotSelect').classList.remove('spriteJ1--NotSelect');
    } else {
        document.querySelector('.sectionJ2--NotSelect').classList.remove('sectionJ2--NotSelect');
        document.querySelector('.spriteJ2--NotSelect').classList.remove('spriteJ2--NotSelect');
    }
}

function ActiveBouton() {
    // si les deux joueurs ont choisi leurs persos, active le bouton de validation
    if (j1_selected != '' && j2_selected != '') {
        document.querySelector('.js_Start').disabled = false;
    }
}

function changeInfoJ(objetNom, name, Sprite, src, objetStats, stats) {
    objetNom.textContent = name;
    Sprite.src = src;

    console.log(stats);
    console.log(stats.querySelector('.js_PV'));

    objetStats.querySelector('.js_PV').textContent = stats.querySelector('.js_PV').textContent;
    objetStats.querySelector('.js_Atk').textContent = stats.querySelector('.js_ATK').textContent;
}

//? ------------------------------------------------------------------

// récupère tout les checkbox dans deux tableaux regrouper dans un tableaux

const checkboxesj1 = document.querySelectorAll('.js_Persoj1');
const checkboxesj2 = document.querySelectorAll('.js_Persoj2');

const NamePersoJ1 = document.querySelector('.js_NomPersoJ1');
const ImgPersoJ1 = document.querySelector('.js_ImgPersoJ1');

const NamePersoJ2 = document.querySelector('.js_NomPersoJ2');
const ImgPersoJ2 = document.querySelector('.js_ImgPersoJ2');

const StatsPersoJ1 = document.querySelector('.js_StatsPersoJ1');
const StatsPersoJ2 = document.querySelector('.js_StatsPersoJ2');

const checkboxes = {
    j1 : checkboxesj1, 
    j2 : checkboxesj2
};

let j1_selected = '';
let j2_selected = '';

console.log(checkboxes);

// regarde quand les checkbox sont cochés

for (let i = 0; i < checkboxes['j1'].length; i++) {
    let perso = checkboxes['j1'][i];

    perso.addEventListener('click', () => {
        if (perso.querySelector('input').checked == true) {
            // si oui, stocke le nom du perso dans une variable j1_selected ou j2_selected
            j1_selected = perso.querySelector('.js_NamePers').textContent;
            console.log("j1 : "+ j1_selected);
            DesactivePerso(j1_selected, 'j2');
            changeInfoJ(NamePersoJ1, j1_selected, ImgPersoJ1, perso.querySelector('.js_ImgPers').src, StatsPersoJ1, perso.querySelector('.js_Stats'));
            AffInfoPerso("j1");
            ActiveBouton();
            
        }
    });
}

for (let i = 0; i < checkboxes['j2'].length; i++) {
    let perso = checkboxes['j2'][i];

    perso.addEventListener('click', () => {
        if (perso.querySelector('input').checked == true) {
            // si oui, stocke le nom du perso dans une variable j1_selected ou j2_selected
            j2_selected = perso.querySelector('.js_NamePers').textContent;
            console.log("j2 : "+ j2_selected);
            DesactivePerso(j2_selected, 'j1');
            changeInfoJ(NamePersoJ2, j2_selected, ImgPersoJ2, perso.querySelector('.js_ImgPers').src, StatsPersoJ2, perso.querySelector('.js_Stats'));
            AffInfoPerso("j2");
            ActiveBouton();
        }
    });
}



// change l'affichage des joueurs en fonction de j1_selected et j2_selected (ça peut-être stocke les images de tout des perso dans une partie en display none)
