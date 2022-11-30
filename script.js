
// Apparition de la popup inscription selon la taille de l'écran
function popup2() {
    let media768 = window.matchMedia("(max-width: 768px)");
    let media1024 = window.matchMedia("(max-width: 1024px)");
    let media1440 = window.matchMedia("(max-width: 1440px)");

    // Responsive de la popup pour les écrans en dessous de 768px
    if (media768.matches) {
        document.getElementById("popup-2").style.transform = "translateY(-84%)";
        document.getElementById("popup-2").style.transition = "transform 1s ease";
    }
    // Responsive de la popup pour les écrans en dessous de 1024px
    else if (media1024.matches) {
        document.getElementById("popup-2").style.transform = "translateY(-86%)";
        document.getElementById("popup-2").style.transition = "transform 1s ease";
        // Responsive de la popup pour les écrans en dessous de 1440px
    } else if (media1440.matches) {
        document.getElementById("popup-2").style.transform = "translateY(-88%)";
        document.getElementById("popup-2").style.transition = "transform 1s ease";
        // Responsive de la popup pour les autres écrans au dessus de 1440px
    } else {
        document.getElementById("popup-2").style.transform = "translateY(-86%)";
        document.getElementById("popup-2").style.transition = "transform 1s ease";
    }
}

// Disparition de la popup inscription
function popup1() {
    document.getElementById("popup-2").style.transform = "translateY(200px)";
    document.getElementById("popup-2").style.transition = "transform 1s ease";
}

// Appelle de la fonction popup2 lors de l'evenement 
window.addEventListener("resize", popup2);

// Apparition du formulaire envoie de token

let clicked = false;

function losePassword() {

    document.getElementById("form-lose-password").style.transition = "all .5s ease";
    document.getElementById("form-lose-password").style.opacity = (clicked) ? "0" : "1";
    document.getElementById("form-lose-password").style.visibility = (clicked) ? "hidden" : "visible";
    clicked = !clicked;
}

/*
Equivaut à

if (clicked) {
    document.getElementById("form-lose-password").style.opacity = "0";
    document.getElementById("form-lose-password").style.visibility = "hidden";

    
} else {
    document.getElementById("form-lose-password").style.opacity = "1";
    document.getElementById("form-lose-password").style.visibility = "visible";
} 
*/

window.addEventListener("onclick", losePassword);



/* Apparition du menu Burger */
const menuBurger = document.getElementById("menuBurger")
const navLink = document.querySelector(".navLink")

menuBurger.addEventListener('click', () => {
    navLink.classList.toggle('mobile-menu')
})

/* Apparition de l'onglet membre */

let clickedMember = false;

function overlayUser() {

    document.getElementById("overlay-user").style.transition = "all .5s ease";
    document.getElementById("overlay-user").style.opacity = (clickedMember) ? "0" : "1";
    document.getElementById("overlay-user").style.visibility = (clickedMember) ? "hidden" : "visible";
    clickedMember = !clickedMember;
}