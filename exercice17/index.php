<?php

//appel des variables
if (
    isset($_POST['email']) &&
    isset($_POST['pseudo']) &&
    isset($_POST['password']) &&
    isset($_POST['birth'])
){

    //les verifs
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $errors[] = 'Email pas bon';
    }

    if (!preg_match('/^[a-z0-9A-Z\'àáâãäåçèéêëìíîïðòóôõöùúûüýÿ]{2,25}$/', $_POST['pseudo'])){
        $errors[] = 'Pseudo pas bon';
    }
    if (!preg_match( '/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[ !"#\$%&\'()*+,\-.\/:;<=>?@[\\\\\]\^_`{\|}~]).{8,4096}$/', $_POST['password'])){
        $errors[] = 'Le mot de passe doit comporter 8 caracteres minimum';
    }

    if (!preg_match('/^(((0[1-9]|[12]\d|3[01])[\/\-](0[13578]|1[02])[\/\-]((19|[2-9]\d)\d{2}))|((0[1-9]|[12]\d|30)[\/\-](0[13456789]|1[012])[\/\-]((19|[2-9]\d)\d{2}))|((0[1-9]|1\d|2[0-8])[\/\-]02[\/\-]((19|[2-9]\d)\d{2}))|(29[\/\-]02[\/\-]((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))))$/', $_POST['birth'])){
        $errors[] = 'La date doit etre au format JJ/MM/AAAA';
    }

    //si pas d'erreur message succes
    if(!isset($errors)){
        $successMsg = 'Votre compte a bien été créé !!!!!';
    }
    
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 17</title>
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
            <input type="text" placeholder="Email" name="email">
            <input type="text" placeholder="Pseudo" name="pseudo">
            <input type="text" placeholder="Password" name="password">
            <input type="text" placeholder="Date de Naissance" name="birth">
            <input type="submit">
        </form>
    <?php
    };
    ?>
</body>
</html>