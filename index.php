<?php
include './header.php';

//check si erreur
if (isset($_SESSION['msg'])) {
    foreach($_SESSION['msg'] as $msg){
        echo "<p class='message'>$msg</p>";
    }
    unset($_SESSION['msg']);
}
?>

<div id="accueil-slogo">
    <div class="accueil-logo"> <img src="./img/logo.jpg" alt=""></div>
    <div class="accueil-slogan"> <img src="./img/slogan.jpg"></div>
</div>

<div class="accueil-scotch-bottom"></div>
</div> <!-- Fin bannière logo et slogan -->

<!-- Début carrousel accueil -->
<div class="container_carousel">
    <div class="carousel">
        <div class="carousel__face"></div>
        <div class="carousel__face"></div>
        <div class="carousel__face"></div>
        <div class="carousel__face"></div>
        <div class="carousel__face"></div>
        <div class="carousel__face"></div>
        <div class="carousel__face"></div>
        <div class="carousel__face"></div>
        <div class="carousel__face"></div>
    </div>
</div> <!-- Fin carrousel accueil -->

<?php
include './footer.php';
?>