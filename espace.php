<?php
require './database.php';  // Connexion à la bdd requise
include 'fonction.php'; // Importation du fichier fonctions
include 'header.php';

// Fonction pour crypter le nom des images et le chemin

?>

<body>
    <ul id="filtres">
        <li><a href="./espace.php">Tout</a></li>
        <li><a href="./espace.php?page=series">Séries</a></li>
        <li><a href="./espace.php?page=films">Films</a></li>
    </ul>
    <ul id="sous-filtres">
        <li><a>Listes des programmes :</a></li>
        <li><a>Vues (0)</a></li>
        <li><a>À voir (0)</a></li>
    </ul>
    <div id="box-btn-submit">
        <a href="./submit.php" id="btn-submit">Soumettez vos idées de films/séries</a>
    </div>
    <div id="container-espace">
        <div id="grid">
            <?php
            if (isset($_GET["page"])) {
                $table = $_GET["page"];
                $req = $pdo->query("SELECT * FROM $table ORDER BY id DESC");
                $data[$table] = $req->fetchAll();
            } else {
                $req = $pdo->query("SELECT * FROM series ORDER BY id DESC");
                $data["series"] = $req->fetchAll();

                $req = $pdo->query("SELECT * FROM films ORDER BY id DESC");
                $data["films"] = $req->fetchAll();
            }

            foreach ($data as $items) {
                foreach ($items as $item) {
            ?>
                    <div class="grid-item">
                        <img src="./img/<?= $item->affiche ?>" alt="" height="260px" width="160px">
                    </div>
            <?php
                }
            }
            ?>

        </div>
    </div>

</body>



<?php


?>