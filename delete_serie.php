<?php
session_start();

$ID =$_GET['ID'];

require "./database.php";

$req = $pdo->prepare("DELETE FROM series WHERE ID = ?");

$req->execute(array($ID));

exit(header('location: ./update.php'));

?>