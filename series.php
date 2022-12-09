<?php
require 'database.php';
include 'header.php';
?>


<div class="containerSerieFilm">
    <div id="grid">

        <?php
        $ID = isset($_GET['ID']);
        $req = $pdo->query('SELECT * FROM series ORDER BY ID DESC');

        while ($data = $req->fetch()) {

            echo '<a href="./fiche_serie.php?id=' . $data->ID . '">
           <div class="grid-item">
                <img src="./img/' . $data->affiche . '"alt="" height="260px" width="160px">
            </div>';
        }



        ?>

    </div>
</div>

<?php

include './footer.php';
