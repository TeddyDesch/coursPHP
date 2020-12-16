<?php
//appel des variables
if(
    isset($_POST['email']) &&
    isset($_POST['age']) &&
    isset($_POST['site'])
){
    //les verifs

    //doit etre mail invalide pour rentrer dans la condition
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $errors[] = 'Email pas bon';
    }

    //doit pas etre un entir ou pas etre compreis entre 0 et 150 pour rentrer dans la condition
    if (!filter_var($_POST['age'], FILTER_VALIDATE_INT) || $_POST['age'] >150  || $_POST['age'] < 0){
        $errors[] = 'Age pas bon';
    }

    //doit pas etre une url valide pour rentrer condition
    if (!filter_var($_POST['site'], FILTER_VALIDATE_URL)){
        $errors[] = 'Site pas bon';
    }

    //si pas d'erreur message succes
    if(!isset($errors)){
        $successMsg = 'Vos données ont bien été récoltées !!!!!!!!!!!';
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 16</title>
</head>
<body>
    <?php
    //si il y a des erreurs on les affiches
    if(isset($errors)){
        foreach( $errors as $error){
            echo '<p style="color:red;">'.$error .'</p>';
        }
    }

    //si pas d'erreur on affiche le succes et on cahce le form
    if(isset($successMsg)){
        echo '<p style="color:green;"> '. $successMsg. '</p>';
    } else {

        ?>
        <form action="index.php" method="POST">

            <input type="text" placeholder="Adresse email" name="email">
            <input type="text" placeholder="Age" name="age">
            <input type="text" placeholder="Site préféré" name="site">
            <input type="submit">

        </form>
        <?php
    };
    ?>

</body>
</html>