<?php
include './fonction.php';

session_start(); //La fonction “session_start” est appelée ; elle démarre une nouvelle session ou reprend une session existante

error_reporting(E_ALL);
ini_set("display_errors", 1);

if (!empty($_POST) && isset($_SESSION['ID'])) {

    if (!empty($_POST['com'])) {
        $com = caracteres_speciaux($_POST['com']);

        require "./database.php";
        $req = $pdo->prepare("INSERT INTO avis values (null, :date, :com, :user_ID) ");
        $req->execute([
            'date' => (new DateTime())->format('Y-m-d h:i:s'),
            'com' => $com,
            'user_ID' => $_SESSION['ID']
        ]);

        $_SESSION['msg']['ok'] = 'Commentaire posté avec succès !';
    } else {
        $_SESSION['msg']['com'] = 'Merci de saisir un commentaire';
    }
} else {
    $_SESSION['msg']['POST'] = 'Merci de renseigner le formulaire ou de vous connecter';
}

header('location: ./index.php');
