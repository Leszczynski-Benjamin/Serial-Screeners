<?php
require './database.php';
include './header.php';

$id = (empty($_GET["id"])) ? null : htmlspecialchars($_GET['id']);

if (is_null($id))
    die('<meta http-equiv="refresh" content="0.1;URL=http://localhost/serial%20screeners/films.php">');

$req = $pdo->prepare("SELECT * FROM films WHERE ID = :id ");
$req->execute(['id' => (int)$id]);

$data = $req->fetch(PDO::FETCH_OBJ);

$affiche = "./img/" . $data->affiche;
echo '<div class="container_fiche">
<!--COLONNE DE GAUCHE, AFFICHE ET NOTE GENERALE DU FILM -->
            <div class="left">
                <img class="affiche" src=' . $affiche . ' alt="affiche">
                
                <h4 class="box">
                    <i class="fa-solid fa-star"></i>
                    <div class="note">' . $data->note . '</div>
                </h4>
            </div>
<!-- COLONNE DE DROITE, TITRE ET INFOS DIVERSES -->
            <div class="right">
                <h3 class="titre">' . $data->titre ?> </h3>

 <?php $original = $data->titre_original;

if ($original != NULL) {
    echo '<h4 class="original">Titre original: ' . $original . '</h4>';
}


//SECTION LEFT BIS N'APPARAIT QUE SUR LA VERSION MOBILE, C'EST L'AFFICHE ET LA NOTE LORSQU'ELLES S'INTERCALENT ENTRE LE TITRE ET LES INFOS DIVERSES

echo '<div class="left_bis">
                    <img class="affiche" src= ' . $affiche . ' alt="affiche">
                    <h4 class="box">
                        <i class="fa-solid fa-star"></i>
                        <div class="note">' . $data->note . '</div>
                    </h4>
                </div>
<!-- CONTAINER1 CORRESPOND AUX INFOS REALISATEUR, GENRE ETC DIVISÉ EN DEUX COLONNES LEFT1 ET RIGHT1  -->
                <div class="container1">
                    <div class="left1">
                        <h5 class="cast">Réalisateur(s): '
    . $data->realisateur .
    '</h5>
                        <h5 class="cast">Acteurs principaux: '
    . $data->acteurs_principaux .
    '</h5>
                    </div>
                    <div class="right1">
                        <h5 class="infos">Genre: '
    . $data->genre .
    '</h5>
                        <h5 class="infos">Date de sortie: '
    . $data->date_de_sortie_france .
    '</h5>
                        <h5 class="infos">Durée: '
    . $data->duree_en_minutes . ' minutes
                        </h5>
                    </div>
                </div>
<!-- SYNOPSIS, BOUTON AJOUTER A LA LISTE ET LIEN DE DIFFUSION  -->           
                <p class="description">'
    . $data->synopsis .
    '</p>

                <div class="bouton">
                    <button class="button"><i class="fa-solid fa-circle-plus"></i> Ajouter à ma liste</button>
                </div>
                <div class="diffusion">';


$cinema = $data->ou_voir_le_film;

if ($cinema === "En salles") {
    echo "<p class='lien'> En salles </p>";
} else {
    echo "<a class='lien' href=$cinema>Où visionner ce film?</a>";
}
?>
</div>
            </div>

            <!-- SECTION AVIS, SECONDE PARTIE DE LA PAGE, AVEC UN FORMULAIRE POUR LAISSER UN COMMENTAIRE -->

            <div class="titre_avis">
                <h2>Avis</h2>
            </div>

            <?php if (isset($_SESSION['pseudo'])) { ?>

                <form action="./com-exe.php" method="post" class="formulaire">
                    <input type="hidden" name="film_ID" value="<?= $id ?>">
                    <textarea class="commentaire" name="com" id="com" cols="70" rows="10" placeholder="Postez un avis ici..."></textarea>
                    <!-- <input type="hidden" name="user_ID" value="<?php //echo $_SESSION['ID']?>"> -->
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

    <div>
    <h2>Commentaires</h2>
    <table>
        <tr> <th>Utilisateur</th> <th>Commentaire</th> </tr>

</div>

<?php

$req = $pdo->prepare("SELECT avis.ID, avis.com, users.pseudo FROM avis INNER JOIN users ON avis.user_ID = users.ID WHERE film_ID = ?");
$req->execute([$id]);

while ($data = $req->fetch()){    
    echo "<tr> <td>$data->pseudo</td><td>$data->com</td>";
    echo "<td>";         
    if(isset($_SESSION['user_kind']) && $_SESSION['user_kind'] == 1){
        echo "<a href='./delete_com.php?ID=$data->ID'>Supprimer</a>";;    
    echo "</td></tr>";

}
}

  
 
?>
</table>

