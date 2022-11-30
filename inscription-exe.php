<?php
require 'database.php';
require 'fonction.php';

if (!empty($_POST)) {
    $errors = array();

    if (empty($_POST['pseudo'])) {
        echo "Veuillez saisir votre pseudo";
    } elseif (empty($_POST['email'])) {
        echo "Veuillez saisir votre adresse mail";
    } elseif (strlen($_POST['user_password']) < 6) {
        echo "Veuillez choisir un mot de passe de plus de 6 caracteres";
    } elseif (($_POST['user_password']) != ($_POST['conf_password'])) {
        echo "Veuillez retaper le même mot de passe";
    } else {
        $email = caracteres_speciaux($_POST['email']);
        $pseudo = caracteres_speciaux($_POST['pseudo']);

        $req = $pdo->prepare("INSERT INTO users SET pseudo = ?, email = ?, user_password = ?");
        $password = password_hash($_POST['user_password'], PASSWORD_BCRYPT);
        $req->execute([$pseudo, $email, $password]);
        header('location: index.php#overlay');
        exit();
    }
}
