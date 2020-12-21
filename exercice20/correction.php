<?php
//Appel des variables

if(
    isset($_POST['email']) &&
    isset($_POST['password']) &&
    isset($_POST['confirmPassword'])
){
    //blocs des verifs
    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $errors[] = 'Email pas valide';
    }

    if (!preg_match('/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[ !"#\$%&\'()*+,\-.\/:;<=>?@[\\\\\]\^_`{\|}~]).{8,4096}$/', $_POST['password'])){
        $errors[] = 'Le mot de passe est non valide';
    }

    if($_POST['password'] != $_POST['confirmPassword']){
        $errors[] = 'La confirmation n\'est pas bonne';
    }

    //si pas d'erreur
    if (!isset($errors)){

        //second blocs de verifs ( si mail pas déja pris)

        //connexion bdd
        try{
            $bdd = new PDO('mysql:host=localhost;dbname=cours;charset=utf8', 'root', '');

            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch ( Exception $e){
            die('Problème avec la base de donnée :' . $e -> getMessage());
        }

        $checkIfExists = $bdd->prepare('SELECT * FROM account WHERE email = ?');

        $checkIfExists->execute([
            $_POST['email']
        ]);

        $account = $checkIfExists->fetch(PDO::FETCH_ASSOC);

        if(!empty($account)){
            $errors[] ='L\'adresse mail est déjà utilisé, veuillez en utiliser une autre! ! !';
        }

        if (!isset($errors)){ //possibilté d'utiliser un else plutot sur le if du dessus.

            //requete préparée pour crer le nouveau compte ( pour proteger des injonctions sql car il y a des variables SQL dedans)
            $addUser =  $bdd->prepare("INSERT INTO account (email, password, date_register) VALUES (?, ?, ?) ");

            //executions des requetes
            $statut = $addUser->execute([
                $_POST['email'],    //email du compte
                password_hash($_POST['password'], PASSWORD_BCRYPT),     //stockage de l'empreinte du password
                date('Y-m-d H:i:s', time()),    //on stocke la date et l'heure au moment de l'execution
            ]);

            $addUser -> closeCursor();


            //si l'envoi a bien fonctionné ($statut contiendra true si c'est la cas sinon false)
                if($statut){
                    $success = 'Votre compte est bien créé ! ! !';
                }else{
                    $errors[] = 'Problème avec le site, veuillez réessayer ! ! ! ';
                }

        }
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Correction exercice 20</title>
</head>
<body>
    <?php
    if(isset($errors)){
        foreach($errors as $error){
        echo '<p style="color:red;">'.$error .'</p>';
        }
    }
    if (isset($success)){
        echo '<p style="color:green;">'.$success .'</p>';
    } else{
        ?>

        <form action="correction.php" method="POST">

        <input type="text" placeholder="Email" name="email">
        <input type="password" placeholder="Mot de passe" name="password">
        <input type="password" placeholder="Confirmation du mot de passe" name="confirmPassword">
        <input type="submit">

        </form>
    <?php
    };
    ?>

</body>
</html>