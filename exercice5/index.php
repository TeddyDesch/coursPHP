<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 5</title>
</head>
<body>

<ul>
    <?php

        for ( $i = 0; $i < 5000; $i++){
            echo '<li> ligne N° '.($i+1).'</li>';
        }
    ?>
</ul>

</body>
</html>




