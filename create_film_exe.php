<?php
include './fonction.php';
require "./database.php";

    if(!empty($_POST)){
        $errors = array();

    if(empty($_POST['titre'])){
        echo 'Merci de renseigner le titre du film';
    }
    /*elseif(empty($_POST['duree_en_minutes'])){
        echo 'Merci de renseigner la durée du film';
    }*/
    

    else {
        $titre = caracteres_speciaux($_POST['titre']);
        $original = caracteres_speciaux($_POST['original']);
        $genre = caracteres_speciaux($_POST['genre']);
        $synopsis = caracteres_speciaux($_POST['synopsis']);
        $realisateur = caracteres_speciaux($_POST['realisateur']);
        $casting = caracteres_speciaux($_POST['casting']);
        $sortie = caracteres_speciaux($_POST['sortie']);
        $duree = caracteres_speciaux($_POST['duree']);
        $diffusion = caracteres_speciaux($_POST['diffusion']);
        $note = caracteres_speciaux($_POST['note']);
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

        
        $req = $pdo->prepare("INSERT INTO films SET titre = ?, titre_original = ?, genre = ?, synopsis = ?, realisateur = ?, acteurs_principaux = ?, date_de_sortie_france = ?, duree_en_minutes = ?, ou_voir_le_film = ?, note = ?, affiche = ?, ID = ?");
    $req->execute([$titre, $original, $genre, $synopsis, $realisateur, $casting, $sortie, $duree, $diffusion, $note, $file, $ID]);
        header('location: ./espace_admin.php');

        exit();
}
}
if(isset($errors)){
    $_SESSION['erreur'] = $errors;
    header('location: ./index.php');
}


?>