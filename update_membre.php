<body>
    <?php
    include 'header.php';
    require 'database.php';

    ?>
<a href="./espace_admin.php">Retour</a>
<div class="column_large">
    <div class="column_edit">
        <h2>Liste des membres</h2>
            <table>
                <tr> <th>ID</th> <th>Pseudo</th> <th>Adresse mail</th></tr>   

<?php
$req = $pdo->query("SELECT * FROM users");
while($data = $req->fetch()){
    echo "<tr> <td>$data->ID</td><td>$data->pseudo</td><td>$data->email</td>";
    echo "<td>";
    echo "<a href='./delete_membre.php?ID=$data->ID'>Supprimer</a>";
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