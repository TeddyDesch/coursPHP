<?php
    $admin = 'user';

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 3</title>
    <style>
        p{
            font-weight : bold;
            color : red;
        }
    </style>
</head>
<body>


<?php


if ($admin === 'admin'){
    echo 'Bienvenue cher Admin';
    echo '<br>';
    echo '<a href="#"> Rejoins-nous </a>';
}else{
    echo '<p> Tu n\'es pas le bienvenu, reservé aux ADMINS !!!!!</p>';
}


?>




</body>
</html>