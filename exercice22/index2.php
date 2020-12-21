<?php
//recuperation du nombre de visites
$myFile = file_get_contents('compteur.txt');
// on acrement de 1
$myFile++;
// on ecrit le nouveau chiffre calculé
file_put_contents('compteur.txt', $myFile);
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
    echo '<p> Le site a été vu '. $myFile . ' fois !!! </p>';
   ?>
</body>
</html>