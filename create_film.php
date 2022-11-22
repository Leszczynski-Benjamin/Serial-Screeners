<?php
    include 'header.php';
    require 'database.php';

    ?>

<a href="./espace_admin.php">Retour</a>

<div>
<h2>Ajouter un film</h2>
<form action="./create_film_exe.php" method="POST" enctype="multipart/form-data">

<label for="titre">Titre:</label>
<input type="text" name="titre" required>

<label for="titre_original">Titre original:</label>
<input type="text" name="original">

<label for="genre">Genre:</label>
<input type="text" name="genre">

<label for="synopsis">Synopsis:</label>
<textarea type="text" name="synopsis" cols="70" rows="10" placeholder="Saisir le synopsis ici"></textarea>

<label for="realisateur">Réalisateur:</label>
<input type="text" name="realisateur">

<label for="acteurs_principaux">Acteurs principaux:</label>
<input type="text" name="casting">

<label for="date_de_sortie_france">Date de sortie:</label>
<input type="text" name="sortie">

<label for="duree_en_minutes">Durée en minutes:</label>
<input type="number" name="duree">

<label for="ou_voir_le_film">Où voir le film:</label>
<input type="text" name="diffusion">

<label for="note">Note:</label>
<input type="text" name="note">

<label for="affiche">Affiche</label>
<input type="file" name="affiche" accept=" .jpg, .jpeg, .png">

<button type="submit">Ajouter ce film</button>

</form>
</div>



<?php
include 'footer.php';
?>