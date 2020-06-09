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

        <ul class="profil">
            <li> Prénom (<?php print_r($_SESSION['donnees']['prenom']) ?>):  <input type="text" name="prenom" placeholder="Nouveau prénom" /> </li>
            <li> Nom (<?php print_r($_SESSION['donnees']['nom']) ?>):  <input type="text" name="nom" placeholder="Nouveau nom" /> </li>
            <li> Email (<?php print_r($_SESSION['donnees']['email']) ?>):  <input type="text" name="email" placeholder="Nouvelle adresse mail" /> </li>
            <li> Date de naissance (<?php print_r($_SESSION['donnees']['date_naissance']) ?>): <input type="date" name="anniversaire" placeholder="Modifier votre date de naissance"/> </li>
            <li> Adresse (<?php print_r($_SESSION['donnees']['adresse']) ?>):  <input type="text" name="adresse" placeholder="Nouvelle Adresse postale" /> </li>
            <li> Code Postal(<?php print_r($_SESSION['donnees']['code_postal']) ?>):  <input type="text" name="code_postal" placeholder="Code Postal" /> </li>
            <li> Genre (<?php print_r($_SESSION['donnees']['genre']) ?>):
                        <input type="radio" id="femme" name="genre" value="femme">
                        <label for="femme">Femme</label>

                        <input type="radio" id="homme" name="genre" value="homme">
                        <label for="homme">Homme</label> </li>

        </ul>
        </form>
    </span>
</body>
</html>