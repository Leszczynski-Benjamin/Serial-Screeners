<body>
    <?php
    include 'header.php';
    // Upload d'images vers la base de donnés
    echo '<h2> Uploader une affiche de série</h2>
          <form method="POST" enctype="multipart/form-data">
            <input type="file" name="affiche"/><br><br>
            <input type="submit" value="Envoyez l\'affiche"/>
          </form><br>';

    // 
    if (!empty($_FILES)) {
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
                    $req = $pdo->prepare('INSERT INTO serie (image, nom) VALUES(?, ?)');
                    $req->execute(array($file_dest, $file_dest));
                    echo 'Fichiers envoyer avec succès';
                } else {
                    echo 'Une erreur est survenu lors de l\'envoie de l\'image';
                }
            } else {
                echo 'Seuls les fichiers suivant sont autoriser (png, jpg, webp)';
            }
        }
    }
    ?>

</body>

</html>
<?php

include 'footer.php';

?>