<?php  //Ce fichier contient un message pour l'utilisateur lui confirmant que son inscription sur le site est réussie.
session_start(); //La fonction “session_start” est appelée ; elle démarre une nouvelle session ou reprend une session existante
if(isset($_SESSION['pseudo'])){   //Il s’agit avec la condition “if” de faire que la fonction “isset” vérifier que la variable “SESSION” associée à la valeur “username” est bien remplie
    echo 'Bienvenue sur le site'. $_SESSION['pseudo']; //Le texte "Bienvenue sur le site" suivi du nom de l’utilisateur sera bien affiché ( grâce à la fonction “echo” ).

}
?>

<?php
include './header.php'; //Grâce à la fonction “include”, nous incluons le bandeau ( ou header ) dans le champ
?>

<h1>Vous êtes désormais un(e) Serial Screener !</h1>

<?php
include './footer.php'; //Nous refaisons appel à la fonction “include” pour insérer le pied de page ( ou footer )
?>