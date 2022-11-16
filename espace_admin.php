<body>
    <?php
    include 'header.php';
    require 'database.php';

    ?>
<div class="column_large">
    <div class="column_edit">
        <h2>Liste des films</h2>
            <table>
                <tr> <th>ID</th> <th>Titre</th></tr>   

<?php
$req = $pdo->query("SELECT * FROM films");
while($data = $req->fetch()){
    echo "<tr> <td>$data->ID</td><td>$data->titre</td>";
    echo "<td>";
    echo "<a href='./update_film.php?ID=$data->ID'>Modifier<br></a>";
    echo "<a href='./delete_film.php?ID=$data->ID'>Supprimer</a>";
    echo "</td></tr>";
}
?>
            </table>
    </div>

    <div class="column_edit">
        <h2>Liste des séries</h2>
            <table>
                <tr> <th>ID</th> <th>Titre</th></tr>   

<?php
$req = $pdo->query("SELECT * FROM series");
while($data = $req->fetch()){
    echo "<tr> <td>$data->ID</td><td>$data->titre</td>";
    echo "<td>";
    echo "<a href='./update_serie.php?ID=$data->ID'>Modifier<br></a>";
    echo "<a href='./delete_serie.php?ID=$data->ID'>Supprimer</a>";
    echo "</td></tr>";
}
?>
            </table>
    </div>
</div>

</body>

</html>
<?php

include 'footer.php';

?>