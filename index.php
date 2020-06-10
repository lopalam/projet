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
    <link rel="stylesheet" type="text/css" href="css/main.css">
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
            <form ID="profile_button" action="profils/patient.php">
                <button type="submit">Modifier votre profil</button>
            </form>
            <?php
            } if($_SESSION['type_de_compte'] == 'medecin') {
            ?>
            <form ID="profile_button" action="profils/medecin.php">
                <button type="submit">Modifier votre profil</button>
            </form>
            <?php
            }
            ?>
        </span>
    </header>

	<div id="info_covid">
		<form action="http://90.120.176.23:8080/projet/covid.html">
			<input type="submit" value="Informations Covid-19" />
		</form>
	</div>

    <div id="research_doctor">
        <form action="resrarch_medecin.php" method="post">
		<input class="searchbar-input-doctor" placeholder="Médecin, établissement..." value="">
		<input class="searchbar-input-place" placeholder="Lieu" value="">
        <button type="submit">Rechercher</button>
        </form>
	</div>
</body>

</html>