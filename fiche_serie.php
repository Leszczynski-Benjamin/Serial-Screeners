<?php
    require './database.php';

        $req = $pdo->query('SELECT * FROM series');
        while ($data = $req->fetch()): 
        
        ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="">
    
    <link rel="stylesheet" href="./style_alexis.css">
    <script src="https://kit.fontawesome.com/6d9b9bcbc0.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cormorant:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">
    
    <title>Fiche série</title>
  
</head>

<body>
    <div class="container">
<!--COLONNE DE GAUCHE, AFFICHE ET NOTE GENERALE DE LA SÉRIE -->
        <div class="left">
            <img class="affiche" src="./img/series/game_of_thrones_house_of_the_dragon.jpg" alt="affiche">
            
                <h4 class="box">
                    <i class="fa-solid fa-star"></i>
                    <div class="note">
                        <?= $data->note?>
                    </div>
                </h4> 
        </div>
<!-- COLONNE DE DROITE, TITRE ET INFOS DIVERSES -->
        <div class="right">
                <h3 class="titre">
                    <?= $data->titre?>
                </h3>              
                
                <?php
                    $original = $data->titre_original;

                    if ($original!=NULL){
                        echo '<h4 class="original">Titre original: ' . $original.'</h4>';
                            
                    }
                ?>
 <!-- SECTION LEFT BIS N'APPARAIT QUE SUR LA VERSION MOBILE, C'EST L'AFFICHE ET LA NOTE LORSQU'ELLES S'INTERCALENT ENTRE LE TITRE ET LES INFOS DIVERSES -->               
                <div class="left_bis">
                    <img class="affiche" src="./img/series/game_of_thrones_house_of_the_dragon.jpg" alt="affiche">
                    <h4 class="box">
                        <i class="fa-solid fa-star"></i>
                        <div class="note">
                            <?= $data->note?>
                        </div>
                    </h4> 
                </div>
  <!-- CONTAINER1 CORRESPOND AUX INFOS SHOWRUNNERS, GENRE ETC DIVISÉ EN DEUX COLONNES LEFT1 ET RIGHT1  -->            
                <div class="container1">
                    <div class="left1">
                        <h5 class="cast">Showrunner(s): 
                            <?= $data->showrunners?>
                        </h5>
                        <h5 class="cast">Acteurs principaux: 
                            <?= $data->acteurs_principaux?>
                        </h5>
                    </div>
                    <div class="right1">
                        <h5 class="infos">Genre: 
                            <?= $data->genre?>
                        </h5>            
                        <h5 class="infos">
                            <?= $data->date_premier_episode?>

                            <?php
                        $final = $data->date_dernier_episode;

                        if ($final!=NULL){
                            echo '- ' . $final;
                        }
                        ?>
                        
                        </h5>            
                            <h5 class="infos">Nombre de saison(s): 
                                <?= $data->saisons?>
                            </h5>            
                    </div>
                </div>
<!-- SYNOPSIS, BOUTON AJOUTER A LA LISTE ET LIEN DE DIFFUSION  -->
                <p class="description">
                    <?= $data->synopsis?>
                </p>
                
                <div class="bouton">
                    <button ><i class="fa-solid fa-circle-plus"></i>  Ajouter à ma liste</button>
                </div>
                <div class="diffusion">
                    <a class="lien" href="<?= $data->diffusion?>">Où visionner cette série?</a>
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
                    <button class="bouton" type="submit" class="poster">Soumettre</button>                
            </form>
        </div> 

    </div> 

    
</body>

</html>

<?php
endwhile;

?>