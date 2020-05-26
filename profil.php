<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Profil</title>
</head>
<body>
    <header>
        <span ID="title_span">
            <h1>Docto-covid-allo</h1>
        </span>
        <form ID="home_button" action="index.php"> 
            <button type="submit">Accueil</button>
        </form>
        <hr>
    </header>
    <span>
        <form action="save_profil.php" method="post">
        <button type="submit">Sauvegarder</button>

        <ul>
            <li> Prénom (<?php print_r($_SESSION['donnees']['prenom']) ?>):  <input type="text" name="prenom" placeholder="Nouveau prénom" /> </li>
            <li> Nom (<?php print_r($_SESSION['donnees']['nom']) ?>):  <input type="text" name="nom" placeholder="Nouveau nom" /> </li>
            <li> Email (<?php print_r($_SESSION['donnees']['email']) ?>):  <input type="text" name="email" placeholder="Nouvelle adresse mail" /> </li>

        </ul>
        </form>
    </span>
</body>
</html>