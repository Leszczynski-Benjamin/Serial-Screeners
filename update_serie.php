<?php
session_start();
require "./database.php";
include 'header.php';

$ID = $_GET['ID'];
    if(!empty($_POST)){
        $titre = $_POST['titre'];
        $original = $_POST['original'];
        $genre = $_POST['genre'];
        $synopsis = $_POST['synopsis'];
        $showrunners = $_POST['showrunners'];
        $acteurs = $_POST['acteurs'];
        $debut = $_POST['debut'];
        $fin = $_POST['fin'];
        $saisons = $_POST['saisons'];
        $diffusion = $_POST['diffusion'];
        $note = $_POST['note'];
        
    }

    if(isset($_FILES['affiche'])){
        $tmpName = $_FILES['affiche']['tmp_name'];
        $name = $_FILES['affiche']['name'];
        $size = $_FILES['affiche']['size'];
        $error = $_FILES['affiche']['error'];
       
        $tabExtension = explode('.', $name);
        $extension = strtolower(end($tabExtension));
        //Tableau des extensions que l'on accepte
        $extensions = ['jpg', 'png', 'jpeg'];
        
        //Taille max que l'on accepte en bytes, ici c'est 2mo max
        $maxSize = 2000000;
        if(in_array($extension, $extensions) && $size <= $maxSize && $error == 0){
        
            $uniqueName = uniqid('', true);
            //uniqid génère quelque chose comme ca : 5f586bf96dcd38.73540086
            $file = $uniqueName.".".$extension;
            //$file = 5f586bf96dcd38.73540086.jpg
        
            move_uploaded_file($tmpName, './img/'.$file);
        
        }

        $req = $pdo->prepare("UPDATE series SET titre = ?, titre_original = ?, genre = ?, synopsis = ?, showrunners = ?, acteurs_principaux = ?, date_premier_episode = ?, date_dernier_episode = ?, saisons = ?, diffusion = ?, note = ?, affiche = ? WHERE ID = ?");
        $req->execute(array($titre, $original, $genre, $synopsis, $showrunners, $acteurs, $debut, $fin, $saisons, $diffusion, $note, $file, $ID));
        header('location: ./espace_admin.php');
    }

    /* permet d'aller chercher les valeurs dans la base de données et évite de devoir saisir à nouveau les informations dans tous les champs, ils sont pré remplis*/

    $req = $pdo->prepare('SELECT * FROM series WHERE ID = ? LIMIT 1');
    $req->execute([$ID]);
    $data = $req->fetch();

    ?>

<a href="./espace_admin.php" class="retour">Retour</a>

    <div>
        <h2>Modification</h2>

    <form action="#" method="POST" enctype="multipart/form-data">

    <div class="rub">
        <label for="titre" class="infos">Nouveau titre:</label>
        <input type="text" name="titre" class="case2" value="<?= $data->titre ?>">

        <label for="original" class="infos">Nouveau titre original:</label>
        <input type="text" name="original" class="case2" value="<?= $data->titre_original ?>">

        <label for="genre" class="infos">Nouveau genre:</label>
        <input type="text" name="genre" class="case2" value="<?= $data->genre ?>">

        <label for="showrunners" class="infos">Nouveaux showrunners:</label>
        <input type="text" name="showrunners" class="case2" value="<?= $data->showrunners ?>">
    </div>

    <div class="rub">
        <label for="acteurs" class="infos">Nouveau casting:</label>
        <input type="text" name="acteurs" class="case2" value="<?= $data->acteurs_principaux ?>">

        <label for="debut" class="infos">Nouvelle année de début:</label>
        <input type="text" name="debut" class="case2" value="<?= $data->date_premier_episode ?>">

        <label for="fin" class="infos">Nouvelle année de fin:</label>
        <input type="text" name="fin" class="case2" value="<?= $data->date_dernier_episode ?>">
    </div>

    <div class="rub">
        <label for="saisons" class="infos">Nouveau nombre de saisons:</label>
        <input type="number" name="saisons" class="case2" value="<?= $data->saisons ?>">

        <label for="diffusion" class="infos">Nouveau lien de diffusion:</label>
        <input type="text" name="diffusion" class="case2" value="<?= $data->diffusion ?>">

        <label for="note" class="infos">Nouvelle note:</label>
        <input type="text" name="note" class="case2" value="<?= $data->note ?>">
    </div>

    <div class="rub">
        <label for="synopsis" class="infos">Nouveau synopsis:</label>
        <textarea type="text" name="synopsis" class="case2" cols="70" rows="10"><?= $data->synopsis?></textarea>
    </div>

    <div class="rub">
        <label for="affiche" class="infos">Nouvelle affiche:</label>
        <input type="file" name="affiche" accept=" .jpg, .jpeg, .png, .JPG, .JPEG, .PNG">
    </div>

    <div class="rub">
        <input type="submit" class="sub_film" value="Mettre à jour">
    </div>

    </form>
</div>




    <?php
    include './footer.php'
    ?>