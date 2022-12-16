<?php
    include 'fonction.php';
    require 'database.php';

        $titre = caracteres_speciaux($_POST['titre']);
        $film_ou_serie = caracteres_speciaux($_POST['film_ou_serie']);
        $genre = caracteres_speciaux($_POST['genre']);
        $sortie = caracteres_speciaux($_POST['date']);
        $casting = caracteres_speciaux($_POST['casting']);
        $realisateur = caracteres_speciaux($_POST['realisateur']);

$req = $pdo->prepare("INSERT INTO submit SET titre = ?, film_ou_serie = ?, genre = ?, date_de_sortie = ?, acteurs_principaux = ?, real_ou_showrunner = ?");
    $req->execute([$titre, $film_ou_serie, $genre, $sortie, $casting, $realisateur]);
        header('location: ./espace.php');
        exit();
?>
