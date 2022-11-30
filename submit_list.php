<?php
    include 'header.php';
    require 'database.php';

    ?>
<a href="./espace_admin.php" class="retour">Retour</a>
<div class="column_large">
    
        <h2 class="diffusion">Suggestions des membres</h2>
            <table class="colonne_submit">
                <tr> <th class="infos">ID</th> <th class="infos">Titre</th> <th class="infos">Film ou Série?</th> <th class="infos">Genre</th> <th class="infos">Date de sortie</th><th class="infos">Acteurs principaux</th> <th class="infos">Réalisateur ou showrunner</th></tr>   

<?php
$req = $pdo->query("SELECT * FROM submit");
while($data = $req->fetch()){
    echo "<tr> <td>$data->ID</td><td>$data->titre</td><td>$data->film_ou_serie</td><td>$data->genre</td><td>$data->date_de_sortie</td><td>$data->acteurs_principaux</td><td>$data->real_ou_showrunner</td>";
    echo "<td>";
    echo "<a href='./delete_submit.php?ID=$data->ID' class='update'>Supprimer</a>";
    echo "</td></tr>";
}
?>
            </table>
    </div>
