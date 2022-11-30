<?php
    include 'header.php';
    require 'database.php';

    ?>

<a href="./espace_admin.php" class="retour">Retour</a>

<div>
    <h2>Ajouter une série</h2>
    <form action="./create_serie_exe.php" method="POST" enctype="multipart/form-data">

        <div class="rub">
            <label for="titre" class="infos">Titre:</label>
            <input type="text" name="titre" class="case2" required>

            <label for="titre_original" class="infos">Titre original:</label>
            <input type="text" name="original" class="case2">

            <label for="genre" class="infos">Genre:</label>
            <input type="text" name="genre" class="case2">

            <label for="showrunners" class="infos">Showrunners:</label>
            <input type="text" name="showrunners" class="case2">
        </div>

        <div class="rub">
            <label for="acteurs_principaux" class="infos">Acteurs principaux:</label>
            <input type="text" name="casting" class="case2">

            <label for="debut" class="infos">Année de début:</label>
            <input type="text" name="debut" class="case2">

            <label for="fin" class="infos">Année de fin:</label>
            <input type="text" name="fin" class="case2">
        </div>

        <div class="rub">   
            <label for="saisons" class="infos">Saisons:</label>
            <input type="number" name="saisons" class="case2">       
        
            <label for="diffusion" class="infos">Lien de diffusion:</label>
            <input type="text" name="diffusion" class="case2">

            <label for="note" class="infos">Note:</label>
            <input type="text" name="note" class="case2">
        </div>

        <div class="rub">
            <label for="synopsis" class="infos">Synopsis:</label>
            <textarea type="text" name="synopsis" class="case2" cols="70" rows="10" placeholder="Saisir le synopsis ici"></textarea>
        </div>

        <div class="rub">
            <label for="affiche" class="infos">Affiche:</label>
            <input type="file" name="affiche" accept=" .jpg, .jpeg, .png">
        </div>

        <div class="rub">
            <button type="submit" class="sub_film">Ajouter cette série</button>
        </div>

</form>
</div>



<?php
include 'footer.php';
?>