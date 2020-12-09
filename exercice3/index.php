<?php
    $admin = true;

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 3</title>
    <style>
        .error{
            font-weight : bold;
            color : red;
        }
    </style>
</head>
<body>


<?php
    if ($admin){

        ?>
        <p>Bienvenu cher Admin ! ! ! Viens <a href="#">ici</a></p>

        <?php

    }else{
        ?>
        <p class="error"> Tu n'es pas le bienvenu, reservé aux ADMINS !!!!!</p>
        <?php
}


?>




</body>
</html>