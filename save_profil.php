<?php

$database_host = 'localhost';
$database_port = '3306';
$database_dbname = 'projet';
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


if($_POST['prenom'] != ''){

    $query_add = $pdo->prepare('UPDATE ' .$_SESSION['info']['type_'] .'
                                SET prenom = :prenom
                                WHERE email LIKE :mail ;');
    $query_add->bindParam(':prenom', $_POST['prenom']);
    $query_add->bindParam(':mail', $_SESSION['donnees']['email']);
    $query_add->execute();
    $_SESSION['donnees']['prenom'] = $_POST['prenom'];
}

if($_POST['nom'] != ''){

    $query_add = $pdo->prepare('UPDATE ' .$_SESSION['info']['type_'] .'
                                SET nom = :nom
                                WHERE email LIKE :mail ;');
    $query_add->bindParam(':nom', $_POST['nom']);
    $query_add->bindParam(':mail', $_SESSION['donnees']['email']);
    $query_add->execute();
    $_SESSION['donnees']['nom'] = $_POST['nom'];


}

if($_POST['email'] != ''){

    $query_add = $pdo->prepare('UPDATE ' .$_SESSION['info']['type_'] .'
                                SET email = :email
                                WHERE email LIKE :mail ;');
    $query_add->bindParam(':email', $_POST['email']);
    $query_add->bindParam(':mail', $_SESSION['donnees']['email']);
    $query_add->execute();

    $query_add = $pdo->prepare('UPDATE compte
                                SET email = :email
                                WHERE email LIKE :mail ;');
    $query_add->bindParam(':email', $_POST['email']);
    $query_add->bindParam(':mail', $_SESSION['donnees']['email']);
    $query_add->execute();
    $_SESSION['donnees']['email'] = $_POST['email'];


}
    

header('location: http://localhost:80/projet_web/index.php');
exit;

?>