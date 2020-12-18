<?php


//appel des variables
if (
    isset($_POST['name']) &&
    isset($_POST['color']) &&
    isset($_POST['origin']) &&
    isset($_POST['price'])
){
    
    //les verifs
    if (!preg_match('/^.{2,25}$/', $_POST['name'] )){
        $errors[] = 'Nom pas bon';
    }

    if (!preg_match('/^.{2,25}$/', $_POST['color'])){
        $errors[] = 'Couleur pas bonne';
    }
    if (!preg_match( '/^.{2,55}$/', $_POST['origin'])){
        $errors[] = 'L\'origine n\'est pas bonne';
    }

    if (!preg_match('/^\d{1,4}([,\.]\d{1,2})?$/', $_POST['price'])){
        $errors[] = 'Le prix n\'est pas bon';
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
        $response = $bdd->prepare("INSERT INTO fruits (name, color, origin, price) VALUES (?, ?, ?, ?) ");

        $response->execute([
            $_POST['name'],
            $_POST['color'],
            $_POST['origin'],
            str_replace(',', '.', $_POST['price']),//remplace une virgule evntuelle par un point car SQL ne prend pas en compte la ,
        ]);

        //si rowcount renvoi plus de 0, alors l'insertion a fonctionné sinon erreur
        if($response->rowCount()>0){
            $successMsg = 'Le fruit a bien été ajouté !!!!!';
        } else{
            $errors[]= 'Problèeme interne';
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
    <title>Exercice 19</title>
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

            <input type="text" placeholder="Nom" name="name">
            <input type="text" placeholder="Couleur" name="color">
            <input type="text" placeholder="Origine" name="origin">
            <input type="text" placeholder="Prix" name="price">
            <input type="submit">

        </form>
    <?php
    };
    ?>

</body>
</html>