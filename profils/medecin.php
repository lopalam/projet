<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Profil</title>
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
    <header>
        <span ID="title_span">
            <h1>Docto-covid-allo</h1>
        </span>
        <form ID="home_button" action="http://90.120.176.23:8080/projet/index.php"> 
            <button type="submit">Accueil</button>
        </form>
        <hr>
    </header>
    <span>
        <form action="save_profil_medecin.php" method="post">
        <button type="submit">Sauvegarder</button>

        <ul class="profil">
            <li> Prénom (<?php print_r($_SESSION['donnees']['prenom']) ?>):  <input type="text" name="prenom" placeholder="Nouveau prénom" /> </li>
            <li> Nom (<?php print_r($_SESSION['donnees']['nom']) ?>):  <input type="text" name="nom" placeholder="Nouveau nom" /> </li>
            <li> Email (<?php print_r($_SESSION['donnees']['email']) ?>):  <input type="text" name="email" placeholder="Nouvelle adresse mail" /> </li>
            <li> Spécialité (<?php print_r($_SESSION['donnees']['specialite']) ?>):  <input type="text" name="specialite" placeholder="Spécialité" /> </li>            
            <li> Adresse (<?php print_r($_SESSION['donnees']['adresse']) ?>):  <input type="text" name="adresse" placeholder="Nouvelle Adresse postale" /> </li>
            <li> Code Postal(<?php print_r($_SESSION['donnees']['code_postal']) ?>):  <input type="text" name="code_postal" placeholder="Code Postal" /> </li>
            <li> Ville(<?php print_r($_SESSION['donnees']['ville']) ?>):  <input type="text" name="ville" placeholder="Ville" /> </li>

        </ul>
        </form>
    </span>
</body>
</html>