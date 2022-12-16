<?php
    include 'header.php';
    require 'database.php';
    require "fonction.php";

    if (!isAdmin())
    {
        http_response_code(404);
        die("404");
    }
    ?>

<a href="./espace_admin.php" class="retour">Retour</a>

<div class="colonne_mbr">
    <h2>Ajouter un film</h2>
    <form action="./create_film_exe.php" method="POST" enctype="multipart/form-data">

        <div class="rub">
            <label for="titre" class="infos">Titre:</label>
            <input type="text" name="titre" class="case2" required>

            <label for="titre_original" class="infos">Titre original:</label>
            <input type="text" name="original" class="case2">

            <label for="genre" class="infos">Genre:</label>
            <input type="text" name="genre" class="case2">
        </div>

        <div class="rub">
            <label for="realisateur" class="infos">Réalisateur:</label>
            <input type="text" name="realisateur" class="case2">

            <label for="acteurs_principaux" class="infos">Acteurs principaux:</label>
            <input type="text" name="casting" class="case2">

            <label for="date_de_sortie_france" class="infos">Date de sortie:</label>
            <input type="text" name="sortie" class="case2">
        </div>

        <div class="rub">
            <label for="duree_en_minutes" class="infos">Durée en minutes:</label>
            <input type="number" name="duree" class="case2">

            <label for="ou_voir_le_film" class="infos">Où voir le film:</label>
            <input type="text" name="diffusion" class="case2">

            <label for="note" class="infos">Note:</label>
            <input type="text" name="note" class="case2">
        </div>

        <div class="rub">
            <label for="synopsis" class="infos">Synopsis:</label>
            <textarea type="text" name="synopsis" class="case2" cols="70" rows="10" placeholder="Saisir le synopsis ici"></textarea>
        </div>

        <div class=rub>
            <label for="affiche" class="infos">Affiche:</label>
            <input type="file" name="affiche" accept=" .jpg, .jpeg, .png">
        </div>

        <div class="rub">
            <button type="submit" class="sub_film">Ajouter ce film</button>
        </div>

    </form>
</div>

<?php
include 'footer.php';
?>
