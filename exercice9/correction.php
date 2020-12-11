<?php

function print_rv2($elementToDisplay){
    echo '<pre>';
    print_r($elementToDisplay);
    echo '</pre>';

};

function getTTCPrice($priceHT, $tax = 20){
    return $priceHT * (($tax /100) + 1);
}


$fruits = ['pomme', 'fraise', 'banane','poire'];

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 9</title>
</head>
<body>

        <?php
            
            echo print_rv2($fruits);


            echo getTTCPrice(100, 15);

        ?>

</body>
</html>