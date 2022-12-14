<?php
session_start();  //La fonction “session_start” est appelée ; elle démarre une nouvelle session ou reprend une session existante
require "./fonction.php";

if (!isAdmin())
{
    http_response_code(404);
    die("404");
}


$id =$_GET['ID']; //Après le démarrage d’une session, nous déclenchons la variable “$id” qui équivaut à la méthode “GET” qui va permettre d’envoyer des données vers une page PHP grâce à un formulaire ( ici, l’entrée “id” de la base de données appelée par la fonction “require” pour le fichier “database1.php” )

require "./database.php";

$req = $pdo->prepare("DELETE FROM users WHERE ID = ?"); //La variable $req correspond ainsi à la variable $pdo qui prépare la suppression de l’id ( donc des membres ; avec la déclaration PREPARE et la requête DELETE ) de la table "users"

$req-> execute(array($id)); //L’instruction EXECUTE fait s’appliquer la variable $req

exit(header('location: ./update_membre.php')) //La fonction “exit” puis “header” ramène l’utilisateur sur la page “update_membre.php”
?>