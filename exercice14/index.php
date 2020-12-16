<?php

    //appel des variables
    if (isset($_POST['color']))
    {
        //verifs
        if(mb_strlen($_POST['color']) < 2 || mb_strlen($_POST['color']) > 10){
            echo 'Couleur pas bonne';
        }else{
            setcookie('colorCookie',$_POST['color'], time() + 7*24*60*60 , null, null, false, true);
        }

    }
    //$colorBody =  '<body style="background-color:'. $_COOKIE['colorCookie'].'">';
    

        

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 14</title>
</head>
<body  <?php echo 'style="background-color:'. $_POST['color'].'"';?>>

    <?php
    ?>

    <h1>Exercice 14 :</h1>

    <p>1) Créer un formulaire avec un champ permettant de récupérer une couleur (soit type = color, soit text à taper à la main). Quand ce formulaire est envoyé, vérifier que la valeur reçu comprenne entre 2 et 10 caractères, sinon erreur ! Si pas d'erreur, changer la couleur de fond de la page avec la couleur reçu par le formulaire.</p>

    <p>2) Faire en sorte avec un cookie de sauvegarder la dernière couleur envoyée et de l'utiliser pour que cette couleur reste en fond tout le temps même en quittant la page et en revenant plus tard (au moins 1 jour).</p>

    <p>ATTENTION : Le changement de couleur doit être instantané, il ne faut pas que le changement se fasse après plusieurs actualisations.</p>
    
    <form action="index.php" method="POST">
        <input type="color" name='color'>
        <input type="submit">
    </form>

</body>
</html>