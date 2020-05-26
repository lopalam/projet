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
            <h1>Titre principal</h1>
            <h2>Bienvenu <?php $_SESSION['prenom'] ?></h2>
        </span>
        <span ID="log_span">
            <form ID="log_in_button" action="log_in.html"> 
                <button type="submit">Connexion</button>
            </form>
            <form ID="sign_up_button" action="sign_up.html"> 
                <button type="submit">S'enregistrer</button>
            </form>
        </span>
        <hr>
    </header>
    
</body>
</html>