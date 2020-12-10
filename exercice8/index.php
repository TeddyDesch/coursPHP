<?php

    $array = [
        [
            'name'  =>  'Bertrand',
            'age'   =>  '30',
            'job'   =>  'menuisier',
        ],
        [
            'name'  =>  'Gertrude',
            'age'   =>  '58',
            'job'   =>  'couturiere',
        ],
        [
            'name'  =>  'Maurice',
            'age'   =>  '47',
            'job'   =>  'boulanger',
        ],
        [
            'name'  =>  'Norbert',
            'age'   =>  '52',
            'job'   =>  'garagiste',
        ],
        [
            'name'  =>  'Kevin',
            'age'   =>  '23',
            'job'   =>  'branleur',
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

        foreach($array as $littleArray){
            echo '<h2> '.$littleArray['name'].'</h2> <br> <p> Bonjour, je suis '. $littleArray['name']. ' j\'ai '. $littleArray['age']. ' ans et mon métier est '. $littleArray['job']. ' !';
        }

    ?>
</body>
</html>