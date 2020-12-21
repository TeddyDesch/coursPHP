<?php

$myFile = fopen('compteur.txt', 'r+');

//on lit le fichier et on recupere le 0
$visitedCount = fread($myFile, 6);

// on acrement de 1
$visitedCount++;

// on déplace le curseur à la base pour ecraser le chiffre initiale
fseek($myFile, 0);

// on ecrit le nouveau chiffre calculé
fwrite($myFile, $visitedCount);

//fermeture de connexion
fclose($myFile);

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice22</title>
</head>
<body>
    <?php

    echo '<p> Le site a été vu '. $visitedCount . ' fois !!! </p>';

   ?>


</body>
</html>