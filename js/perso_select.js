
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

function ActiveBouton() {
    // si les deux joueurs ont choisi leurs persos, active le bouton de validation
    if (j1_selected != '' && j2_selected != '') {
        document.querySelector('.js_Start').disabled = false;
    }
}

function changeInfoJ(objetNom, name, Sprite, src) {
    objetNom.textContent = name;
    Sprite.src = src;
}

//? ------------------------------------------------------------------

// récupère tout les checkbox dans deux tableaux regrouper dans un tableaux

const checkboxesj1 = document.querySelectorAll('.js_Persoj1');
const checkboxesj2 = document.querySelectorAll('.js_Persoj2');
const NamePersoJ1 = document.querySelector('.js_NomPersoJ1');
const ImgPersoJ1 = document.querySelector('.js_ImgPersoJ1');
const NamePersoJ2 = document.querySelector('.js_NomPersoJ2');
const ImgPersoJ2 = document.querySelector('.js_ImgPersoJ2');
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
            changeInfoJ(NamePersoJ1, j1_selected, ImgPersoJ1, perso.querySelector('.js_ImgPers').src);
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
            changeInfoJ(NamePersoJ2, j2_selected, ImgPersoJ2, perso.querySelector('.js_ImgPers').src);
            ActiveBouton();
        }
    });
}



// change l'affichage des joueurs en fonction de j1_selected et j2_selected (ça peut-être stocke les images de tout des perso dans une partie en display none)
