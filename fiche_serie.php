<?php
require './database.php';
include './header.php';

$req = $pdo->query('SELECT * FROM series');
while ($data = $req->fetch()) :

    $affiche = "./img/" . $data->affiche;
?>

    <div class="container_fiche">
        <!--COLONNE DE GAUCHE, AFFICHE ET NOTE GENERALE DE LA SÉRIE -->
        <div class="left">
            <img class="affiche" src="<?php echo $affiche ?>" alt="affiche">

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

            <div class="left_bis">
                <img class="affiche" src="<?php echo $affiche ?>" alt="affiche">
                <h4 class="box">
                    <i class="fa-solid fa-star"></i>
                    <div class="note">
                        <?= $data->note ?>
                    </div>
                </h4>
            </div>
            <!-- CONTAINER1 CORRESPOND AUX INFOS SHOWRUNNERS, GENRE ETC DIVISÉ EN DEUX COLONNES LEFT1 ET RIGHT1  -->
            <div class="container1">
                <div class="left1">
                    <h5 class="cast">Showrunner(s):
                        <?= $data->showrunners ?>
                    </h5>
                    <h5 class="cast">Acteurs principaux:
                        <?= $data->acteurs_principaux ?>
                    </h5>
                </div>
                <div class="right1">
                    <h5 class="infos">Genre:
                        <?= $data->genre ?>
                    </h5>
                    <h5 class="infos">
                        <?= $data->date_premier_episode ?>

                        <?php
                        $final = $data->date_dernier_episode;

                        if ($final != NULL) {
                            echo '- ' . $final;
                        }
                        ?>

                    </h5>
                    <h5 class="infos">Nombre de saison(s):
                        <?= $data->saisons ?>
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
                <a class="lien" href="<?= $data->diffusion ?>">Où visionner cette série?</a>
            </div>
        </div>
        <!-- SECTION AVIS, SECONDE PARTIE DE LA PAGE, AVEC UN FORMULAIRE POUR LAISSER UN COMMENTAIRE -->

        <div class="titre_avis">
            <h2>Avis</h2>
        </div>

        <?php if (isset($_SESSION['pseudo'])) { ?>

            <form action="./com-exe.php" method="post">
                <textarea class="commentaire" name="com" id="com" cols="70" rows="10" placeholder="Postez un avis ici..."></textarea>
                <!-- <input type="hidden" name="user_ID" value="<?php //echo $_SESSION['ID']
                                                                ?>"> -->
                <button class="bouton-jaune" type="submit" class="poster">Soumettre</button>
            </form>

        <?php
        } else {
        ?>
            <a href="./header.php#overlay">Je m'inscris</a>
        <?php
        }
        ?>

    </div>

    </div>


<?php
endwhile;
include './footer.php';
?>