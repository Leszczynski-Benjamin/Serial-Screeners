<?php
require 'database.php';
include 'header.php';

echo '<div class="containerFilmsSeries"';
echo '<div id="grid">';

$req = $pdo->query("SELECT * FROM series ORDER BY id DESC");
$data["series"] = $req->fetchAll();

foreach ($data as $items) {
    foreach ($items as $item) {

        echo '<div class="grid-item">
                <img src="./img/' . $item->affiche . '"alt="" height="260px" width="160px">
            </div>';
    }
}
echo '</div>';
echo '</div>';



include './footer.php';
