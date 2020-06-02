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

if(isset($_POST['email']) && isset($_POST['mot_de_passe']) && isset($_POST['verification_mot_de_passe']) && isset($_POST['type'])) {

    $query = $pdo->prepare('SELECT email FROM ' .$_POST['type']. ' WHERE email LIKE :toto ');
    
    $query->bindParam(':toto', $_POST['email']);

    $query->execute();

    $check = $query->fetch();

    if($check == false && strpos($_POST['email'], '@') != false) {

        if($_POST['mot_de_passe'] == $_POST['verification_mot_de_passe']){
            $mdp = hash('sha256', $_POST['mot_de_passe']);

            $query_info = $pdo->prepare('INSERT INTO compte (id_'.$_POST['type'].', type_de_compte, email, mot_de_passe)
                                        VALUES(:mail, :typ , :mail , :mdp );');
            $query_info->bindParam(':mail', $_POST['email']);
            $query_info->bindParam(':typ', $_POST['type']);
            $query_info->bindParam(':mdp', $mdp);


            $query_info->execute();

            $query_perso = $pdo->prepare('INSERT INTO ' .$_POST['type']. ' (email, id)
                                        VALUES(:mail, :mail);');
            $query_perso->bindParam(':mail', $_POST['email']);


            $query_perso->execute();
            
            header('location: http://localhost:8080/projet/index.php');
            exit;
        };
    };
};
header('location: http://localhost:8080/projet/sign_up.html');
exit;

?>