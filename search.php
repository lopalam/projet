<?php

include_once('fix_mysql.inc.php');

mysql_connect("127.0.0.1", "root", "") or die("Error connecting to database: ".mysql_error());

mysql_select_db("doctocovidallo") or die(mysql_error());

?>

<!DOCTYPE html>

<head>
    <title>Search results</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>

    <form action="search.php" method="GET">
        <input type="text" name="query" />
        <input type="submit" value="Search" />
    </form>
    <?php
    $query = $_GET['query'];
    // gets value sent over search form

    $min_length = 3;
    // you can set minimum length of the query if you want

    if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then

        $query = htmlspecialchars($query);
        // changes characters used in html to their equivalents, for example: < to &gt;

        $query = mysql_real_escape_string($query);
        // makes sure nobody uses SQL injection

        $raw_results = mysql_query("SELECT * FROM medecin
            WHERE (`specialite` LIKE '%".$query."%') OR (`nom` LIKE '%".$query."%') OR ('code_postal' LIKE '%".$query."%')") or die(mysql_error());

        // * means that it selects all fields, you can also write: `specialite`, `nom`, `code_postal`
        // articles is the name of our table

        // '%$query%' is what we're looking for, % means anything, for example if $query is Hello
        // it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
        // or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'

        if(mysql_num_rows($raw_results) > 0){ // if one or more rows are returned do following

            while($results = mysql_fetch_array($raw_results)){
            // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop

                echo "<p><table><th>".$results['nom']."</th>"."<tr><td>".$results['specialite']."</td><td>".$results['code_postal']."</td><td>".$results['adresse']."</td><td>".$results['ville']."</td></p>";
                // posts results gotten from database(title and text) you can also show id ($results['id'])
            }

        }
        else{ // if there is no matching rows do following
            echo "Aucun résultat de résultat";
        }

    }
    else{ // if query length is less than minimum
        echo "Pas assez de lettres/chiffres pour effectuer une recherche, le minimum: ".$min_length;
    }
?>
</body>

</html>