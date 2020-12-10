<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 6</title>
</head>
<body>
    <ul>
        <?php

        $name = ['Prenom1','Prenom2', 'Prenom3', 'Prenom4', 'Prenom5', 'Prenom6', 'Prenom7', 'Prenom8', 'Prenom9', 'Prenom10'];
        /*$i = 0;

        while($i < 10){
            echo '<li> '.$name[$i].'</li>';
            $i++;
        }
        */

        //on recupere la taille de l'array avec count()
        $arrayLength = count($name);

        //on boucle avec for
        for ($i = 0; $i < $arrayLength; $i++){
            echo '<li>' . $name[$i] . '</li>';
        }

        ?>
    </ul>
</body>
</html>