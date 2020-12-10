<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice4</title>
</head>
<body>
    <?php
    $i = 0;

    echo '<ul>';
    while($i < 5000){

        echo '<li> ligne N° '.($i+1).'</li>';

        $i++;
    }
    echo '</ul>';
    ?>
</body>
</html>