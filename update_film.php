<?php
session_start();
require "./database.php";

$ID = $_GET['ID'];
    if(!empty($_POST)){
        $titre = $_POST['titre'];
        $original = $_POST['original'];
        $genre = $_POST['genre'];
        $synopsis = $_POST['synopsis'];
        $realisateur = $_POST['realisateur'];
        $acteurs = $_POST['acteurs'];
        $sortie = $_POST['sortie'];
        $duree = $_POST['duree'];
        $diffusion = $_POST['diffusion'];
        $note = $_POST['note'];
        $affiche = $_POST['affiche'];
        $req = $pdo->prepare("UPDATE films SET titre = ?, titre_original = ?, genre = ?, synopsis = ?, realisateur = ?, acteurs_principaux = ?, date_de_sortie_france = ?, duree_en_minutes = ?, ou_voir_le_film = ?, note = ?, affiche = ? WHERE ID = ?");
        $req->execute(array($titre, $original, $genre, $synopsis, $realisateur, $acteurs, $sortie, $duree, $diffusion, $note, $affiche, $ID));
        header('location: ./espace_admin.php');
    }  

/* permet d'aller chercher les valeurs dans la base de données et évite de devoir saisir à nouveau les informations dans tous les champs, ils sont pré remplis*/

    $req = $pdo->prepare('SELECT * FROM films WHERE ID = ? LIMIT 1');
    $req->execute([$ID]);
    $data = $req->fetch();
    
        ?>
        

    <div>
        <h2>Modification</h2>

    <form action="#" method="POST">

    <label for="titre">Nouveau titre</label>
    <input type="text" name="titre" value="<?= $data->titre ?>">

    <label for="original">Nouveau titre original</label>
    <input type="text" name="original" value="<?= $data->titre_original ?>">

    <label for="genre">Nouveau genre</label>
    <input type="text" name="genre" value="<?= $data->genre ?>">

    <label for="synopsis">Nouveau synopsis</label>
    <input type="text" name="synopsis" value="<?= $data->synopsis ?>">

    <label for="realisateur">Nouveau réalisateur</label>
    <input type="text" name="realisateur" value="<?= $data->realisateur ?>">

    <label for="acteurs">Nouveau casting</label>
    <input type="text" name="acteurs" value="<?= $data->acteurs_principaux ?>">

    <label for="sortie">Nouvelle date de sortie</label>
    <input type="text" name="sortie" value="<?= $data->date_de_sortie_france ?>">

    <label for="duree">Nouvelle durée</label>
    <input type="text" name="duree" value="<?= $data->duree_en_minutes ?>">

    <label for="diffusion">Nouveau lien de diffusion</label>
    <input type="text" name="diffusion" value="<?= $data->ou_voir_le_film ?>">

    <label for="note">Nouvelle note</label>
    <input type="text" name="note" value="<?= $data->note ?>">

    <label for="affiche">Nouvelle affiche</label>
    <input type="file" enctype="multipart/form-data" name="affiche" value="<?= $data->affiche ?>">

<!-- ---------------------------------code de benjamin ------------------------------------------------------------------>    
    <h2> Uploader une affiche de série</h2>
          <form method="POST" enctype="multipart/form-data">
            <input type="file" name="affiche"/><br><br>
            <input type="submit" value="Envoyez l'affiche"/>
          </form><br>';

    <?php if (!empty($_FILES)) {
        $file_name = $_FILES['affiche']['name'];
        $file_extension = strrchr($_FILES['affiche']['name'], ".");
        $extensions_autoriser = array('.png', '.PNG', '.jpg', '.JPG', '.webp', '.WEBP');
        $file_tmp_name = $_FILES['affiche']['tmp_name'];
        $file_dest = $file_name;

        // Vérification de la taille de l'image lors de l'upload
        if (getimagesize($_FILES['affiche']['tmp_name'])[0] > 1500 || getimagesize($_FILES['affiche']['tmp_name'])[1] > 2000) {
            echo "Erreur";
            // Sauvegarde de l'image dans le fichier et dans la bdd
        } else {
            if (in_array($file_extension, $extensions_autoriser)) {
                if (move_uploaded_file($file_tmp_name, "./img/$file_dest")) {
                    $req = $pdo->prepare('INSERT INTO films(affiche) VALUES(?)');
                    $req->execute(array($file_dest));
                    echo 'Fichiers envoyer avec succès';
                } else {
                    echo 'Une erreur est survenu lors de l\'envoi de l\'image';
                }
            } else {
                echo 'Seuls les fichiers suivant sont autoriser (png, jpg, webp)';
            }
        }
    }
    ?>
<!-- ---------------------------------code de benjamin ------------------------------------------------------------------>
    
   
    <input type="submit" value="Mettre à jour">

    </form>
</div>




    <?php
    include './footer.php'
    ?>