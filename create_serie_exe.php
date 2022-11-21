<?php
include './fonction.php';

    if(!empty($_POST)){
        $errors = array();

    if(empty($_POST['titre'])){
        echo 'Merci de renseigner le titre de la série';
    }
   /* elseif(empty($_POST['recette'])){
        echo 'faux2';
    }
    elseif(empty($_POST['parts'])){
        echo 'faux3';
    }*/

    else {
        $titre = caracteres_speciaux($_POST['titre']);
        $auteur = caracteres_speciaux($_POST['synopsis']);
        /*$annee = caracteres_speciaux($_POST['parts']);*/

        require "./database.php";
        $req = $pdo->prepare("INSERT INTO series SET titre = ?, synopsis = ?/*, parts = ?*/");
    $req->execute([$_POST['titre'], $_POST['synopsis']/*, $_POST['parts']*/]);
        header('location: ./espace_admin.php');

        exit();
}
}
if(isset($errors)){
    $_SESSION['erreur'] = $errors;
    header('location: ./index.php');
}


?>