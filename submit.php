<?php
    include 'header.php';
    require 'database.php';

?>

<div>
    <h2>Soumettre un film ou une série</h2>
    <form action="./submit_exe.php" method="POST" enctype="multipart/form-data">

        <div class="rub">
            <label for="titre" class="infos case">Titre:</label>
            <input type="text" name="titre" required>
                <div class="case">
                    <label for="film_ou_serie" class="infos">Film</label>
                    <input type="radio" name="film_ou_serie" value="film">
                    <label for="film_ou_serie" class="infos">Série</label>
                    <input type="radio" name="film_ou_serie" value="série">
                </div>
        </div>

        <div class="rub">
            <label for="genre" class="infos case">Genre:</label>
            <input type="text" name="genre">       
       
            <label for="date" class="infos case">Date de sortie:</label>
            <input type="text" name="date">            
        </div>

        <div class="rub">
            <label for="casting" class="infos case">Acteurs principaux:</label>
            <input type="text" name="casting">

            <label for="realisateur" class="infos case">Réalisateur ou Showrunner:</label>
            <input type="text" name="realisateur">
        </div>       

        <div class="rub">
            <button type="submit" class="sub_film">Soumettre</button>
        </div>

    </form>
</div>


<?php
include 'footer.php';
?>