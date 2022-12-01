<?php

include 'header.php';



echo '<h2 class="welcome">Bienvenue dans l\'espace administrateur ' . $_SESSION["pseudo"] .  '</h2>

<div class="links_box">
    <a class="link_admin" href="./create_film.php">Ajouter un nouveau film</a><br>
    <a class="link_admin" href="./create_serie.php">Ajouter une nouvelle série</a><br>
    <a class="link_admin" href="./update.php">Modifier la fiche d\'un film ou d\'une série</a><br>
    <a class="link_admin" href="./submit_list.php">Consulter les suggestions</a><br>
    <a class="link_admin" href="./update_membre.php">Supprimer un membre</a><br>
    <a class="link_admin" href="./index.php">Retour à l\'accueil</a>
</div>';


include './footer.php';
