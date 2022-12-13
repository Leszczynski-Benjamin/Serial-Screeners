<?php
include './fonction.php';

session_start(); //La fonction “session_start” est appelée ; elle démarre une nouvelle session ou reprend une session existante

error_reporting(E_ALL);
ini_set("display_errors", 1);

if (!empty($_POST) && isset($_SESSION['ID'])) {

    if (!empty($_POST['com'])) {
        $columnName = null;
        if (isset($_POST['film_ID'])) {
            $columnName = 'film_ID';
        }
        else if (isset($_POST['serie_ID'])) {
            $columnName = "serie_ID";
        }

        if (!is_null($columnName)) {
            $com = caracteres_speciaux($_POST['com']);

            require "./database.php";
            
            try {
                $req = $pdo->prepare("INSERT INTO avis (date, com, user_ID, " . $columnName . ") values (now(), :com, :user_ID, :" . $columnName . ") ");
                $req->execute([
                    'com' => $com,
                    'user_ID' => $_SESSION['ID'],
                    $columnName => (int)$_POST[$columnName]
                ]);
                $_SESSION['msg']['ok'] = 'Commentaire posté avec succès !';
            }catch (Exception $e) {
                $_SESSION['msg']['POST'] = 'Erreur critique lors de l\'insertion en base de donnée. CODE : ' . $e->getCode();
            }
        }else {
            $_SESSION['msg']['POST'] = 'Type de fiche introuvable';
        }
    } else {
        $_SESSION['msg']['com'] = 'Merci de saisir un commentaire';
    }
} else {
    $_SESSION['msg']['POST'] = 'Merci de renseigner le formulaire ou de vous connecter';
}

header('location: ./index.php');