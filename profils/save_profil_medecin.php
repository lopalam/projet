<?php

$database_host = '127.0.0.1';
$database_port = '3306';
$database_dbname = 'doctocovidallo';
$database_user = 'root';
$database_password = '';
$database_charset = 'UTF8';
$database_options = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
];

$pdo = new PDO(
    'mysql:host=' . $database_host .
    ';port=' . $database_port .
    ';dbname=' . $database_dbname .
    ';charset=' . $database_charset,
    $database_user,
    $database_password,
    $database_options
);

session_start();


if ($_POST['prenom'] != '') {
    $query_add = $pdo->prepare('UPDATE ' .$_SESSION['type_de_compte'] .'
                                SET prenom = :prenom
                                WHERE email LIKE :mail ;');
    $query_add->bindParam(':prenom', $_POST['prenom']);
    $query_add->bindParam(':mail', $_SESSION['identifiant']);
    $query_add->execute();
}

if ($_POST['nom'] != '') {
    $query_add = $pdo->prepare('UPDATE ' .$_SESSION['type_de_compte'] .'
                                SET nom = :nom
                                WHERE email LIKE :mail ;');
    $query_add->bindParam(':nom', $_POST['nom']);
    $query_add->bindParam(':mail', $_SESSION['identifiant']);
    $query_add->execute();
}


if ($_POST['adresse'] != '') {
    $query_add = $pdo->prepare('UPDATE ' .$_SESSION['type_de_compte'] .'
                                SET adresse = :adresse
                                WHERE email LIKE :mail ;');
    $query_add->bindParam(':adresse', $_POST['adresse']);
    $query_add->bindParam(':mail', $_SESSION['identifiant']);
    $query_add->execute();
}

if ($_POST['code_postal'] != '') {
    $query_add = $pdo->prepare('UPDATE ' .$_SESSION['type_de_compte'] .'
                                SET code_postal = :code_postal
                                WHERE email LIKE :mail ;');
    $query_add->bindParam(':code_postal', $_POST['code_postal']);
    $query_add->bindParam(':mail', $_SESSION['identifiant']);
    $query_add->execute();
}

if ($_POST['ville'] != '') {
    $query_add = $pdo->prepare('UPDATE ' .$_SESSION['type_de_compte'] .'
                                SET ville = :ville
                                WHERE email LIKE :mail ;');
    $query_add->bindParam(':ville', $_POST['ville']);
    $query_add->bindParam(':mail', $_SESSION['identifiant']);
    $query_add->execute();
}


if ($_POST['specialite'] != '') {
    $query_add = $pdo->prepare('UPDATE ' .$_SESSION['type_de_compte'] .'
                                SET specialite = :specialite
                                WHERE email LIKE :mail ;');
    $query_add->bindParam(':specialite', $_POST['specialite']);
    $query_add->bindParam(':mail', $_SESSION['identifiant']);
    $query_add->execute();
}

if ($_POST['email'] != '') {
    $query_add = $pdo->prepare('UPDATE ' .$_SESSION['type_de_compte'] .'
                                SET email = :email
                                WHERE email LIKE :mail ;');
    $query_add->bindParam(':email', $_POST['email']);
    $query_add->bindParam(':mail', $_SESSION['identifiant']);
    $query_add->execute();

    $query_add = $pdo->prepare('UPDATE compte
                                SET email = :email
                                WHERE email LIKE :mail ;');
    $query_add->bindParam(':email', $_POST['email']);
    $query_add->bindParam(':mail', $_SESSION['identifiant']);
    $query_add->execute();
}


$query2 = $pdo->prepare('SELECT *
                        FROM '.$_SESSION['type_de_compte'].'
                        WHERE email LIKE "'.$_SESSION['identifiant'].'"');
$query2->execute();

$donnees = $query2->fetch();
$_SESSION['donnees'] = $donnees;

header('location: http://90.120.176.23:8080/projet/index.php');
exit;
