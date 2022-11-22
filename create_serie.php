<?php
    include 'header.php';
    require 'database.php';

    ?>

<a href="./espace_admin.php">Retour</a>

<div>
<h2>Ajouter une série</h2>
<form action="./create_serie_exe.php" method="POST">

<label for="titre">Titre:</label>
<input type="text" name="titre" id="titre" required>

<label for="synopsis">Synopsis:</label>
<textarea type="text" name="synopsis" id="synopsis" cols="70" rows="10" placeholder="Saisir le synopsis ici"></textarea>

<!--<label for="parts">Nombre de parts:</label>
<input type="number" name="parts" id="parts">-->

<button type="submit">Ajouter ce film</button>

</form>
</div>



<?php
include 'footer.php';
?>