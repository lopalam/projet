<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Accueil</title>
</head>
<body>
    <header>
        <span ID="title_span">
            <h1>Docto-covid-allo</h1>
            <?php if (isset($_SESSION['IS_CONNECTED'])) {
                ?><h2>Bienvenu <?php $_SESSION['donnees']['prenom']?> </h2><?php
            }    
            ?>
        </span>
        <span ID="button_span">
            <?php if (isset($_SESSION['IS_CONNECTED'])==false) {
            ?>
            <form ID="log_in_button" action="log_in.html"> 
                <button type="submit">Connexion</button>
            </form>
            <form ID="sign_up_button" action="sign_up.html"> 
                <button type="submit">S'enregistrer</button>
            </form>
            <?php
            }    
            ?>
            <?php if (isset($_SESSION['IS_CONNECTED'])) {
                ?>
            <form ID="log_out_button" action="log_out.php">
                <button type="submit">Déconnexion</button>
            </form>
            <form ID="profile_button" action="profil.php">
                <button type="submit">Modifier votre profil</button>
            </form>
            <?php
            }    
            ?>
        </span>
        <hr>
    </header>
    
</body>
</html>