<?php
session_start();

$ID =$_GET['ID'];

require "./database.php";

$req = $pdo->prepare("DELETE FROM submit WHERE ID = ?");

$req->execute(array($ID));

exit(header('location: ./submit_list.php'));

?>