<?php
    include 'header.php';
    require 'database.php';

    ?>
<a href="./espace_admin.php" class="retour">Retour</a>
<div class="column_large">
    <div class="column_edit">
        <h2>Liste des films</h2>
            <table class="colonne">
                <tr> <th class="infos">ID</th> <th class="infos">Titre</th></tr>   

<?php
$req = $pdo->query("SELECT * FROM films");
while($data = $req->fetch()){
    echo "<tr> <td>$data->ID</td><td>$data->titre</td>";
    echo "<td><br>";
    echo "<a href='./update_film.php?ID=$data->ID' class='update'>Modifier<br></a>";
    echo "<a href='./delete_film.php?ID=$data->ID' class='update'>Supprimer</a>";
    echo "</td></tr>";
}
?>
            </table>
    </div>

    <div class="column_edit">
        <h2>Liste des séries</h2>
            <table class="colonne">
                <tr> <th class="infos">ID</th> <th class="infos">Titre</th></tr>   

<?php
$req = $pdo->query("SELECT * FROM series");
while($data = $req->fetch()){
    echo "<tr> <td>$data->ID</td><td>$data->titre</td>";
    echo "<td><br>";
    echo "<a href='./update_serie.php?ID=$data->ID' class='update'>Modifier<br></a>";
    echo "<a href='./delete_serie.php?ID=$data->ID' class='update'>Supprimer</a>";
    echo "</td></tr>";
}
?>
            </table>
    </div>
</div>
