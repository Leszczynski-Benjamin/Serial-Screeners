<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta description="Le site collaboratif qui répertorie les films et séries" content="série, télévision, films, cinéma, divertissement, culture, comédie, drame, thriller, action, horreur, JustWatch, blockbuster, imaginaire, caméra">
    <title>Serial Screeners</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/6d9b9bcbc0.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">
    <link rel="icon" href="./serial screeners/img/favicon-256x256.png">
</head>

<body>
    <header>
        <!-- Début du header, navbar et connexion inscription -->


        <?php
        require 'database.php';
        session_start();
        if (isset($_SESSION['pseudo'])) {
            echo '  
            <nav>
                <a href="index.php" id="logo">Serial Screeners</a>
                <div class="navLink">
                    <ul class="navLink1">
                        <li><a href="index.php" id="navLink_accueil">Accueil</a></li>
                        <li><a href="series.php" id="navLink_series">Séries</a></li>
                        <li><a href="films.php" id="navLink_films">Films</a></li>
                        <li><a href="espace.php" id="navLink_monEspace">Mon espace</a></li>
                        <li id="navLink_user" onclick="overlayUser()"><i class="fa-solid fa-user-large"></i></li>
                        ' . '<span id="pseudoStyle">Salut ' . $_SESSION["pseudo"]  . '</span>
            <ul id="overlay-user" class="overlay-user">
                            <li><a href="deconnexion-exe.php" id="deco">Déconnexion</a></li>
                            <li><a href="deconnexion-exe.php" id="deco">Changer de mot de passe</a></li>
                            <li><a href="deconnexion-exe.php" id="deco">Se désinscrire</a></li>
                        </ul>
                    </ul>
                    </div>
                </div>
                </a><i class="fa-solid fa-bars" id="menuBurger"></i>
            </nav> ';
        } else {
            echo ' 
            <nav>
                <a href="index.php" id="logo">Serial Screeners</a>
                <div class="navLink">
                    <ul class="navLink1">
                        <li><a href="index.php" id="navLink_accueil">Accueil</a></li>
                        <li><a href="series.php" id="navLink_series">Séries</a></li>
                        <li><a href="films.php" id="navLink_films">Films</a></li>
                        <li><a href="#overlay" id="navLink_user"><i class="fa-solid fa-user-large"></i></a></li>
                    </ul>
                </div>
                </a><i class="fa-solid fa-bars" id="menuBurger"></i>
            </nav>';
        }
        ?>


    </header>
    <!-- Fin du header, navbar et connexion inscription -->
    <div id="overlay" class="overlay">
        <!-- Popup Espace connexion -->
        <div id="popup">
            <img src="./img/yellow_scotch.jpg" id="scotch-1">
            <img src="./img/yellow_scotch.jpg" id="scotch-2" />
            <a href="#" id="linkBtnClose"><span id="btnClose">&times;</span></a>
            <div class="box-inscription">
                <h2>Espace membre</h2>
                <p>Vous avez déjà un compte ?</p>
                <!-- Connexion -->
                <form action="connexion-exe.php" method="POST">
                    <label for="pseudo">Pseudo</label> <br>
                    <input type="text" name="pseudo" id="user_pseudo"> <br>
                    <label for="user_password">Mot de passe</label> <br>
                    <input type="password" name="user_password" id="user_password"> <br>
                    <button id="link-connexion" type="submit" name="submit">Me connecter</button> <br>
                </form>
                <div id="link-lose-password" onclick="losePassword()">J'ai oublié mon mot de passe</div>
                <form id="form-lose-password" action="inscription-exe.php" method="post">
                    <label for="email">Adresse e-mail :</label><br>
                    <input type="email" name="email" id="user_email" required><br>
                    <button id="link-connexion" type="submit" name="submit">Envoyez un lien de connexion</button> <br>
                </form>
            </div>
            <!-- Lien pour accéder à la Popup inscription -->
            <div id="create-account">
                <button id="link-create-account" class="link-create-account" onclick="popup2()">Créer un compte</button>
            </div>
            <!-- Popup Espace Inscription -->
            <div id="popup-2" class="popup">
                <a href="#" id="linkBtnClose"><span id="btnClose">&times;</span></a>
                <div class="box-inscription">
                    <p>Pas encore membre ?</p>
                    <!-- Inscription -->
                    <form action="inscription-exe.php" method="post">
                        <label for="pseudo">Pseudo :</label><br>
                        <input type="text" name="pseudo" id="user_pseudo" required><br>
                        <label for="email">Adresse e-mail :</label><br>
                        <input type="email" name="email" id="user_email" required><br>
                        <label for="user_password">Mot de passe :</label><br>
                        <input type="password" name="user_password" id="user_pass" required><br>
                        <label for="conf_password">Confirmez le mot de passe :</label><br>
                        <input type="password" name="conf_password" id="confpassword" required> <br>
                        <button type="submit" id="link-inscription">S'inscrire</button>
                    </form>
                </div>
                <!-- Lien pour accéder à la Popup connexion -->
                <div id="create-account">
                    <button id="link-connexion-account" class="link-create-account" onclick="popup1()">Se connecter</button>
                </div>

            </div>
        </div>
    </div>
   <!-- Accès au script JS -->
   <script src="script.js"></script>
    <!-- Début bannière logo et slogan -->
    <div id="accueil-banniere">
        <div class="accueil-scotch-top"></div>