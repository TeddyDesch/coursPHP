<?php

    //1ere étape : appel des variables ( 1 champ = 1 isset) : consiste à verifier si toutes les variables du formulaires sont présentes
    if(
        isset($_POST['firstname']) &&
        isset($_POST['lastname']) &&
        isset($_POST['age'])
    ){
    
        //2e étape : bloc des verifs ( 1 champ = 1 structure conditionnelle) : on verifie qu'il contient bien des données valides

        if(mb_strlen($_POST['firstname']) < 2 || mb_strlen($_POST['firstname']) > 50){
            $errors[] = 'Prénom pas bon';
        }

        if(mb_strlen($_POST['lastname']) < 2 || mb_strlen($_POST['lastname']) > 50){
            $errors[] = 'Nom pas bon';
        }


        if(!is_numeric($_POST['age']) || $_POST['age'] < 0 || $_POST['age'] > 150 || !ctype_digit($_POST['age'])){
            $errors[] = ' age pas bon';
        }

        //3e étape : si le formulaire n'a pas d'erreur, on fait les actions post-formulaires
        if(!isset($errors)){

            // création du message de succès en mettant la version protégée des données. ( sinon faille XSS)
            $successMsg = 'Bonjour ' . htmlspecialchars($_POST['firstname']).' ' . htmlspecialchars($_POST['lastname']).' tu as '. htmlspecialchars($_POST['age']).' ans !';
        }

    }

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Correction ex13</title>
</head>
<body>

    <?php

        //si l'array $errors existe, alors on le parcours avec un foreach et on affiche les erreurs qu'il contient
        if(isset($errors)){
            foreach($errors as $error){
                echo '<p style="color:red;"> '. $error. '!</p>';
            }
        }

        // si la variable $successMsg existe, alors on l'affiche, sinon on affiche le formulaire dans le else
        if(isset($successMsg)){
            echo '<p style="color:green;"> '. $successMsg. '</p>';
        } else{

            ?>
            <form action="" method="POST">

                <input type="text" placeholder="Prénom" name="firstname">
                <input type="text" placeholder="Nom" name="lastname">
                <input type="text" placeholder="Age" name="age">
                <input type="submit">

            </form>
            <?php
        };
        ?>
</body>
</html>