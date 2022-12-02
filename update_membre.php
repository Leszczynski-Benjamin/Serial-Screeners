<body>
    <?php
    include 'header.php';
    require 'database.php';

    ?>
<a href="./espace_admin.php" class="retour">Retour</a>
<div class="column_large">
        <h2 class="diffusion">Liste des membres</h2>
            <table class="colonne_mbr">
                <tr> <th class="infos">ID</th> <th class="infos">Pseudo</th> <th class="infos">Adresse mail</th></tr>   

<?php
$req = $pdo->query("SELECT * FROM users");
while($data = $req->fetch()){
    echo "<tr> <td>$data->ID</td><td>$data->pseudo</td><td>$data->email</td>";
    echo "<td>";
    echo "<a href='./delete_membre.php?ID=$data->ID' class='update'>Supprimer</a>";
    echo "</td></tr>";
}

?>
            </table>
</div>

<?php
include 'footer.php';
?>