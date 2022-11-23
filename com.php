<?php include 'database.php'; // La fonction "include" permet d'appeler le fichier PHP nommé "database.php"
$req = $pdo->query("SELECT avis.ID, avis.com, avis.date, avis.note, users.pseudo, users.picture from avis INNER JOIN users ON avis.user_ID = users.ID");
/*La variable “$req” va correspondre à ce qui suit dans le code grâce à l’opérateur “=”, à savoir la variable “$pdo” qui avec l’opérateur d’objet “->” se voit affecter la variable "$query"
La variable “$query” équivaut ( = ) à la déclaration SQL “SELECT”, utilisée pour sélectionner ou récupérer des données dans une base de données. 
En l'occurrence, nous voulons prendre les entrées "ID", "com", "date" et "note" de la table “AVIS" et "pseudo" et "picture" de celle nommée "USERS”
(avec la déclaration “FROM”, c'est-à-dire DEPUIS la table ).
Dans le langage SQL, la commande INNER JOIN correpond à un type de jointures très communes pour lier plusieurs tables entre elles (ici, AVIS et USERS).
Nous agissons sur (ON) l'entrée "user_ID" de la table "avis" en la liant à la clé primaire "ID" de la table "users"*/


while($data = $req->fetch()){   /*L’instruction WHILE ( “tant que” ) est le moyen le plus simple d'implémenter une boucle en PHP. 
Elle exécute les boucles pour un bloc de code tant qu'un état spécifique est vrai. 
Ici, la variable “$data” correspond à la variable “$req” sur laquelle on applique la méthode “fetch” pour récupérer la ligne de résultats.
*/
    if ($data->ID % 2 === 0) { /*La condition IF ("si") permet l'exécution d'une partie de code, à condition que la variable $data.
    Le signe "->" est utilisé dans les objets, pour accéder à ses propriétés et méthodes. 
    Si le reste après division entière par 2, est de  0 (le cas $id ést pair, comme ici) soit 1 (si le cas $id était impair).
    La fonction “echo” fera s’afficher : */
    echo"     
    <div class='container'>
        <img src='./img$data->picture' alt='Avatar' style='width:10%;'>
        <p style='text-align: start; margin-left: 80px; '>$data->pseudo : $data->com</p>
        <span class='time-right'>". date("d/m/Y H:i", strtotime($data->date)) ."</span>
    </div>
";}   /* La fonction "date" permet d'afficher une date, l'heure, le numéro de semaine - "d" pour le our du mois, sur 2 chiffres (avec un zéro initial)
"m" pour le mois au format numérique, avec zéros initiaux - "Y" pour une représentation numérique complète d'une année avec au moins 4 chiffres -
"H" Heure, au format 24h, avec les zéros initiaux - "i" pour les minutes avec les zéros initiaux */

/* La fonction strtotime() analyse une date/heure textuelle en anglais en un horodatage Unix (soit le nombre de secondes depuis le 1er janvier 1970 00:00:00 GMT).*/

else {
    echo" <div class='container darker'>
    <img src='./img$data->picture' alt='Avatar' class='right' style='width:10%;'>
    <p style='text-align: start; margin-right: 80px; '>$data->pseudo : $data->com</p>
    <span class='time-left'>". date("d/m/Y H:i", strtotime($data->date)) ."</span>
    </div>
";}
}
?>