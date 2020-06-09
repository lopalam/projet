<?php
session_start();
if (isset($_SESSION['IS_CONNECTED']) == false) {
    header('location: http://90.120.176.23:8080/projet/index.html');
    exit;
}

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
                ?><h2>Bienvenue <?php $_SESSION['donnees']['prenom']?> </h2><?php
            }    
            ?>
        </span>
        <span ID="button_span">

            <form ID="log_out_button" action="log_out.php">
                <button type="submit">Déconnexion</button>
            </form>
            <?php if ($_SESSION['type_de_compte'] == 'patient'){ ?>
            <form ID="profile_button" action="profil/patient.php">
                <button type="submit">Modifier votre profil</button>
            </form>
            <?php
            } if($_SESSION['type_de_compte'] == 'medecin') {   
            ?>
            <form ID="profile_button" action="profil/medecin.php">
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