<?php
include './fonction.php';
require "./database.php";

        $titre = caracteres_speciaux($_POST['titre']);
        $original = caracteres_speciaux($_POST['original']);
        $genre = caracteres_speciaux($_POST['genre']);
        $synopsis = caracteres_speciaux($_POST['synopsis']);
        $showrunners = caracteres_speciaux($_POST['showrunners']);
        $casting = caracteres_speciaux($_POST['casting']);
        $debut = caracteres_speciaux($_POST['debut']);
        $fin = caracteres_speciaux($_POST['fin']);
        $saisons = caracteres_speciaux($_POST['saisons']);
        $diffusion = caracteres_speciaux($_POST['diffusion']);
        $note = caracteres_speciaux($_POST['note']);
    
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

    
    $req = $pdo->prepare("INSERT INTO series SET titre = ?, titre_original = ?, genre = ?, synopsis = ?, showrunners = ?, acteurs_principaux = ?, date_premier_episode = ?, date_dernier_episode = ?, saisons = ?, diffusion = ?, note = ?, affiche = ?, ID = ?");
$req->execute([$titre, $original, $genre, $synopsis, $showrunners, $casting, $debut, $fin, $saisons, $diffusion, $note, $file, $ID]);
    header('location: ./espace_admin.php');

    exit();
}
?>