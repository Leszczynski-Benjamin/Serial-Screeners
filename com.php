<?php include 'database.php';
$req = $pdo->query("SELECT avis.ID, avis.com, avis.date, avis.note, users.pseudo, users.picture from avis INNER JOIN users ON avis.user_ID = users.ID");

while($data = $req->fetch()){
    if ($data->ID % 2 == 0) {
    echo"
    <div class='container'>
        <img src='./img$data->picture' alt='Avatar' style='width:10%;'>
        <p style='text-align: start; margin-left: 80px; '>$data->pseudo : $data->com</p>
        <span class='time-right'>". date("d/m/Y H:i", strtotime($data->date)) ."</span>
    </div>
";}

else {
    echo" <div class='container darker'>
    <img src='./img$data->picture' alt='Avatar' class='right' style='width:10%;'>
    <p style='text-align: start; margin-right: 80px; '>$data->pseudo : $data->com</p>
    <span class='time-left'>". date("d/m/Y H:i", strtotime($data->date)) ."</span>
    </div>
";}
}
?>