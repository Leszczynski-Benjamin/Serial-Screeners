<?php
    include 'header.php';
    require 'database.php';

    ?>

<a href="./espace_admin.php">Retour</a>

<div>
<h2>Ajouter une série</h2>
<form action="./create_serie_exe.php" method="POST" enctype="multipart/form-data">

<label for="titre">Titre:</label>
<input type="text" name="titre" required>

<label for="titre_original">Titre original:</label>
<input type="text" name="original">

<label for="genre">Genre:</label>
<input type="text" name="genre">

<label for="synopsis">Synopsis:</label>
<textarea type="text" name="synopsis" cols="70" rows="10" placeholder="Saisir le synopsis ici"></textarea>

<label for="showrunners">Showrunners:</label>
<input type="text" name="showrunners">

<label for="acteurs_principaux">Acteurs principaux:</label>
<input type="text" name="casting">

<label for="debut">Année de début:</label>
<input type="text" name="debut">

<label for="fin">Année de fin:</label>
<input type="text" name="fin">

<label for="saisons">Saisons:</label>
<input type="number" name="saisons">

<label for="diffusion">Lien de diffusion:</label>
<input type="text" name="diffusion">

<label for="note">Note:</label>
<input type="text" name="note">

<label for="affiche">Affiche</label>
<input type="file" name="affiche" accept=" .jpg, .jpeg, .png">

<button type="submit">Ajouter cette série</button>

</form>
</div>



<?php
include 'footer.php';
?>