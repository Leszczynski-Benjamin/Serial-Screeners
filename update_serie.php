<?php
session_start();
require "./database.php";

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
        $extensions = ['jpg', 'png', 'jpeg', 'JPG', 'JPEG', 'PNG'];
        
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

    <div>
        <h2>Modification</h2>

    <form action="#" method="POST" enctype="multipart/form-data">

    <label for="titre">Nouveau titre</label>
    <input type="text" name="titre" value="<?= $data->titre ?>">

    <label for="original">Nouveau titre original</label>
    <input type="text" name="original" value="<?= $data->titre_original ?>">

    <label for="genre">Nouveau genre</label>
    <input type="text" name="genre" value="<?= $data->genre ?>">

    <label for="synopsis">Nouveau synopsis</label>
    <input type="text" name="synopsis" value="<?= $data->synopsis ?>">

    <label for="showrunners">Nouveaux showrunners</label>
    <input type="text" name="showrunners" value="<?= $data->showrunners ?>">

    <label for="acteurs">Nouveau casting</label>
    <input type="text" name="acteurs" value="<?= $data->acteurs_principaux ?>">

    <label for="debut">Nouvelle année de début</label>
    <input type="text" name="debut" value="<?= $data->date_premier_episode ?>">

    <label for="fin">Nouvelle année de fin</label>
    <input type="text" name="fin" value="<?= $data->date_dernier_episode ?>">

    <label for="saisons">Nouveau nombre de saisons</label>
    <input type="text" name="saisons" value="<?= $data->saisons ?>">

    <label for="diffusion">Nouveau lien de diffusion</label>
    <input type="text" name="diffusion" value="<?= $data->diffusion ?>">

    <label for="note">Nouvelle note</label>
    <input type="text" name="note" value="<?= $data->note ?>">

    <label for="affiche">Nouvelle affiche</label>
    <input type="file" name="affiche" accept=" .jpg, .jpeg, .png, .JPG, .JPEG, .PNG">
   
    <input type="submit" value="Mettre à jour">

    </form>
</div>




    <?php
    include './footer.php'
    ?>