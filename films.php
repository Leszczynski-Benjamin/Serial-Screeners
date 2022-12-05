<?php
require 'database.php';
include 'header.php';
echo'<div id="grid">';

$req = $pdo->query("SELECT * FROM films ORDER BY id DESC");
                $data["films"] = $req->fetchAll();

                    foreach ($data as $items) {
                    foreach ($items as $item) {
                        $id = isset($_GET['ID']);
           echo'<a href="./fiche_film.php?id='.$data->id.'">
           <div class="grid-item">
                <img src="./img/'.$item->affiche.'"alt="" height="260px" width="160px">
            </div>';
     

}
}
echo'</div>';   
    


include './footer.php';
