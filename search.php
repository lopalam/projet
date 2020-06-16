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


function find_doctor($start, $per_page, $keyword, $ville, $specialite, $mysqli)
{
    $start = preg_replace('/[^0-9]/', '', $mysqli->real_escape_string($start));
    $per_page = preg_replace('/[^0-9]/', '', $mysqli->real_escape_string($per_page));
    $keyword = $mysqli->real_escape_string(stripslashes($keyword));
    $ville= $mysqli->real_escape_string(stripslashes($ville));

    /*      $t1 = '';
           $t2 = '';
          $t3 = '';
            $t4 = '';
            $t5 = '';
    */
    $q = "SELECT * FROM `medecin`";

    if ($keyword && !empty($keyword)) {
        $q .= " AND (`specialite` LIKE '%".$keyword."%' OR `code_postal` LIKE '%".$keyword."%' OR `ville` LIKE '%".$keyword."%')";
    }
    //$q .= " AND `p_for`='$prop_for'";
    if ($ville && !empty($ville)) {
        $q .= " AND `ville`=".$ville;
    }
    if ($specialite && !empty($specialite)) {
        $q .= " AND `specialite`=".$specialite;
    }
}

?>