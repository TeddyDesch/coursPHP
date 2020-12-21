<?php

//appel des variables
if (
    isset($_POST['email']) &&
    isset($_POST['password']) &&
    isset($_POST['confirm'])

){

    //les verifs

    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $errors[] = 'Veuillez entrer une adreese mail valide';
    }

    if (!preg_match('/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[ !"#\$%&\'()*+,\-.\/:;<=>?@[\\\\\]\^_`{\|}~]).{8,4096}$/', $_POST['password'])){
        $errors[] = 'Le mot de passe doit comporter : une Maj, une min, un chiffres et un carctères spéc. Taille min : 8 caractères';
    }
    if ($_POST['password'] !== $_POST['confirm']){
        $errors[] = 'Veuillez confirmer votre mot de passe';
    }

    //si pas d'erreur message succes
    if(!isset($errors)){

        //connexion à la base de données
        try{

            $bdd = new PDO('mysql:host=localhost;dbname=cours;charset=utf8', 'root', '');

            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch ( Exception $e){
            // si la connexion a échouée, le die() stop la page et affiche un message
            die('Problème avec la base de donnée :' . $e -> getMessage());
        }

        //
        $response = $bdd->prepare("INSERT INTO account (email, password, date_register) VALUES (?, ?, ?) ");

        $response->execute([
            $_POST['email'],
            password_hash($_POST['password'], PASSWORD_BCRYPT),
            date('Y-m-d H:i:s', time()),
        ]);


        //si rowcount renvoi plus de 0, alors l'insertion a fonctionné sinon erreur
        if($response->rowCount()>0){
            $successMsg = 'Vous êtes bien connecté!';
        } else{
            $errors[]= 'Problème interne';
        }

    //Fermeture de la requete
    $response -> closeCursor();
}
    }




?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 20</title>
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
            <form action="register.php" method="POST">
                <label for="email">Veuillez entrer votre Email</label>
                <input type="text" name="email">
                <br>
                <label for="password">Veuillez entrer votre Mot de passe</label>
                <input type="password" name="password">
                <br>
                <label for="email">Veuillez confirmer votre mot de passe</label>
                <input type="password" name="confirm">
                <br>
                <input type="submit">
            </form>
            <?php
        }
        ?>
</body>
</html>