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
    <link rel="stylesheet" type="text/css" href="css/style.scss">
    <title>Accueil</title>
</head>

<body>
    <header>
        <span ID="title_span">
        <div class="banner">
        <h1 id="docto-covid-allo">Docto-Covid-Allo</h1>
    </div>

	<div class="interaction">

    <div class="greeting">
        Bienvenue sur Docto-Covid-Allo! Votre Assistant en cas de contamination! Que désirez vous faire?
    </div>
            <div class="search">
		Effectuer une rechercher
			<form action="search.php" method="GET">
				<input type="text" name="query" placeholder="Médecin, code postal, specialité..." class="search-bar"/>
				<input type="submit" value="Search" class="search-button" />
			</form>
		</div>
        </span>
        <span ID="button_span">

            <form ID="log_out_button" action="log_out.php">
                <button type="submit">Déconnexion</button>
            </form>
            <?php if ($_SESSION['type_de_compte'] == 'patient') { ?>
            <form ID="profile_button" action="profils/patient.php">
                <button type="submit">Modifier votre profil</button>
            </form>
            <?php
            } if ($_SESSION['type_de_compte'] == 'medecin') {
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

    <div class="chat_access">
		<a href="chat/public/index.html">Prendre contact avec un médécin</a>
		</div>

</body>


</html>