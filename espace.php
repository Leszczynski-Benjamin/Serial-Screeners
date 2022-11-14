<?php
require './database.php';  // Connexion à la bdd requise
include 'fonction.php'; // Importation du fichier fonctions
include 'header.php';

// Fonction pour crypter le nom des images et le chemin

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon espace</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <ul id="filtres">
        <li>Tout</li>
        <li>Séries</li>
        <li>Films</li>
    </ul>
    <ul id="sous-filtres">
        <li>Listes des programmes</li>
        <li>Vues (0)</li>
        <li>À voir (0)</li>
    </ul>
    <div id="container-espace">
        <div id="grid">
            <?php
            // Selectionne toutes les images dans l'ordre "descending" par id
            $req = $pdo->query('SELECT * FROM series ORDER BY id DESC');
            while ($data = $req->fetch()) {
            ?>
                <div class="grid-item">
                    <img src="./img/<?= $data->image ?>" alt="" height="260px" width="160px">
                </div>
            <?php
            }
            ?>

        </div>
    </div>

</body>

</html>

<?php

include 'footer.php';

?>