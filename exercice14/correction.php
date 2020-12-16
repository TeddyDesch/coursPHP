<?php

//par defaut on assigne une couleur de fond
$newColor = 'grey';

//si le cookie existe $nexColor prend la couleur stockée
if(isset($_COOKIE['backgroundColor'])){
    $newColor = $_COOKIE['backgroundColor'];
}

//Même chose que les 4 lignes du dessu avec une condition ternaire:
// $newColor = (isset($_COOKIE['backgroundColor])) ? $_COOKIE['backgroundColor'] : '#BBBBBB';
//appel des variables
if(isset($_POST['color'])){

    //bloc de verifs
    if(mb_strlen($_POST['color']) < 2 || mb_strlen($_POST['color']) > 10 ){
        $error = 'Vous devez remplir le champ de couleur';
    }
    //si pas d'erreur
    if(!isset($error)){

        //$newColor contiendra la couleur envoyée dans le formulaire
        $newColor = $_POST['color'];

        //on crée un nouveau cookie avec la nouvelle couleur
        setcookie('backgroundColor', $_POST['color'], time() + 24*3600, null, null, false, true);
    }
}



?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Correction Ex14</title>
</head>
<body style="background-color: <?php echo htmlspecialchars($newColor); ?>;">


    <form action="correction.php" method="POST">

    <input type="color" name="color" placeholder="Nouvelle couleur">
    <input type="submit">

    </form>

    <?php

    if(isset($error)){
        echo '<p style="color:red;">'.$error.' </p> ';
    }

    ?>
</body>
</html>