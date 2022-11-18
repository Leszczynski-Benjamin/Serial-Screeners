<?php
require './database.php';
include './header.php';
$req = $pdo->query('SELECT * FROM films');
while ($data = $req->fetch()) :

?>

<?php
    $affiche = "./img/" . $data->affiche;
?>

    <body>
        <div class="container_fiche">
            <!--COLONNE DE GAUCHE, AFFICHE ET NOTE GENERALE DU FILM -->
            <div class="left">
                <img class="affiche" src="<?php echo $affiche?>" alt="affiche">
                
                
                <h4 class="box">
                    <i class="fa-solid fa-star"></i>
                    <div class="note">
                        <?= $data->note ?>
                    </div>
                </h4>
            </div>
            <!-- COLONNE DE DROITE, TITRE ET INFOS DIVERSES -->
            <div class="right">
                <h3 class="titre">
                    <?= $data->titre ?>
                </h3>

                <?php
                $original = $data->titre_original;

                if ($original != NULL) {
                    echo '<h4 class="original">Titre original: ' . $original . '</h4>';
                }
                ?>
                <!-- SECTION LEFT BIS N'APPARAIT QUE SUR LA VERSION MOBILE, C'EST L'AFFICHE ET LA NOTE LORSQU'ELLES S'INTERCALENT ENTRE LE TITRE ET LES INFOS DIVERSES -->

                <?php
                 $affiche = "./img/" . $data->affiche;
                ?>

                <div class="left_bis">
                    <img class="affiche" src="<?php echo $affiche?>" alt="affiche">
                    <h4 class="box">
                        <i class="fa-solid fa-star"></i>
                        <div class="note">
                            <?= $data->note ?>
                        </div>
                    </h4>
                </div>
                <!-- CONTAINER1 CORRESPOND AUX INFOS REALISATEUR, GENRE ETC DIVISÉ EN DEUX COLONNES LEFT1 ET RIGHT1  -->
                <div class="container1">
                    <div class="left1">
                        <h5 class="cast">Réalisateur(s):
                            <?= $data->realisateur ?>
                        </h5>
                        <h5 class="cast">Acteurs principaux:
                            <?= $data->acteurs_principaux ?>
                        </h5>
                    </div>
                    <div class="right1">
                        <h5 class="infos">Genre:
                            <?= $data->genre ?>
                        </h5>
                        <h5 class="infos">Date de sortie:
                            <?= $data->date_de_sortie_france ?>
                        </h5>
                        <h5 class="infos">Durée:
                            <?= $data->duree_en_minutes ?> minutes
                        </h5>
                    </div>
                </div>
                <!-- SYNOPSIS, BOUTON AJOUTER A LA LISTE ET LIEN DE DIFFUSION  -->
                <p class="description">
                    <?= $data->synopsis ?>
                </p>

                <div class="bouton">
                    <button class="button"><i class="fa-solid fa-circle-plus"></i> Ajouter à ma liste</button>
                </div>
                <div class="diffusion">

                    <?php
                    $cinema = $data->ou_voir_le_film;
                    if ($cinema == 'En salles') {
                        echo "<p class='lien'> En salles </p>";
                    } else {
                        echo "<a class='lien' href='$cinema'>Où visionner ce film?</a>";
                    }
                    ?>
                </div>
            </div>

            <!-- SECTION AVIS, SECONDE PARTIE DE LA PAGE, AVEC LES 5 ETOILES POUR NOTER ET UN FORMULAIRE POUR LAISSER UN COMMENTAIRE -->

            <div class="titre_avis">
                <h2>Avis</h2>
            </div>

            <div class="avis">
                <div class="stars">
                    <p class="noter">Donner une note</p>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <form action="com_exe.php" method="post">
                    <textarea class="commentaire" name="com" id="com" cols="70" rows="10" placeholder="Postez un avis ici..."></textarea>
                    <button class="bouton-jaune" type="submit" class="poster">Soumettre</button>
                </form>
            </div>

        </div>


    </body>

    </html>

<?php
endwhile;
include './footer.php';
?>