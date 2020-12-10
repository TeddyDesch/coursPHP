<?php
    //creation d'un array avec des users et leurs infos
    $array = [
        [
            'name'  =>  'Bertrand',
            'age'   =>  '30',
            'job'   =>  'menuisier',
            'countries'   => ['france', 'italie', 'espagne'],
        ],
        [
            'name'  =>  'Gertrude',
            'age'   =>  '58',
            'job'   =>  'couturiere',
            'countries'   => ['allemagne', 'portugal', 'canada'],
        ],
        [
            'name'  =>  'Maurice',
            'age'   =>  '47',
            'job'   =>  'boulanger',
            'countries'   => ['france', 'suisse', 'autriche', 'japon' ],
        ],
        [
            'name'  =>  'Norbert',
            'age'   =>  '52',
            'job'   =>  'garagiste',
            'countries'   => ['japon', 'chine'],
        ],
        [
            'name'  =>  'Kevin',
            'age'   =>  '23',
            'job'   =>  'branleur',
            'countries'   => [], // creation d'un array vide
        ],
    ];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 8</title>
</head>
<body>
    <?php
        //on parcours tous les utilisateurs avec un foreach pour afficher une structure html pour chacun d'eux
        foreach($array as $littleArray){

            //titre h2 avce le nom de l'user
            echo '<h2> '.$littleArray['name'].'</h2>';

            //phrase avec les elements du tableau
            echo '<p> Bonjour, je suis '. $littleArray['name']. ' j\'ai '. $littleArray['age']. ' ans et mon métier est '. $littleArray['job']. ' !';
            echo '<br>';
            echo '<p>Liste des pays visité:</p>';

            //si l'user a visité des pays alors on affiche les pays, sinon on va dans le else pour message erreur
            if ( count($littleArray['countries']) > 0){

                //on ouvre liste à puce
                echo '<ul>';

                //on parcours les pays pour les afficher un par un par dans un li
                foreach($littleArray['countries'] as $country){
                    echo '<li> ' . $country . '</li>';
                }
                //on ferme la liste à puce
                echo '</ul>';
            }else {
                echo '<p style="color:red;">Cet utilisateur n\'a pas voyagé !</p>';
            }
            echo '<hr>';
        }
    ?>
</body>
</html>