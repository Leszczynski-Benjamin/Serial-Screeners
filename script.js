
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
        document.getElementById("popup-2").style.transform = "translateY(-90%)";
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