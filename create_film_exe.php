<?php
include './fonction.php';

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
        $affiche = caracteres_speciaux($_POST['affiche']);

        require "./database.php";
        $req = $pdo->prepare("INSERT INTO films SET titre = ?, titre_original = ?, genre = ?, synopsis = ?, realisateur = ?, acteurs_principaux = ?, date_de_sortie_france = ?, duree_en_minutes = ?, ou_voir_le_film = ?, note = ?, affiche = ?");
    $req->execute([$titre, $original, $genre, $synopsis, $realisateur, $casting, $sortie, $duree, $diffusion, $note, $affiche]);
        header('location: ./espace_admin.php');

        exit();
}
}
if(isset($errors)){
    $_SESSION['erreur'] = $errors;
    header('location: ./index.php');
}


?>