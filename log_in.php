<?php
$database_host = 'http://localhost/';
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


?>


<?php
session_start();

if(isset($_POST['identifiant']) && isset($_POST['mot_de_passe'])) {

    $query = $pdo->prepare('SELECT mot_de_passe, type_
                            FROM compte
                            WHERE email LIKE "'.$_POST['identifiant'].'"');
    $query->execute();

    $info = $query->fetch();
    if(hash('sha256', $_POST['mot_de_passe']) == $info['mot_de_passe']){
        $_SESSION['IS_CONNECTED'] = true;
        $_SESSION['identifiant'] = $_POST['identifiant'];

        $query2 = $pdo->prepare('SELECT * 
                                FROM '.$info['type_'].' 
                                WHERE email LIKE "'.$_POST['identifiant'].'"');
        $query2->execute();

        $donnees = $query2->fetch();
        $_SESSION['donnees'] = $donnees;
        $_SESSION['type_'] = $info['type_'];
        $info = null;
        header('location: http://localhost:8080/projet/index.php');
        exit;
        
    }
}
header('location: http://localhost:8080/projet/log_in.html');
exit;

?>