<?php



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
            function print_rv2($array){
                echo '<pre>';
                print_r($array);
                echo '</pre>';

            };
            $fruits = ['pomme', 'fraise', 'banane','poire'];
            echo print_rv2($fruits);


            function getTTCPrice($priceHT, $tva = 0.2){
                return $priceHT * $tva + $priceHT;
            }

            echo getTTCPrice(100);

        ?>

</body>
</html>