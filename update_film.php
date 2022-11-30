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
        $realisateur = $_POST['realisateur'];
        $acteurs = $_POST['acteurs'];
        $sortie = $_POST['sortie'];
        $duree = $_POST['duree'];
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

        $req = $pdo->prepare("UPDATE films SET titre = ?, titre_original = ?, genre = ?, synopsis = ?, realisateur = ?, acteurs_principaux = ?, date_de_sortie_france = ?, duree_en_minutes = ?, ou_voir_le_film = ?, note = ?, affiche = ? WHERE ID = ?");
        $req->execute(array($titre, $original, $genre, $synopsis, $realisateur, $acteurs, $sortie, $duree, $diffusion, $note, $file, $ID));
        header('location: ./espace_admin.php');
    }  

/* permet d'aller chercher les valeurs dans la base de données et évite de devoir saisir à nouveau les informations dans tous les champs, ils sont pré remplis*/

    $req = $pdo->prepare('SELECT * FROM films WHERE ID = ? LIMIT 1');
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
    </div>
    
    <div class="rub">
        <label for="realisateur" class="infos">Nouveau réalisateur:</label>
        <input type="text" name="realisateur" class="case2" value="<?= $data->realisateur ?>">

        <label for="acteurs" class="infos">Nouveau casting:</label>
        <input type="text" name="acteurs" class="case2" value="<?= $data->acteurs_principaux ?>">

        <label for="sortie" class="infos">Nouvelle date de sortie:</label>
        <input type="text" name="sortie" class="case2" value="<?= $data->date_de_sortie_france ?>">
    </div>

    <div class="rub">
        <label for="duree" class="infos">Nouvelle durée:</label>
        <input type="number" name="duree" class="case2" value="<?= $data->duree_en_minutes ?>">

        <label for="diffusion" class="infos">Nouveau lien de diffusion:</label>
        <input type="text" name="diffusion" class="case2" value="<?= $data->ou_voir_le_film ?>">

        <label for="note" class="infos">Nouvelle note:</label>
        <input type="text" name="note" class="case2" value="<?= $data->note ?>">
    </div>

    <div class="rub">
        <label for="synopsis" class="infos">Nouveau synopsis:</label>
        <textarea type="text" name="synopsis" class="case2" cols="70" rows="10"><?= $data->synopsis ?></textarea>
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