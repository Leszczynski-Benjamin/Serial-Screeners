<?php
session_start();
require "./fonction.php";

if (!isAdmin())
{
    http_response_code(404);
    die("404");
}

$ID =$_GET['ID'];

require "./database.php";

$req = $pdo->prepare("DELETE FROM films WHERE ID = ?");

$req->execute(array($ID));

exit(header('location: ./update.php'));

?>

