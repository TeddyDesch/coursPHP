<?php

$userInfo = [
    'name'=> 'Rodolphe',
    'sexe' => 'homme',
    'age'=> '36',
    'job' =>'eleveur de truites',
    'where' => 'Normandie',
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 7</title>
   <style>
        span{
            color : red;
            font-weight : bold;
        }
   </style>
</head>
<body>
    <?php
        echo 'Aujourd\'hui, dans l\'amour est dans le pré, nous allons à la rencontre de <span>'.$userInfo['name'].'</span> jeune <span>' . $userInfo['sexe']. '</span> de <span>'. $userInfo['age']. '</span> ans. Il est <span>'.$userInfo['job'].'</span> en <span>'.$userInfo['where'].'</span>. Allons à sa rencontre...';
    ?>
</body>
</html>