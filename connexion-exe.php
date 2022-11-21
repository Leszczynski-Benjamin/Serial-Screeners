<?php
require "database.php";


if (isset($_POST['submit'])) {
    if (empty($_POST['pseudo']) || empty($_POST['user_password'])) {
        echo 'Veuillez remplir les champs';
    } else {
        $query = "SELECT * FROM users WHERE pseudo = :pseudo LIMIT 1";
        $statement = $pdo->prepare($query);
        $statement->execute(array('pseudo' => $_POST['pseudo']));
    }

    $count = $statement->rowCount();

    if ($count > 0) {
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        if (password_verify($_POST['user_password'], $result['user_password'])) {
            session_start();
            $_SESSION['pseudo'] = $_POST['pseudo'];
            $_SESSION['user_kind'] = $result['user_kind'];
            $_SESSION['ID'] = $result['ID'];
            if ($_SESSION['user_kind'] == 1) {
                header('location: fiche_film.php');
            } else {
                header('location: fiche_film.php');
            }
        } else {
            header('location: index.php');
        }
    }
}
